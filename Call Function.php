<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Call a function</title>
	<meta charset='utf-8'/>
	<script src="utilityFunctions.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
	<script>
</script>
<style type="text/css">
</style>
<?php
require_once("utilityFunctions.php");
require_once("usable_variables.php");
?>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<div style='' id='main_print'>
<div id='add_print_div_1'>
<fieldset style=''>
<form method='post' name='call_function' onSubmit='compileup();'>
Choose the function to call <select id='function_pass' name='function_pass' onClick='hide_show_content();BuildCall();'>
<option></option>
<?php
	$con=connect();
	$solution_id=$_SESSION['solution_id'];
	$section_worked_on=$_SESSION['section'];
	$result=mysql_query("SELECT * FROM logs WHERE SOLUTION_ID ='$solution_id' AND sectionName != 'main'") or die(mysql_error());
	$id_name=1;
	if(mysql_num_rows($result) != 0)
	{
		while($function=mysql_fetch_array($result)){
		$f_name=$function['SectionName'];
		$returnType=$function['returnType'];
		$name='func';
		echo "<option value='$f_name'>$f_name</option>";
		}
		echo "</select>";
		$result1=mysql_query("SELECT * FROM logs WHERE SOLUTION_ID ='$solution_id' AND sectionName != 'main'") or die(mysql_error());
		$id_name=1;
		while($function1=mysql_fetch_array($result1)){
		$f_name=$function1['SectionName'];
		$header=$function1['sectionHeader'];
		$query=mysql_query("SELECT * FROM variable WHERE variableScope='argument' AND sectionName='$f_name'");
		$number=mysql_num_rows($query);
		$id_div=$f_name;
		$name=$id_div."_div";
		$id_parameter=$id_div."_par";
		echo "<input type='hidden' name='number_of_parameters' id='$id_parameter' value='$number'  required/>";
		
echo <<<_END
<div style='display:none; background-color:#ddd;' id='$id_div' name='$name'>
$header <br />
_END;
	$parameters=0;

		while($parameters<$number)
		{
			$parameters++;
			$query1=mysql_query("SELECT * FROM variable WHERE (sectionName='$section_worked_on' OR variableScope='global') AND solution_id='$solution_id'");
			$select_id=$f_name."_pass_value_".$parameters;
			echo"
			<p> Choose the variable to pass as Parameter $parameters<select id='$select_id' name='$select_id' onClick='addParameters(\"$id_div\");' >";
			echo "<option></option>";
			while($variable=mysql_fetch_array($query1))
			{
			echo "<option value='".$variable['variableName']."'>".$variable['variableName']."</option>";
			}
			echo "</select>
			<p >If you wish to pass an expression, you have to <a href='Declare Variable.php'>declare</a> a variable and assign that expression to the variable using the <a href='Add Expression.php'>computation/expression</a> option.</p>
			<br />";
		}
		addVariablesfor_fuction_call($returnType);
echo <<<_END
Do you wish to assign the called function to a variable?<br />
<input type='radio' name='pass_to_var' id='pass_to_var_yes' value='1'/> Yes 
<input type='radio' name='pass_to_var' id='pass_to_var_no' value='0'/> No 
</div>
<script>
var number_of_parameters=$number;
</script>
_END;
$id_name++;
		
	}
	}
?>

<div>
<input type='hidden' id='generated_code' name='generated_code'>
<textarea cols='50' rows='10' id='generated_code_view' name='generated_code_view' disabled></textarea>
<?php
require_once("add_to.php");
?>
<input type='submit' value='Add Function Call'/>
</form>
</div>
<script>
function hide_show_content()
{
	var id=$('function_pass').value;
	
	var select=$('function_pass');
	var number=$('function_pass').options.length;
	for (var i=0; i<number; i++)
	{
		if(select.options[i].value=$('function_pass').value)
		{
			$(select.options[i].value).style.display='block';
		}
		else{
			$(select.options[i].value).style.display='none';
			
		}
	}

}
var called_function;
function updateExp(id)
{
	var call = $('generated_code_view').value;
	
	$('generated_code_view').value=$(id).value +" = " + call;
}

function BuildCall()
{
	var header=$('function_pass').value;
	var id=$('function_pass').value;
	if($(id+"_par").value==0) 
	{
		$('generated_code_view').value=id+"();";
		$('generated_code').value=id+"();";
	}
	else{
		$('generated_code_view').value=id+"(";
	}
}

function addParameters(id)
{
	var number_of_parameter=$(id+"_par").value;
	var count=0;
	var func_call=$('function_pass').value+"(";
	while(count<number_of_parameter)
	{
		count++;
		
		if(count==number_of_parameter)
		{
			func_call+=$(id+"_pass_value_"+count).value+"";
		}
		else{
			func_call+=$(id+"_pass_value_"+count).value+", ";
		}
	}

	func_call+=");";
	$('generated_code_view').value=func_call;
	$('generated_code').value=func_call;
}

function compileup()
{
	$('generated_code').value=$('generated_code_view').value;
}
</script>

</fieldset>

<?php

if(isset($_POST['generated_code']))
{
	$add_to=$_POST['add_to'];
	$con=connect();
	$print="\n".$_POST['generated_code'];
	$print=preg_replace('/[\,]\)$/', ')',$print);
	$section=$_SESSION['section'];
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
</div>
<?php
 require_once('footer.php');
?>
</body>


