<?php
require_once("utilityFunctions.php");
$session=$_SESSION['Username'];
$con=connect();	
require_once("student.php");;//

		
$Password=$_POST['password'];
$Password1=$_POST['password1'];
$Password2=$_POST['password2'];

$query="SELECT Username, Password FROM newaccount WHERE Username='$session'";
$result=mysql_query($query) or die(mysql_error());
$run=mysql_fetch_array($result);
$Username=$run['Username'];

$code1="$5%,!";
$code2="#?%2#";
$myCode=md5("$code1$Username$Password$code2");
$myCode1=md5("$code1$Username$Password1$code2");

			if(mysql_result($result,0,'Username')==$_SESSION['Username']){
				$query2="UPDATE newaccount SET Password='$myCode1' WHERE Username='$session'";
				$updated=mysql_query($query2) or die(mysql_error());
				if($updated){
					echo "
					<div>
                    <div style='width:10em; float:left; font-size:2em; margin-top:2em;'>
                    <a href='myprofile.php'>View Profile</a><br />
                    <a href='editprofile.php'>Edit profile</a><br />
					<a href='changepassword.php'>Change Password</a>
                    </div>
                    <div style='width:50em; margin-top:2em; font-size:2.5em;'>
					Your password has been successfully changed
					</div>
					</div>
					";
					
				}
			}
			

	else{
				echo "<h1>Your password was not changed</h1>";
			}		
?>