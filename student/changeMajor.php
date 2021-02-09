<?php
	include('database.php');

	if(isset($_POST['newMajor']) && isset($_POST['studentID'])) {
		$major = $_POST['newMajor'];
		$id = $_POST['studentID'];
		
		$query = "UPDATE student SET major = '$major' WHERE idstudent='$id'";
		
		$db->exec($query);
	} 

	echo "<script>window.location = 'studentPage.php'</script>";
?>