<?php
include('database.php');

$name=$_POST['name'];
$major=$_POST['major'];
$username=$_POST['username'];
$password=$_POST['password'];

$query2="INSERT INTO login 
	(username, password, type) VALUES 
	('$username', '$password', 'student')";

$db->exec($query2);

$query="INSERT INTO student 
	(name, major, username, password) VALUES 
	('$name', '$major', '$username', '$password')";

$db->exec($query);
include('adminPage.php');

?>