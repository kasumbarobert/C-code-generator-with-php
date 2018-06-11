<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<title>My Account| C Code Generator</title><!--Title of the page -->
<link rel="stylesheet" type="text/css" href="main_style_general.css">
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
<fieldset style='font-size:1.8em;'>
<table>
<th>Login Time</th><th>Logout Time</th><th>Date</th>
<?php
$session=$_SESSION['Username'];
$con=connect();	
	$result=mysql_query($query) or die(mysql_error());
$query="SELECT login.Time_Logged_In, login.Date, login.Time_Logged_Out, newaccount.Username FROM newaccount,login WHERE `newaccount`.`Username`=`login`.` Username` ORDER BY login.Date DESC";
$result=mysql_query($query) or die(mysql_error());
$count=1;
while($run=mysql_fetch_array($result))
	{
	$username=$run['Username'];
    $LoginTime=$run['Time_Logged_In'];
    $LogoutTime=$run['Time_Logged_Out'];
    $LoginDate=$run['Date'];
	
		if($username==$session){		
		echo"
		<tr><td align='center'>$LoginTime</td><td align='center'>$LogoutTime</td><td align='center'>$LoginDate</td></tr>
		";
		}
		else if($LogoutTime=='00:00:00' && $LoginDate!=Date("Y-m-d")){
			echo"
		<tr><td align='center'>$LoginTime</td><td align='center' style='color:green;'>Unavailable</td><td align='center'>$LoginDate</td></tr>
		";
		}
		else if($LogoutTime=='00:00:00' && $LoginDate==Date("Y-m-d")){
			echo"
		<tr><td align='center'>$LoginTime</td><td align='center' style='color:green;'>Unavailable</td><td align='center'>$LoginDate</td></tr>
		";
		}
		$count++;
		if($count==100)
		{
			break;
		}
	}
	echo "</table>";
?>
</fieldset>
</center>
</section>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>

