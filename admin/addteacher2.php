<?php
include('database.php');

$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];

$query2="INSERT INTO login 
	(username, password, type) VALUES 
	('$username', '$password', 'teacher')";

$db->exec($query2);

$query="INSERT INTO teacher 
	(name, username, password) VALUES 
	('$name', '$username', '$password')";

$db->exec($query);

include('adminPage.php');

?>