<?php
$topic=$_POST['topic'];
$description=$_POST['topic_Description'];
if (isset($_SESSION['Username']))
{
$session=$_SESSION['Username'];
}
$con=mysql_connect("localhost", "root", "");
   mysql_select_db("c",$con) or die(mysql_error());
   $a="CREATE TABLE comments(Topic Varchar(50) Not Null PRIMARY KEY,
                             Description Text Not Null,
							 Name varchar(30) Not Null,
							 Submission_Time DateTime Not Null)";
 
$b=mysql_query($a,$con) or die(mysql_error()); 

$c="INSERT into comments VALUES('$topic',' $description',' $session',CURTIME())";
$d=mysql_query($c,$con)or die(mysql_error());
?>