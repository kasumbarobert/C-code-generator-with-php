<html>
<head>
	<title>Building an if statement</title>
	<script src="utilityFunctions.js"></script>
	<script>
</script>
<style type="text/css">
</style>
<?php
require_once("utilityFunctions.php");
?>
</head>
<body>

<div>
<form method='post' action='' >
<div>
<?php
	if(isset($_POST['add_case']))
	{
			$con=connect();
			$switch=$_SESSION['switch'];
			$case=$_SESSION['switch_case'];
			$caseValue=mysql_fix_string($_SESSION['case_value']);
			$getFunction="SELECT header FROM switch WHERE id='$switch'";
			$query1=mysql_query($getFunction) or die(mysql_error());
			$result1=mysql_fetch_array($query1);
			$currentSwitch=$result1['header']."\n".$case."break;";
			$currentSwitch=mysql_fix_string($currentSwitch);
			$AddPrint="UPDATE switch SET header='$currentSwitch' WHERE id='$switch'";
			$insertSwitch=mysql_query($AddPrint) or die(mysql_error());
			if($insertSwitch)
			{
				$query2="UPDATE cases SET case_Status='1' WHERE case_Value='$caseValue'";
				mysql_query($query2) or die(mysql_error());
				$case=mysql_fix_string($case);
				$query3="UPDATE cases SET case_Body='$case' WHERE case_Value='$caseValue'";
				mysql_query($query3) or die(mysql_error());
				echo "<script>alert(\"The switch has been updated successfuly to the section\") </script>";
				unset($_SESSION['switch_case']);
				unset($_SESSION['case_value']);
				echo "<script>
				alert('The switch statement has been updated successfuly');
				window.location.href='Add Switch.php'</script>";
			}
			
		
	}
?>
<?php
if(isset($_POST['add_Switch_to_Section']))
{
	$add_to=$_POST['add_to'];
	$print="\n".$_SESSION['complete_switch']."}";
	$con=connect();
	if($add_to=='section'){
	if(isset($_SESSION['section']))
	{		
		$section=$_SESSION['section'];
		$getFunction="SELECT function FROM logs WHERE sectionName='$section'";
		$query1=mysql_query($getFunction) or die(mysql_error());
		$result1=mysql_fetch_array($query1);
	$newfunction=$result1['function'].$print;
		$newfunction=mysql_fix_string($newfunction);
		$AddPrint="UPDATE logs SET function='$newfunction' WHERE sectionName='$section'";
		$query2=mysql_query($AddPrint) or die(mysql_error());
		if($query2)
		{
			echo "<script>alert(\"The section has been updated successfuly\")</script>";
			unset($_SESSION['switch']);
		}
	}
	}
	else if($add_to=='decision')
	{
		if(isset($_SESSION['if']))
		{
			$_SESSION['if']=$_SESSION['if'].$print;
			echo $_SESSION['if'];
		}
		else{
			Location("Header:Add Condition.php");
		}
	}
	else if($add_to=='repetition')
	{
		if(isset($_SESSION['loop']))
		{
			$_SESSION['loop']=$_SESSION['loop'].$print;
		}
		else{
			//Location("Header:Add Condition.php");
		}
	}
	else if($add_to=='switch')
	{
		if(isset($_SESSION['switch_case']))
		{
			$_SESSION['switch_case']=$_SESSION['switch_case'].$print;
		}
		else{
			
			echo "<script>alert(\"No case has been selected\") ";;
			echo "Click <a href='Add Switch.php'>here</a> to choose a case";
		}
	}
	echo "<script>window.location.href='Add Switch.php'</script>";
}
?>

</div>
<div>

</div>
</form>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>