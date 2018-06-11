<!--This page displays the login page-->
<html>
   <head>
     <meta charset="utf-8"/>
	 <link rel="stylesheet" type="text/css" href="style.css">
     <title>Login</title><!--Title of the page -->
   </head>
<style>
input, p{
	font-size:1.1em;
}
input[type='text']{
	
	background-color:#eea;
	border-radius:5px;
}
input[type='password']{
	
	background-color:#eea;
	border-radius:5px;
}
input.button{
	border-radius:4px;
	color:blue;
	background-color:#aaf;
	font-size:1.3em;
	text
}
a:hover{
	text-decoration:underline;
	color:red;
}
</style>
<body>
<fieldset style="position:absolute; background-color: #efefef; left:35%; top: 30%; width: 350px; height: 200px;border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">
<legend style='font-face:"arial, verdana, sans-serif";font-size:1.1em; color:#77f;text-align:centre;'>Enter your credentials</legend>
<form method='post' action='valid.php'>
<?php 
session_start();
if (isset($_SESSION['rejected_user'])) {
	echo $_SESSION['rejected_user'];
} 
?>
<p>Username &nbsp <input type='text' name='username' id='user_ID' placeholder="Enter your username" required='required' /></p>
<p>Password &nbsp <input type='password' name='password' id='passwordID' required='required'/></p>
<input type='submit' value='login' id='submit_button' class='button' style='margin-left:20%;' />
<a href='CreateAccount.php' style='margin-left:30%; color:blue;'>Sign Up</a>
</form>
</fieldset>
   </body>
</html>