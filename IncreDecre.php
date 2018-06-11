<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Add Increment/Decrement</title>
	<script src='utilityFunctions.js'></script>
	<link rel='stylesheet' href='main_style.css'/>
	<link rel="stylesheet" type="text/css" href="main_style_general.css"/>
<script>

function $(id)
	{
		return document.getElementById(id);
	}
</script>
<?php
require_once("utilityFunctions.php");
?>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<?php
if(isset($_SESSION['section']))
{
echo <<<_END
<div id='add_print_div_1' name='add_print' >
<h1 style='text-align:centre;'>Increment/Decrement Statement</h1>
<form method='post' name='add_increment' onChange='incre_decre();'>
<div>
	<section id='vars'>Select the variable that you wish to increment/decrement<br />
_END;
    $con=connect();
	$sectionName=$_SESSION['section'];
	$solution_id=$_SESSION['solution_id'];
	$retrieveSections="SELECT variableName,variableType FROM variable WHERE (sectionName='$sectionName' or variableScope='global') AND solution_id='$solution_id'";
	$result=mysql_query($retrieveSections) or die(mysql_error());
	while($section=mysql_fetch_array($result))
	{
		$sect=$section["variableName"];
		$type=$section["variableType"];
		print("<input type='radio' value='".$section["variableName"]."' name='variable_Name' id='".$section["variableName"]."' onClick='getValue(\"$sect\");' />".$section["variableName"]." <br /> ");
	}
	echo"</section>";

echo <<<_END
    <a href='Declare Variable.php'>Add a new variable if you do not wish to use any of the above available variables</a>
	<p><section id=''>Choose the action that you wish to perform to the selected variable<br />
    <input type='radio' id='increase_variable_yes' name='increase_variable' value='+'/>Increment<br /><input type='radio' id='increase_variable_yes' name='increase_variable' value='-'/>Decrement <br /></p>
	<p>By what value do you wish to increment/decrement the variable
	<input type='number' name='value-id' id='value_id' value='1' required='required'/><br /></p>
_END;
require_once('add_to.php');
echo <<<_END
	<input type='submit' value='Add Increment/Decrement Statement'/> &nbsp &nbsp &nbsp &nbsp &nbsp
	<input type='reset' value='clear'></div> 
	<div style='padding:5%;'>
	<input type='hidden' name='section' value='$sectionName'/>
	<input type='hidden' id='generated_code' name='generated_code'>
	<textarea cols='50' rows='10' id='generated_code_view' name='generated_code_view' disabled></textarea>
	</div>
	</form>
_END;
}
else{
	echo "<script>window.location.href='Add Section.php'</script> ";
}
?>
<script>
function incre_decre()
{
var variable=document.add_increment.variable_Name.value;
var action=document.add_increment.increase_variable.value;
var increaseBy=$("value_id").value;
var exp;
if(action=='+'){
	exp=variable+"="+variable+"+"+increaseBy+";";
	$("generated_code").value=exp;
	$("generated_code_view").value=exp;
}
else if(action=='-'){
	exp=variable+"="+variable+"-"+increaseBy+";";
	$("generated_code").value=exp;
     $("generated_code_view").value=exp;
}

}
</script>
<?php
if(isset($_POST['generated_code']))
{
	$add_to=$_POST['add_to'];
	$con=connect();
	$print="\n".$_POST['generated_code'];
	$section=$_POST['section'];
	if($add_to=='section'){
	if(UpdateSection($print,$section))
	{
		echo "<script>alert('successful add')</script>";
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
}
?>
</div>
<div id='add_print_div_2' class='code_preview' >
<?php
require_once('code_preview.php');
?>
</div>

<?php
 require_once('footer.php');
?>
</body>
</html>