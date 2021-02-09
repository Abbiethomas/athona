<?php
include('database.php');
$idteacher=$_POST['teacher_id'];

$query="DELETE FROM teacher WHERE idteacher= '$idteacher'";
$db->exec($query);
include('adminPage.php');

?>