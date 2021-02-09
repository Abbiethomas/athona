<?php

	include('database.php');

	if (isset($_POST['courseID']) && isset($_POST['timeText'])) {
		$id=$_POST['courseID'];
		$timeText=$_POST['timeText'];
		$profID=$_POST['profID'];
		$query = "SELECT classtime FROM course WHERE idteacher='$profID'";
		$profCourses = $db->query($query);
		
		#Check that  professor doesn't already have a class at new time
		$valid=true;
		for($i=0; $i < $profCourses->rowCount(); $i++) {
			if($profCourses->fetchColumn(0) == $timeText) {
				$valid=false;
			}
		}
		if($valid) {
			$query="UPDATE course SET classtime = '$timeText' WHERE idcourse= '$id'";
			$db->exec($query);
		} else {
			echo '<script type="text/JavaScript">
				alert("There is a time conflict with this course.")
				</script>';	
		}
	}
	echo "<script>window.location = 'teacherPage.php'</script>";

?>
