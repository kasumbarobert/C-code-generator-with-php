<html>
<head>
<meta charset="utf-8"/>
<title>Account created</title><!--Title of the page -->
</head>
<body>
<?php

$Name=$_POST['Name'];
$DateOfBirth=$_POST['Date'];
$Username=$_POST['Username'];
$IdentificationNumber=$_POST['IdNo'];
$Category=$_POST['Category'];
$Password=$_POST['password1'];
$ConfirmPassword=$_POST['password2'];
$code1="$5%,!";
$code2="#?%2#";
$myCode=md5("$code1$Username$Password$code2");

echo "Thank you $Name for creating an account."; 
$con=@mysql_connect("localhost", "root", "");
   mysql_select_db("c",$con) or die(mysql_error());
 
$a="INSERT INTO newaccount(Name,DateOfBirth,Username,IdentificationNumber,Category,Password) VALUES('$Name','$DateOfBirth','$Username','$IdentificationNumber','$Category','$myCode')";
mysql_query("$a",$con) or die(mysql_error());
 
?>
<a href="login.php">Continue to login</a>
</body>
</html>