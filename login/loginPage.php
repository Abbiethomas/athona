<?php
    
?>
<head>
<meta charset="utf-8">
        <title>Login</title>
		<script src="loginControl.js"></script>
 		<link rel="shortcut icon" href="../logo2.PNG">
       	<link rel="stylesheet" href="loginPageCSS.css?v=<?php echo time(); ?>">
</head>
<header>
		<h1>Athona
			<a><img src="../logo3.PNG" alt="logo3" height="60" class="topLogo"></a>
		</h1>
</header>
<body>
	<main>
		<h2>Login</h2>	
		<form action="check.php" method="post" class="log">
		<label>UserName :</label><br>
		<input type="text" name="username" id="username"/><br>
		<label>Password :</label><br>
		<input type="password" name="password" id="password"/><br>
		<input type="submit" value="Login" id="submit"/><br>
		<span id="userError" style="color:red; width=400px;"></span><br>
		</form>
	</main>
</body>
<footer>
	<img src="../logo4.PNG" style="margin:10px;height:80px;filter:grayscale(100%);">	
</footer>