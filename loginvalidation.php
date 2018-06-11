<?php

	session_start();
	if(!isset($_POST['userID']))
	{
		die("Illegal access");
	}

	$username=$_POST['userID'];
	$password=$_POST['password'];
	
	$con=mysql_connect("localhost", "root", "");
  
   mysql_select_db("C",$con) or die(mysql_error());
   
   $query="SELECT Name FROM NewAccount WHERE Password='$password'";
   
   $result= mysql_query($query)or die(mysql_error());
   
   if(mysql_num_rows($result)== 1)
   {
		$_SESSION['Name']=$username;
		$_SESSION['password']=$password;
		
		header("Location:Profile.php");
   }
   else{
		echo "<h1 style='color:red;'>Access denied</h1>Try to <a href='login.php'>log in again</a>";
   }
   
?>
