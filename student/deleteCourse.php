<?php
	include('database.php');

	$studentID = isset($_POST['studentID']) ? $_POST['studentID'] : '';
	$courseID = isset($_POST['courseID']) ? $_POST['courseID'] : '';

	$query = "DELETE FROM enrolled WHERE idstudent='$studentID' AND idcourse='$courseID'";
		
	$db->exec($query);
	
	echo "<script>window.location = 'studentPage.php'</script>";		

?>