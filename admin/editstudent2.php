<?php
include('database.php');
$idstudent=$_POST['idstudent'];
$major=$_POST['major'];
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];

$query2="INSERT INTO login 
	(username, password, type) VALUES 
	('$username', '$password', 'student')";

$db->exec($query2);

$query="UPDATE student SET name = '$name', major = '$major', username = '$username', password = '$password' WHERE idstudent = '$idstudent'";
$db->exec($query);

include('adminPage.php');

?>