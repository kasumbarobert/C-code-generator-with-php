<?php
session_start();
require_once("utilityFunctions.php");
if(isset($_POST['username']))
{
$Username=$_POST['username'];
$Password=$_POST['password'];
$code1="$5%,!";
$code2="#?%2#";
$myCode=md5("$code1$Username$Password$code2");

$con=@mysql_connect("localhost", "root", "");
  
mysql_select_db("c",$con) or die(mysql_error());
$Username=mysql_fix_string($Username);
$myCode=mysql_fix_string($myCode);
$loginQuery="SELECT Username, Name, Category FROM newaccount WHERE Username='$Username' AND Password='$myCode'";

$loginResult=mysql_query($loginQuery);

$user=mysql_fetch_array($loginResult);

if($user['Username']==$Username)
{
	$query="INSERT INTO `c`.`login` (`Time_Logged_In`, `Date`, ` Username`) VALUES(CURTIME(),CURRENT_DATE(),'$Username')";
	mysql_query($query) or die(mysql_error());
	
	if($user['Category']=='Student')
	{
		$_SESSION['Username']=$Username;
		$_SESSION['user_category']='Student';
		$_SESSION['the_name']=$user['Name'];
		header("Location:index.php");
	}
	else{
		$_SESSION['Username']=$Username;
		$_SESSION['user_category']='Teacher';
		$_SESSION['the_name']=$user['Name'];
		header("Location:index.php");
        }
}
else{
	$_SESSION['rejected_user']="<em style='color: red;font: bold 20px Tahoma;'>Wrong credentials entered</em>";
	echo "<script>window.location.href='login.php'</script>";
	

	}
}
else{
	die("<em>Illegal access...............You cannot access this page without logging in</em>");
} 
  ?> 