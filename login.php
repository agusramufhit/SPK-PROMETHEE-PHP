<?php
	include("koneksi.php");
	if (isset($_POST['button']))
	{
		$querylogin = mysqli_query($db, "SELECT * FROM login WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
		if ($datalogin = mysqli_fetch_array($querylogin))
		{
			session_start();
			$_SESSION['userlogin'] = $datalogin['username'];
			header("location:admin.php");	
		}
		else
		{
			header("location:login.php?pesan=Login Gagal");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SPK Promethee Login Form</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/style_login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="./assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="./assets/img/bg.svg">
		</div>
		<div class="login-content">
			<form id="form1" name="form1" method="post" action="">
				<img src="./assets/img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" id="username" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" id="password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" name="button" id="button" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="./assets/js/main.js"></script>
</body>
</html>

