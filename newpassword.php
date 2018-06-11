<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title>My Account| C Code Generator</title><!--Title of the page -->
<link rel="stylesheet" type="text/css" href="main_style_general.css">
<?php
require_once("utilityFunctions.php");
?>
<script type="text/javascript">
	function testMatch(){
		var code1=document.getElementById("password1").value;
		var code2=document.getElementById("password2").value;
		if(!(code1==code2)){
			alert("The passwords do not match");
		}
	}
</script>
</head>
<body>
<?php
	if(!(isset($_SESSION['Username'])))
	{
		die("Error while loading the page....");
	}
	else{
		require_once("student.php");
	}

?>
<div>
<aside id='first_section_main_page'>
<fieldset style='font-size:2em;'>
<a href="myprofile.php">View Profile</a><br />
<a href="editprofile.php">Edit profile</a><br />
<a href="newpassword.php">Change Password</a><br />
<a href="loginlogs.php">Login Details</a><br />
</fieldset>
</aside>
<section id='major_section'>
<center>
<fieldset style='font-size:1.8em;'>
<legend>Change your password from here</legend>
<div style='width:80%; margin:auto;'>
<form method="post" action="changepassword1.php">
<table>
<tr><td>Old password</td><td><input type='password' name='password' id='password' required='required'></td></tr>
<tr><td>New password</td><td><input type='password' name='password1' id='password1' required='required'></td></tr>
<tr><td>Confirm New password</td><td><input type='password' name='password2' id='password2' required='required' onChange="testMatch();"></td></tr>
</table>
<input type='submit' value='Change Password'> <input type='reset' value='Clear form'>
</form>
</div>
</fieldset>
</center>
</section>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>

