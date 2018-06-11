<html>
<head>
	<title>Add Expression</title>
	<script src="utilityFunctions.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
<?php
require_once("utilityFunctions.php");
?>
<script>
</script>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<div id='main_print'>
<div id='add_print_div_1'>
<h1 style='text-align:center;'>Add a computation</h1>
<?php
echo <<<_END
<form method='post' action='Add Expression.php' onSubmit='able_exp();'>
<div style=''>Enter your expression below<br />
_END;

require_once("calculator.php");

echo "</div>";
require_once("usable_variables.php");
addVariables();
require_once("add_to.php");

echo "
<input type='submit' value='Add Expression'>&nbsp &nbsp
<input type='reset' value='Clear'>
</form>";
if(isset($_POST['expression'])){
	$con=connect();
	$print="\n".$_POST['expression'].";";
	$section=$_POST['section'];
	$add_to=$_POST['add_to'];
	if($add_to=='section'){
	$getFunction="SELECT function FROM logs WHERE sectionName='$section'";
	$query1=mysql_query($getFunction) or die(mysql_error());
	$result1=mysql_fetch_array($query1);
	$newfunction=$result1['function'].$print;
	$AddPrint="UPDATE logs SET function='$newfunction' WHERE sectionName='$section'";
	$query2=mysql_query($AddPrint) or die(mysql_error());
	}
	else if($add_to=='decision')
	{
		if(isset($_SESSION['if']))
		{
			$_SESSION['if']=$_SESSION['if'].$print;
			echo "<script>window.location.href='Add Condition.php'</script>";
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
			echo "<script>window.location.href='Add Loop.php'</script>";
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
			echo "<script>window.location.href='Add Switch.php'</script>";
		}
		else{
			
			echo "<script>alert(\"No case has been selected\") ";;
			echo "Click <a href='Add Switch.php'>here</a> to choose a case";
		}
	}
}
else{

}
?>
</div>
<div id='add_print_div_2' class='code_preview' >
<?php
require_once('code_preview.php');
?>
</div>
</div>
<script>
function updateExp(value)
{
	$("expression").value+=value;
}

function able_exp()
{
	$("expression").disabled=false;
}
</script>
<?php
 require_once('footer.php');
?>
</body>
</html>