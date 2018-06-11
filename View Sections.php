<html>
<head>
<?php
require_once("utilityFunctions.php");
?>
</head>
<body>
<form method='post'>
<?php
	$con=connect();
	$getSections="SELECT sectionName FROM logs ORDER BY Date DESC";
	$result=mysql_query($getSections) or die(mysql_error());
	echo "Select the section to add the variable <select id='section' name='section'>'";
	while($section=mysql_fetch_array($result))
	{
		print("<option value='".$section["sectionName"]."'>".$section["sectionName"]."</option>");
	}
	echo "</select>";
?>
<input type='submit' value='view'/>
</form>
<?php
if(isset($_POST['section']))
{
	$con=connect();
	$section=$_POST['section'];
	$getFunction="SELECT function FROM logs WHERE sectionName='$section'";
	$query1=mysql_query($getFunction) or die(mysql_error());
	$result1=mysql_fetch_array($query1);
	$newfunction=$result1['function'];	
	$newfunction=preg_replace('/[;]/',';<br />',$newfunction);
	$newfunction=preg_replace('/[:]/',':<br />',$newfunction);
	$newfunction=preg_replace('/[{]/','{<br />',$newfunction);
	$newfunction=$newfunction."<br />}";
	echo $newfunction;
}
?>
<?php
 require_once('footer.php');
?>
</body>
</html>
