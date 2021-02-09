<?php
include('database.php');
$idteacher=$_POST['idteacher'];
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];

$query2="INSERT INTO login 
	(username, password, type) VALUES 
	('$username', '$password', 'teacher')";

$db->exec($query2);

$query="UPDATE teacher SET name = '$name', username = '$username', password = '$password' WHERE idteacher = '$idteacher'";
$db->exec($query);

include('adminPage.php');

?>