<html>
<head>
	<title>Read Statement</title>
<?php
require_once("utilityFunctions.php");
?>
<script src="getSpecifier.js"></script>
<script src="declare_variable.js"></script>
<link rel='stylesheet' href='main_style.css'/>
<script>
function generateRead(id)
{
	var type=document.add_read.var.value;
	var specifier=getSpecifier(type);
	var read="scanf(\""+specifier+"\",&"+id+");";
	$('generated_code').value=read;
	$('generated_code1').value=read;
}
</script>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<div id='main_print'>
<div id='add_print_div_1'>
<h1 style='text-align:centre;'>Read Statement</h1>
<?php
if(isset($_SESSION['section']))
{
echo "<form method='post' name='add_read'>
	<p>Pick the variable whose value you intend to read/request from user<br />";
	
	$con=connect();
	$sectionName=$_SESSION['section'];
	$getSections="SELECT variableName,variableType FROM variable WHERE sectionName='$sectionName' or variableScope='global'";
	$result=mysql_query($getSections) or die(mysql_error());
	while($section=mysql_fetch_array($result))
	{
		$sect=$section["variableName"];
		$type=$section["variableType"];
		print("<input type='radio' value='$type' name='var' id='".$section["variableName"]."' onClick='generateRead(\"$sect\");' />".$section["variableName"]."  ");
	}

echo <<<_END
	<br/><br />
	<input type='hidden' name='section' value='$sectionName'/>
	<a href='Declare Variable.php'>Add a new variable if you don't see what you want to use</a>
	</p>
	<input type='hidden' name='generated_code' id='generated_code'/>
	<textarea id='generated_code1' cols='50' disabled>
	</textarea><br /><br />
_END;
require_once("add_to.php");
echo <<<_END
	<input type='submit' value='Add Read Statement'/> &nbsp &nbsp &nbsp &nbsp &nbsp
	<input type='reset' value='clear'>
</form>
</div>
_END;
}
else{
	echo " No section is being worked on!</div>";
}
?>
<div id='add_print_div_2' class='code_preview' >
<?php
require_once('code_preview.php');
?>
</div>
</div>
<?php
if(isset($_POST['generated_code']))
{
	$con=connect();
	$add_to=$_POST['add_to'];
	$print="\n".$_POST['generated_code'];
	$section=$_SESSION['section'];
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
	echo "<script>window.location.href='Add Read.php'</script>";
}
?>
<?php
 require_once('footer.php');
?>
</body>
</html>