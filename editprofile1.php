<?php
require_once("utilityFunctions.php");
$session=$_SESSION['Username'];
$con=connect();	
require_once("student.php");;//

		
$name=$_POST['Name'];
$DateOfBirth=$_POST['Date'];
$Username=$_POST['Username'];
$IdentificationNumber=$_POST['IdNo'];
$Category=$_POST['Category'];
			
$query="SELECT Name, DateOfBirth, Username, IdentificationNumber, Category FROM newaccount WHERE Username='$session'";
$result=mysql_query($query) or die(mysql_error());
			if(mysql_result($result,0,'Username')==$_SESSION['Username']){
				$query2="UPDATE newaccount SET Name='$name',DateOfBirth='$DateOfBirth',Username='$Username',IdentificationNumber='$IdentificationNumber',Category='$Category' WHERE Username='$session'";
				$updated=mysql_query($query2);
				if($updated){
					echo "
					<div>
                    <div style='width:10em; float:left; font-size:2em; margin-top:2em;'>
                    <a href='myprofile.php'>View Profile</a><br />
                    <a href='editprofile.php'>Edit profile</a><br />
					<a href='changepassword.php'>Change Password</a>
                    </div>
                    <div style='width:50em; margin-top:2em; font-size:2.5em;'>
					Your profile has been successfully changed
					</div>
					</div>
					";
					
				}
			}
			

	else{
				echo "<h1>Your profile was not changed</h1>";
			}		
?>