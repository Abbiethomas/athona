<?php
	session_start();

	include_once('database.php');
	

	$studentID = isset($_SESSION["id"]) ? $_SESSION["id"] : '';
	$query = "SELECT * FROM student WHERE idstudent = '$studentID'";
	$student = $db->query($query);
	$student = $student->fetch();
	$student_name = $student['name'];
	$student_major = $student['major'];
	
	$query = "SELECT * FROM course 
	INNER JOIN enrolled
		ON enrolled.idcourse = course.idcourse
	WHERE idstudent = '$studentID'";
	$student_courses = $db->query($query);
	$query = "SELECT * FROM course";
	$courses = $db->query($query);

	//Hover
	$query = "SELECT * FROM info";
	$description = $db->query($query);


?>

<html lang="en">
	<head>
		<title>Student Page</title>
		<link rel="shortcut icon" href="../logo2.PNG">
		<link rel="stylesheet" href="studentPage.css?v=<?php echo time(); ?>">
	</head>
	<body>
		<header>
			<h1>Athona
				<a><img src="../logo3.PNG" alt="logo3" height="60" class="topLogo"></a>
			</h1>
		</header>
		<aside id="sidebarInfo">
			<h2>Student Info</h2> 
			<a id="top">Student Name: </a><a id="info"><?php echo $student_name?></a><br>
			<a id="top">Student ID: </a><a id="info"> <?php echo $studentID?></a><br>
			<a id="top">Major: </a><a id="info"><?php echo $student_major?></a><br>
		</aside>
		<aside id="changeMajor">
			<h2>Edit Major</h2>
			<form action="changeMajor.php" method="post">
				<div class="major">
				<select name="newMajor">
				<option value="Art History">Art History</option>
				<option value="Business">Business</option>
				<option value="Biology">Biology</option>
				<option value="Chemistry">Chemistry</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Finance">Finance</option>
				<option value="Psychology">Psychology</option>
				<option value="Spanish">Spanish</option>
					</select>
				<input type="hidden" name="studentID" value=<?php echo $studentID?>>
				<input type="submit" value="Update Major" id="majorButton"></div>
			</form>
		</aside>
		<main id="registeredCourse">
			<h2>Registered Courses</h2>
			<table>
				<tr id="top">
					<td>Course ID</td>
					<td>Course Name</td>
					<td>Course Location</td>
					<td>Course Time</td>
					<td>Course Professor</td>				
				</tr>
				<?php foreach($student_courses AS $student_course):?>
				<tr>
					<td><?php echo $student_course['idcourse']?></td>
					<td><?php echo $student_course['name']?></td>
					<td><?php echo $student_course['building']?></td>
                	<td><?php echo $student_course['classtime']?></td>
                	<td><?php 
						$id = $student_course['idteacher'];
						$query = "SELECT name FROM teacher WHERE idteacher='$id'";
						$name = $db->query($query);
						echo $name->fetchColumn()?></td>
					<td class="button"><form action="deleteCourse.php" method="post">
						<input type="hidden" name="studentID" value=<?php echo $studentID?>>
						<input type="hidden" name="courseID" value=<?php echo $student_course['idcourse']?>>
						<input type="submit" value="Drop" id="button">
						</form></td>
				</tr>	
				<?php endforeach;?>
			</table>
		</main>
		<aside id="classList">
			<h2>Available Courses</h2>
			<table>
				<tr id="top">
					<td>Course ID</td>
					<td>Course Name</td>
					<td>Course Location</td>
					<td>Course Time</td>
					<td>Course Professor</td>					
				</tr>
				<?php foreach($courses as $course):?>
        		<tr>	
                	<td><?php echo $course['idcourse']?></td>
					<td><div class="tooltip"><?php echo $course['name']?>
						<span class="tooltiptext">Course Description: <?php echo $course['discription']?> <br><br>
					
						Required Textbook: <?php echo $course['book']?>	<br><br>

						Seats Remaining: <?php 
							$courseID= $course['idcourse'];
							$query = "SELECT * FROM enrolled WHERE idcourse='$courseID'";
							$enrolled = $db->query($query);
							echo ($course['size'] - $enrolled->rowCount())?> 
						</span>
					</div></td>
					<td><?php echo $course['building']?></td>
                	<td><?php echo $course['classtime']?></td>
                	<td><?php 
						$id = $course['idteacher'];
						$query = "SELECT name FROM teacher WHERE idteacher='$id'";
						$name = $db->query($query);
						echo $name->fetchColumn()?></td>
					<td class="button"><form action="addCourse.php" method="post">
						<input type="hidden" name="studentID" value=<?php echo $studentID?>>
						<input type="hidden" name="courseID" value=<?php echo $course['idcourse']?>>
						<input type="submit" value="Add" id="button">
					</form></td>
				</tr>
				<?php endforeach;?>
			</table>
		</aside>	
	</body>
	<footer>
		<form method="get" action="../login/loginPage.php" style="float:right;margin:40px;">
		<button type="submit">Log Out</button>
		</form>
		<img src="../logo4.PNG" style="margin:10px;height:80px;filter:grayscale(100%);">	
	</footer>
</html>