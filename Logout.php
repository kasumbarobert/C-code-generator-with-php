<html>
<head>
 <meta charset="utf-8"/>
 <title>Logged out</title><!--Title of the page -->
</head>

<body>
<?php

require_once("utilityFunctions.php");
	$con=connect();
	$username=$_SESSION['Username'];
	$query1="SELECT Time_Logged_In FROM login WHERE `login`.` Username`='$username' AND Date=CURRENT_DATE() ORDER BY Time_Logged_In DESC";
	$result1=mysql_query($query1) or die(mysql_error());
	$time=mysql_fetch_array($result1);
	$login_time=$time['Time_Logged_In'];
	$query2="UPDATE login SET Time_Logged_Out=CURTIME() WHERE  `login`.` Username`='$username' AND Time_Logged_In='$login_time'";
	$result2=mysql_query($query2) or die(mysql_error());
	if($result2){
	session_destroy();
	echo " You have been logged out. Click <a href='login.php'>here</a> to login again";
	}
?> 
</body>
</html>