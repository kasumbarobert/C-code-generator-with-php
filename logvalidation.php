<?php

	session_start();
	if(!isset($_POST['userID']))
	{
		die("Illegal access");
	}

	$Username=$_POST['userID'];
	$Password=$_POST['password'];
	
$code1="$5%,!";
$code2="#?%2#";
$myCode=md5("$code1$Username$Password$code2"); 

	$con=mysql_connect("localhost", "root", "");
  
   mysql_select_db("c",$con) or die(mysql_error());
   
   $query="SELECT Name, Category FROM newaccount WHERE Username='Username' AND Password='$myCode'";
   
   $result= mysql_query($query)or die(mysql_error());
   
   $user=mysql_fetch_array($result);
   
   if($user['Username']==$Username)
   {
   
	if($user['Category']=='Student')
	{
		$_SESSION['Username']=$Username;
		header("location:Student Page.php");//redirecting the user to the manager's webpage
	}
	else{
		//creating the session for a member
		$_SESSION['Username']=$Username;
		header("Location:Teacher Page.php");
}
   }
   else{
		die("<em>Wrong Credentials entered....Access denied</em>");
		echo "Try to <a href='login.php'>log in again</a>";
   }
   
?>
