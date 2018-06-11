<html>
<head>
	<title>Adding compponents to a switch</title>
	<script src="utilityFunctions.js"></script>
	<script>
		var number_of_cases=1;
	</script>
	<style type="text/css">
	</style>
	<?php
		require_once("utilityFunctions.php");
	?>
</head>
<body>
<?php

if(isset($_POST['chosen_case']))
{
	$_SESSION['case_value']=$_POST['chosen_case'];
	if($_SESSION['case_value']=='default'){
	$_SESSION['switch_case']=$_POST['chosen_case']." :";
	}
	else{
		$_SESSION['switch_case']="case ".$_POST['chosen_case']." :";
	}
	header("Location:Add Switch.php");
}

if(isset($_SESSION['switch']))
{
	$con=connect();
	$switch=$_SESSION['switch'];
	$getFunction="SELECT header FROM switch WHERE id='$switch'";
	$query1=mysql_query($getFunction) or die(mysql_error());
	
	$result1=mysql_fetch_array($query1);
	$newfunction=$result1['header'];
	$newfunction=preg_replace('/[;]/',';<br />',$newfunction);
	$newfunction=preg_replace('/[{]/','{<br />',$newfunction);
	$newfunction=preg_replace('/[:]/',':<br />',$newfunction);
	$newfunction=$newfunction."<br />}";
	
	echo $newfunction;
}
?>
<?php
 require_once('footer.php');
?>
</body>
</html>