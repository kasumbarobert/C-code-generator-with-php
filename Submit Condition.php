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
	if(isset($_POST['add_to']))
	{
		$print=$_SESSION['if']." \n}";
		$add_to=$_POST['add_to'];
		if($add_to=='section')
		{
			if(isset($_SESSION['section']))
			{
				$section=$_SESSION['section'];
			}
			else{
				$section='getpremium';
				echo "<script>alert(\"The decision has been added to the trial section\") </script>";
			}
		
			if(isset($_SESSION['if']))
			{
				$con=connect();
				$getFunction="SELECT function FROM logs WHERE sectionName='$section'";
				$query1=mysql_query($getFunction) or die(mysql_error());
				$result1=mysql_fetch_array($query1);
				$newfunction=$result1['function'].$print;
				$newfunction=mysql_fix_string($newfunction);
				$AddPrint="UPDATE logs SET function='$newfunction' WHERE sectionName='$section'";
				$query2=mysql_query($AddPrint) or die(mysql_error());
				if($AddPrint)
				{
					echo "<script>alert(\"The decision has been added successfuly to the section\") </script>";
					unset($_SESSION['if']);
					echo "<script>window.location.href='Add Section.php'</script>";
				}
			}
		}
		else if($add_to=='decision')
		{ 
			
		}
		else if($add_to=='repetition')
		{
			$_SESSION['loop']=$_SESSION['loop'].$print;
		}
		else if($add_to=='switch')
		{
			if(isset($_SESSION['switch_case']))
			{
				$_SESSION['if']=$_SESSION['if']."}";
				$_SESSION['switch_case']=$_SESSION['switch_case']." ".$_SESSION['if'];
				$_SESSION['if']='';
			}
			else{
				echo "<script>alert(\"No case has been selected!\") </script>";
				header("Location:Add Switch.php");
			}
		}
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