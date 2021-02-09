<?php
include('database.php');
$idstudent=$_POST['student_id'];

$query="DELETE FROM student WHERE idstudent= '$idstudent'";
$db->exec($query);
include('adminPage.php');

?>