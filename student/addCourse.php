<?php

	include('database.php');

	$studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';
	
	$courseID = isset($_POST['courseID']) ? $_POST['courseID'] : '';

	#If student is already enrolled, row count will be greater than 0
	$query = "SELECT * FROM enrolled WHERE idstudent='$studentID' AND idcourse='$courseID'";
	$exists = $db->query($query);

	#Counts number of courses student is enrolled in
	$query = "SELECT * FROM enrolled WHERE idstudent='$studentID'";
	$studentCourses = $db->query($query);

	#Class info for requested course
	$query = "SELECT * FROM course WHERE idcourse='$courseID'";
	$course = $db->query($query);
	$temp = $course->fetch(PDO::FETCH_ASSOC);
	$course = $temp;

	#Check that there isn't a time conflict
		$conflict = false;
		for($i = 0; $i < $studentCourses->rowCount(); $i++) {
			$tempCourseID = $studentCourses->fetchColumn(1);
			$query = "SELECT classtime AS time FROM course WHERE idcourse='$tempCourseID'";			
			$time = $db->query($query);
			$temp = $time->fetch(PDO::FETCH_ASSOC);
			$time = $temp;
			if($course['classtime'] == $time['time']) {
				$conflict = true;
			}
		}	

	#Check that course isn't full
	$query = "SELECT * FROM enrolled WHERE idcourse='$courseID'";
	$enrolled = $db->query($query);
	$seatsLeft = $course['size'] - $enrolled->rowCount();


	#Error messages
	if($exists->rowCount() != 0) {
		echo '<script type="text/JavaScript">
			alert("You are already enrolled in this course.")
			</script>';
	} else if($studentCourses->rowCount() == 5) {
		echo '<script type="text/JavaScript">
			alert("You cannot enroll in more than 5 courses.")
			</script>';
	} else if ($conflict) {
		echo '<script type="text/JavaScript">
			alert("There is a time conflict with this course.")
			</script>';	
	} else if($seatsLeft <= 0) {
		echo '<script type="text/JavaScript">
			alert("There are no seats available in this course.")
			</script>';	
	} else { 
		#input is valid
		$query = "INSERT INTO enrolled (idstudent, idcourse) VALUES ('$studentID', '$courseID')";
		$db->exec($query);
	}
	
	//include('studentPage.php');
	echo "<script>window.location = 'studentPage.php'</script>";
?>