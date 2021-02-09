<?php
	include('database.php');
	$query='SELECT * FROM teacher';
	$teachers=$db->query($query);
?>

<head>
	<title>Edit Professor</title>
	<link rel="shortcut icon" href="../logo2.PNG">
	<link rel="stylesheet" href="editAddCSS.css?v=<?php echo time(); ?>">
</head>
<header>
		<h1>Athona<a><img src="../logo3.PNG" alt="logo3" height="60" class="topLogo"></a></h1>
</header>
<body>
	<main>
		<h2>Edit a Professor</h2>
		<form action="editteacher2.php" method="post" class="post">	
		<label> Professor to Edit:</label>
		<select name ="idteacher">
		<?php foreach($teachers as $teacher):?>
		<option value = "<?php echo $teacher['idteacher']?>"> <?php echo $teacher['name']?></option>
		<?php endforeach;?>
		</select><br>
		<label> Name:</label>
		<input type="text" name="name"><br>
		<label> UserName:</label>
		<input type="text" name="username"><br>
		<label> Password:</label>
		<input type="text" name="password"><br>
		<input type="submit" id="button" value="Edit Professor">
		</form>

	<p><u><a href="adminPage.php">Back to List</a></u></p>

	</main>
</body>
<footer>
	<form method="get" action="../login/loginPage.php" style="float:right;margin:40px 10px;">
    <button type="submit">Log Out</button>
	</form>
	<img src="../logo4.PNG" style="margin:10px;height:80px;filter:grayscale(100%);">	
</footer>