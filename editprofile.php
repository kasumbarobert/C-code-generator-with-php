<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title>My Account| C Code Generator</title><!--Title of the page -->
	<script src='utilityFunctions.js'></script>
	<link rel='stylesheet' href='main_style.css'/>
	<link rel="stylesheet" type="text/css" href="main_style_general.css"/>
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
<section id='major_section'>
<center>
<fieldset>
<div style='width:80%; margin:auto; font-size:1.8em; '>

<?php
$session=$_SESSION['Username'];
$con=connect();
$query="SELECT Name, DateOfBirth, Username, IdentificationNumber, Category, Password FROM newaccount WHERE Username='$session'";
	$result=mysql_query($query) or die(mysql_error());
	$run=mysql_fetch_array($result);
	$name=$run['Name'];
	$DateOfBirth=$run['DateOfBirth'];
	$Username=$run['Username'];
	$IdentificationNumber=$run['IdentificationNumber'];
	$Category=$run['Category'];
	echo"

<form method='post' action='editprofile1.php'>
<table>
<tr><td>Name</td><td><input type='text' name='Name' id='Name1' value='$name' onChange='testName1();' ></td></tr>
<tr><td>Date of Birth</td><td><input type='text' name='Date' id='Date' value='$DateOfBirth'><i><font color='red' size='2em'>*Please write the date in the format; yyyy-mm-dd</font></i></td></tr>
<tr><td>Username</td><td><input type='text' name='Username' id='Username' value='$Username' disabled></td></tr>
<tr><td>Student Number</td><td><input type='text' name='IdNo' id='IdNo' value='$IdentificationNumber' maxlength=30 disabled></td></tr>
<tr><td>Category</td><td>
<select name='Category' disabled >
<option>$Category</option>
</select></td></tr>
</table>
<input type='submit' value='Save' onSubmit='testAllFields();'> <input type='reset' value='Reset data'>
</form>
";
?>
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

