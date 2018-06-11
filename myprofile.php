<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title>My Account| C Code Generator</title><!--Title of the page -->
<link rel="stylesheet" type="text/css" href="main_style_general.css">
	<link rel='stylesheet' href='main_style.css'/>
<script>
function $(id)
	{
		return document.getElementById(id);
	}
</script>
<?php
require_once("utilityFunctions.php");
?>
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
<?php
$session=$_SESSION['Username'];
$con=connect();
$query="SELECT Name, DateOfBirth, Username, IdentificationNumber, Category FROM newaccount WHERE Username='$session'";
	$result=mysql_query($query) or die(mysql_error());
	$run=mysql_fetch_array($result);
	$name=$run['Name'];
	$DateOfBirth=$run['DateOfBirth'];
	$Username=$run['Username'];
	$IdentificationNumber=$run['IdentificationNumber'];
	$Category=$run['Category'];
echo<<<_END
<style>
.attribute{
color:#00b;
}
</style>
<section id='major_section'>
<fieldset style=font-size:2em;>
<table>
<tr><td class='attribute'><label>Name:</label></td><td>$name</td></tr>
<tr><td class='attribute'><label>Date Of Birth:</label></td><td>$DateOfBirth</td></tr>
<tr><td class='attribute'><label>Username:</label></td><td>$Username</td></tr>
<tr><td class='attribute'><label>Student Number:</label></td><td>$IdentificationNumber</td></tr>
<tr><td class='attribute'><label>Category:</label></td><td>$Category</td></tr>
</table>
</fieldset>
</section>
_END;
?>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>

