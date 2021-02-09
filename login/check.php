<?php
	session_start();

    include_once('database.php');
	$name= $_POST['username'];	
	$password =$_POST['password'];

	//teacher
	$test =" SELECT idteacher FROM teacher WHERE username = '$name' ";
	$pa=$db->query($test);
	
	//student
	$test2 =" SELECT idstudent FROM student WHERE username = '$name' ";
	$stud=$db->query($test2);
	
	$query = "SELECT * FROM login
				WHERE username='$name' AND password='$password'";			
	$data=$db->query($query);
	
	foreach($data as $attr){
		if($attr['type'] == 'teacher'){
			foreach($pa as $pt){
				$_SESSION["id"] = $pt['idteacher'];
			}	
			echo '<script type="text/JavaScript">  
			alert("Login Successfully") 
			window.location.replace("../teacher/teacherPage.php");
			</script>' ; 
		}
		else if($attr['type'] == 'student'){
			foreach($stud as $pt){
				$_SESSION["id"] = $pt['idstudent'];
			}
			echo '<script type="text/JavaScript">  
			alert("Login Successfully") 
			 window.location.replace("../student/studentPage.php");
			 </script>' ; 
		}
		else if($attr['type'] == 'admin'){
			echo '<script type="text/JavaScript">  
			alert("Login Successfully") 
			 window.location.replace("../admin/adminPage.php");
			 </script>' ; 
		}
		else{	
			echo '<script type="text/JavaScript">  
			 alert("Invalid username or password") 
			 window.location.replace("loginPage.php");
			 </script>' ;
		}
	}
?>

		<script type="text/JavaScript">  
			localStorage.setItem("text", "* Invalid username or password");
			window.location.replace("loginPage.php");
		 </script>

