<?php

include('database.php');

if (isset($_POST['location']) && isset($_POST['locationText']) ) {
    $location=$_POST['location'];
    $locationText=$_POST['locationText'];




    $query="UPDATE course SET building = '$locationText' WHERE idcourse= '$location'";
$db->exec($query);
	}
	echo "<script>window.location = 'teacherPage.php'</script>";

?>