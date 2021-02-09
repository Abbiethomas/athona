<?php
	include('database.php');
	$query= 'SELECT * FROM teacher';
	$teachers= $db->query($query);
	$query= 'SELECT * FROM student';
	$students=$db->query($query);
	
	/* Statistics Queries and Calculations
	*/
	#Total Number of Students
	$query = "SELECT * FROM student";
	$totalStudents = $db->query($query);
	$totalStudents = $totalStudents->rowCount();

	#Total Number of Professors
	$query = "SELECT * FROM teacher";
	$totalProfs = $db->query($query);
	$totalProfs = $totalProfs->rowCount();

	#Average Number of Students in each Course
	$query = "SELECT idcourse FROM course";
	$courses = $db->query($query);
	$total = 0;
	for($i = 0; $i < $courses->rowCount(); $i++) {
		$tempID = $courses->fetchColumn(0);
		$query = "SELECT COUNT(*) FROM enrolled WHERE idcourse='$tempID'";
		$numEnrolled = $db->query($query);
		$numEnrolled = $numEnrolled->fetchColumn(0);
		$total += $numEnrolled;
	}
	$avgStudents = $total / ($courses->rowCount());
	
	#Average Number of Courses a Professor Teaches
	$query = "SELECT idteacher FROM teacher";
	$profs = $db->query($query);
	$total = 0;
	for($i = 0; $i < $profs->rowCount(); $i++) {
		$tempID = $profs->fetchColumn(0);
		$query = "SELECT COUNT(*) FROM course WHERE idteacher='$tempID'";
		$numClass = $db->query($query);
		$numClass = $numClass->fetchColumn(0);
		$total += $numClass;
	}
	$avgCourses = $total / ($profs->rowCount());
	
	#Number of Courses
	$query = "SELECT * FROM course";
	$numCourses = $db->query($query);
	$numCourses = $numCourses->rowCount();

	#Average Course Size
	$query = "SELECT size FROM course";
	$avgSize = $db->query($query);
	$size = $avgSize->rowCount();
	$total = 0;
	for($i = 0; $i < $size; $i++) {
		$total = $total + $avgSize->fetchColumn(0);
	}
	$avgSize = $total / $size;

?>

<head>
	<title>Admin Page</title>
	<link rel="shortcut icon" href="../logo2.PNG">
	<link rel="stylesheet" href="adminPageCSS.css?v=<?php echo time(); ?>">
</head>
<header>
		<h1>Athona<a><img src="../logo3.PNG" alt="logo3" height="60" class="topLogo"></a></h1>
</header>
<section id="edit">
	<p><a class="nav" href="addteacher.php">Add Professor</a></p>
	<p><a class="nav" href="editteacher.php">Edit a Professor</a></p>
	<p><a class="nav" href="addstudent.php">Add Student</a></p>
	<p><a class="nav" href="editstudent.php">Edit a Student</a></p>
</section>
<aside>
<h2>Students</h2>
<table>
		<tr>
			<th id="top">Name</th>
			<th id="top">Major</th>
			<th></th>
		<?php foreach($students as $student):?>
			<tr>
			<td><?php echo $student['name']?></td>
			<td><?php echo $student['major']?></td>
			<td class="button"><form action="deletestudent.php" method ="post">
			<input type ="hidden" name="student_id" value = <?php echo $student['idstudent']?>>
			<input type ="submit" value ="Delete">
		</form></td>
			</tr>
		<?php endforeach;?>
	</table>
</aside>
<main>
<h2>Professors</h2>
<table>
		<tr>
			<th id="top">Name</th>
			<th></th>
		<?php foreach($teachers as $teacher):?>
			<tr>
			<td><?php echo $teacher['name']?></td>
			<td class="button"><form action="deleteteacher.php" method ="post">
			<input type ="hidden" name="teacher_id" value = <?php echo $teacher['idteacher']?>>
			<input type ="submit" value ="Delete">
		</form></td>
			</tr>
		<?php endforeach;?>
	</table>
</main>
<section id="stats">
	<h2>Statistics</h2>
	<table>
		<tr>
			<th id="top">Total Number of Students</th>
			<th id="top">Average Number of Students in Each Course</th>
			<th id="top">Number of Courses</th>
		</tr>
		<tr>
			<td id="numbers"><?php echo $totalStudents?></td>
			<td id="numbers"><?php echo $avgStudents?></td>
			<td id="numbers"><?php echo $numCourses?></td>
		</tr>
		<tr>
			<th id="top">Total Number of Professors</th>
			<th id="top">Average Number of Courses a Professor Teaches</th>
			<th id="top">Average Course Size</th>
		</tr>
		<tr>
			<td id="numbers"><?php echo $totalProfs?></td>
			<td id="numbers"><?php echo $avgCourses?></td>
			<td id="numbers"><?php echo $avgSize?></td>
		</tr>	
	</table>
</section>
<footer>
	<form method="get" action="../login/loginPage.php" style="float:right;margin:40px;">
    <button type="submit">Log Out</button>
	</form>
	<img src="../logo4.PNG" style="margin:10px;height:80px;filter:grayscale(100%);">	
</footer>