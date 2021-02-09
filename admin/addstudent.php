<head>
	<title>Add Student</title>
	<link rel="shortcut icon" href="../logo2.PNG">
	<link rel="stylesheet" href="editAddCSS.css?v=<?php echo time(); ?>">
</head>
<header>
		<h1>Athona<a><img src="../logo3.PNG" alt="logo3" height="60" class="topLogo"></a></h1>
</header>
<body>
	<main>
		<h2>Create a Student</h2>
		<form action="addstudent2.php" method="post" class="post">	

		<label> Name:</label>
		<input type="text" name="name"><br>
		<label> Major:</label>
			<select name="major">
				<option value="Art History">Art History</option>
				<option value="Business">Business</option>
				<option value="Biology">Biology</option>
				<option value="Chemistry">Chemistry</option>
				<option value="Computer Science">Computer Science</option>
				<option value="Finance">Finance</option>
				<option value="Psychology">Psychology</option>
				<option value="Spanish">Spanish</option>
			</select>		
		<label> UserName:</label>
		<input type="text" name="username"><br>
		<label> Password:</label>
		<input type="text" name="password"><br>
		<input type="submit" id="button" value="Add Student">

		</form>

		<p><a href="adminPage.php">Back to List</a></p>

	</main>
</body>
<footer>
	<form method="get" action="../login/loginPage.php" style="float:right;margin:40px 10px;">
    <button type="submit">Log Out</button>
	</form>
	<img src="../logo4.PNG" style="margin:10px;height:80px;filter:grayscale(100%);">	
</footer>