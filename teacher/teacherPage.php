<?php
    session_start();
    include('database.php');

	$var3 = $_SESSION["id"];  //this is teacherid
	
    $query= " SELECT * FROM course WHERE idteacher = '$var3' ";

	$classes=$db->query($query);
	


	$query= " SELECT * FROM teacher WHERE idteacher = '$var3' ";

	$teachers=$db->query($query);

	$id = 'SPAN1002';

	$query= " SELECT COUNT(*) AS count FROM enrolled WHERE idcourse= '$id' ";

	$enrolled=$db->query($query);
	$test = $enrolled->fetch(PDO::FETCH_ASSOC);
	$value = $test['count'];

	
?>
<head>
<meta charset="utf-8">
        <title>Professor Page</title>
		<link rel="shortcut icon" href="../logo2.PNG">
        <link rel="stylesheet" href="teacherPageCSS.css?v=<?php echo time(); ?>">

</head>

<header>
		<h1>Athona
			<a><img src="../logo3.PNG" alt="logo3" height="60" class="topLogo"></a>
		</h1>
</header>
<body>
	<aside>
		<h2>Professor Info</h2>

		<?php foreach($teachers as $teacher):?>

		<a id="top">Professor Name: </a><a id="info"><?php echo $teacher['name']?></a><br>
		<a id="top">Professor ID: </a><a id="info"><?php echo $teacher['idteacher']?></a>
		<?php endforeach;?>


	</aside>
	<main>
		<h2>Courses</h2>
		<table>
			<tr>
				<th id="top">Name</th>
				<th id="top">Course ID</th>
				<th id="top">Building</th>
				<th id="top">Time</th>
				<th id="top">Students Enrolled</th>  
				<th id="top">Edit Location</th>
				<th id="top">Edit Time</th>
		
    	<?php foreach($classes as $class):?>
			<tr>    
				<td><?php echo $class['name']?></td>
				<td><?php echo $class['idcourse']?></td>
				<td><?php echo $class['building']?></td>
				<td><?php echo $class['classtime']?></td>
				<td><div class="tooltip">
				<?php 
				$id = $class['idcourse'];

				$query= " SELECT idstudent FROM enrolled WHERE idcourse= '$id' ";
			
				$enroll=$db->query($query);
				$value  = $enroll->rowCount();
				
				echo $value;
				?>
				<span class="tooltiptext"> Students Enrolled in 
					<?php echo $class['name']?>: 
					<?php
						$query = "SELECT name FROM student
						INNER JOIN enrolled ON 
						enrolled.idcourse='$id'
						AND student.idstudent=enrolled.idstudent";
						$names = $db->query($query);
						for($i=0; $i < $names->rowCount(); $i++) {
							echo "<br>";
							echo $names->fetchColumn(0);
						}
					?>
				</span>
				</div></td>
				<td><form action="teacherEditLocation.php" method="post">
				<select name="locationText" id="button">
                        <option value="Lamar">Lamar</option>
                        <option value="Aderhold">Aderhold</option>
                        <option value="Boyd">Boyd</option>
                        <option value="Terry">Terry</option>
                        <option value="Miller">Miller</option>
                        <option value="Park">Park</option>
                    
                    </select>
					<input type="hidden" name="location" value=<?php echo $class['idcourse']?>>
					<input type="submit" value="Edit" id="button">
					</form></td>	

				<td><form action="teacherEditTime.php" method="post">
					
				<select name="timeText" id="button">
                        <option value="8:00 am">8:00 am</option>
                        <option value="10:00 am">10:00 am</option>
                        <option value="11:00 am">11:00 am</option>
                        <option value="1:00 pm">1:00 pm</option>
                        <option value="2:45 pm">2:45 pm</option>
                        <option value="4:00 pm">4:00 pm</option>
                        <option value="4:45 pm">4:45 pm</option>
                    </select>
					<input type="hidden" name="courseID" value=<?php echo $class['idcourse']?>>
					<input type="hidden" name="profID" value=<?php echo $var3?>>

					<input type="submit" value="Edit" id="button">



					</form></td>
			</tr>
			<?php endforeach;?>
		</table>
	</main>
</body>
<footer>
	<form method="get" action="../login/loginPage.php" style="float:right;margin:40px;">
    <button type="submit">Log Out</button>
	</form>
	<img src="../logo4.PNG" style="margin:10px;height:80px;filter:grayscale(100%);">	
</footer>