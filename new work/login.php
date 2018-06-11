<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css">
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="NavBar">
	<nav>
		<ul>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
		<h1>Login!</h1>
	</div>
	<div id="ContentLeft">
		<h2>About this system</h2><br />
		<h5>This system will help you generate code in the C language. You will be able to upload problems and solve any uploaded problems 
		by others.<br /> Please remember to finish and properly organise your solution before attempting to solve a problem. Remember to first
		complete a function before moving on to another one</h5>
	</div>
	<div id="ContentRight">
		<form method='post' action='../C/valid.php'>
		<?php 
		session_start();
		if (isset($_SESSION['rejected_user'])) {
			echo $_SESSION['rejected_user'];
		} 
		?>
			<table class="table2">
				<tr>
					<p><h6>Username</h6><br />
					<input type="text" name='username' id='user_ID' placeholder="Enter your username" class="StyleTxtField" required='required'></p>
				</tr>
				<tr></tr>
				<tr>
					<p><h6>Password</h6><br />
					<input type="password" class="StyleTxtField" name='password' id='passwordID' required='required'></p>
				</tr>
				<tr></tr>
				<tr>
					<input type="submit" value="Login" id='submit_button' class='button'>
				</tr>
				<tr></tr>
			</table>
		</form></div>
	<div id="Content"></div>
</div>
<div id="Footer"></div>
</div>
</body>
</html>
