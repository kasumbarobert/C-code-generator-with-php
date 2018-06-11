<html>
<head>
	<title>Add return Statement</title>
	<script src="declare_variable.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
	<script>
	function generateReturn()
	{
		var returnValue;
		var statement="return "+$('returnValue').value+";";
		$('generated_code').value=statement;
		$('generated_code1').value=statement;
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
<div id='main_print'>
<div id='add_print_div_1'>
<h1 style='text-align:centre;'>Return Statement</h1>

<?php
if(isset($_SESSION['section']))
{
	$con=connect();
	$sectionName=$_SESSION['section'];
	$getSections="SELECT variableName,variableType,`logs`.`returnType` FROM variable, logs WHERE variable.sectionName='$sectionName' AND variable.variableType =`logs`.`returnType`";
	$result=mysql_query($getSections) or die(mysql_error());
	
	$getReturn="SELECT `logs`.`returnType` FROM logs WHERE sectionName='$sectionName'";
	$result1=mysql_query($getReturn) or die(mysql_error());
	$result1=mysql_fetch_array($result1);
	if($result1['returnType']=='void')
	{
		print( "You can not return a value for the function you are working on! It has return type set to void which means it can't return a value");
	}
	else{
	echo "
	<form method='post' action='Add Return.php' id='add_return' onMouseOver='generateReturn();'>
	<p>Choose the variable to return<br />
	<select id='returnValue' name='returnValue' onClick='generateReturn();'>";
	while($section=mysql_fetch_array($result))
	{
		$sect=$section["variableName"];
		$type=$section["variableType"];
		print("<option value='$sect'>".$section["variableName"]."</option>  ");
	}
echo <<<_END
</select>&nbsp &nbsp &nbsp &nbsp &nbsp
Note: Only variables with same type as the section are shown here</p>

Build a return expression?
<input type='radio' name='build_return_exp' id='build_return_exp_yes' value='1'/>Yes <input type='radio' name='build_return_exp' id='build_return_exp_no' value='0' checked/>No <br /> 
<div id='build_return' style='display:none;'>
_END;
require_once("calculator.php");
require_once("usable_variables.php");
addVariables();
echo "</div>";
require_once("add_to.php");
echo <<<_END

<input type='hidden' name='generated_code' id='generated_code'/>
<textarea id='generated_code1' cols='50' disabled></textarea><br /><br />
<input type='submit' value='Add Return Statement'/> &nbsp &nbsp &nbsp &nbsp &nbsp
<input type='reset' value='Clear' /><br /><br />
</form>
</div>

_END;
}
}else
{
	echo "<h1 style='color:red;'>There is no created function. First create a function and then add return statements</h1>";
}


?>
<?php
if(isset($_POST['generated_code']))
{
	$add_to=$_POST['add_to'];
	$con=connect();
	$print="\n".$_POST['generated_code'];
	$section=$_POST['section'];
	if($add_to=='section'){
		$getFunction="SELECT function FROM logs WHERE sectionName='$section'";
		$query1=mysql_query($getFunction) or die(mysql_error());
		$result1=mysql_fetch_array($query1);
		$newfunction=$result1['function'].$print;
		$newfunction=mysql_fix_string($newfunction);
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
</div>
<script>
function updateExp(value)
{
	$("expression").value+=value;
	var returnExp=$("expression").value;
	
	$("generated_code").value="return "+returnExp+" ;";
	$("generated_code1").value="return "+returnExp+" ;";
	
}
function BuildExp()
{
	var returnExp=$("expression").value;
	if($('build_return_exp_yes').checked){
	$("generated_code").value="return "+returnExp+" ;";
	$("generated_code1").value="return "+returnExp+" ;";}
}
function activate()
{
	$("build_return").style.display='block';
	$("expression").disabled=false;
	$("returnValue").disabled=true;
}
function deactivate()
{
	$("build_return").style.display='none';
	$("expression").disabled=true;
	$("returnValue").disabled=false;
}
$("build_return_exp_yes").addEventListener("click",activate);
$("build_return_exp_no").addEventListener("click",deactivate);
$("add_return").addEventListener("mouseover",BuildExp);
</script>
<?php
 require_once('footer.php');
?>
</body>
</html>