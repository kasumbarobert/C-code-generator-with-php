<html>
<head>
	<title>Add Repitition</title>
	<script src="utilityFunctions.js"></script>	
	<link rel='stylesheet' href='main_style.css'/>
	<script></script>
<style type="text/css">
</style>
<?php
	require_once("utilityFunctions.php");
?>
</head>
<body>
<link rel='stylesheet' href='main_style.css'/>
<?php
require_once("generate_code_header.php");
?>
<div id='main_print'>
<div id='add_print_div_1' >
<h1>Repetition Structure</h1>
<?php
if(isset($_SESSION['loop']))
{
	echo '<h3>Below is the current loop structure</h3>';
	printcode($_SESSION['loop']);
echo <<<_END
<hr border='1'>
<form method='post' action='Add Loop.php'>
Choose where to add the Repetition<br />
	<input type='radio' name='add_to' id='add_to_section' value='section' required='required'/>Section <br /><input type='radio' name='add_to' id='add_to_decision' value='decision' required='required'/>If statement<br />
	<input type='radio' name='add_to' id='add_to_switch_case' value='switch' required='required'/>Case in a Switch<br /><br />
<input type='submit' value='Submit Switch'> <br /><span style='color:red;'>Note: Only add the repetition structure once you are done building it</span>
</form>
_END;
}
else{
echo <<<_END
<form method='post' action='' style='' id='add_loop' name='add_loop' >
<div style=''>
<p id='enter_exp'>Enter the repetition control condition expression</p>
<textarea cols='60' rows='5' id="expression" name="expression"></textarea><br />
</div>
_END;
require_once("conditional_operators.php");
echo "<div style=' background-color:#aaa;' id='variables'>
The following variables can be used in the expression<br />
<p style='padding-left:3%;'>
";
	$sectionName=$_SESSION['section'];
	$con=connect();
	$getSections="SELECT variableName,variableType FROM variable WHERE sectionName='$sectionName' OR variableScope='global'";
	$result=mysql_query($getSections) or die(mysql_error());
	while($section=mysql_fetch_array($result))
	{
		$sect=$section["variableName"];
		$type=$section["variableType"];
		print("<input type='checkbox' id='$sect' value='$sect' onClick='updateExp(\"$sect\");'/>$sect<br />");
	}
echo "<input type='hidden' id='' name='section' value='$sectionName' />";
echo <<<_END
</p></div>
<input type='hidden' id='generated_code' name='generated_code'>
<textarea cols='60%' rows='10%' id='generated_code_view' name='generated_code_view' disabled></textarea><br />
<input type='submit' value='Create Repitition Structure' id='submit'/>&nbsp &nbsp
<input type='reset' value='clear'/>
</form>
_END;
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
if(isset($_POST['add_to']))
{
	$add_to=$_POST['add_to'];
	$section=$_SESSION['section'];
	if(isset($_SESSION['loop'])){
		$print=$_SESSION['loop']."}";
		}else{
		echo "<script>alert(\"No repetition Structure has been declared yet\");
		window.location.href='Add Loop.php';
		</script>";}
		
	if($add_to=='section'){
		UpdateSection($print,$section);
	}
	else if($add_to=='decision')
	{
		   $_SESSION['if']=$_SESSION['if'].$print;
	}
	else if($add_to=='switch_case'){
		$_SESSION['switch_case']=$_SESSION['switch_case'].$print;
	}
	unset($_SESSION['loop']);
}
?>

<?php
 require_once('footer.php');
?>
</body>
<script>
function updateExp(value)
{
	$("expression").value+=value;
}

function BuildLoop()
{
	var exp="while("+$("expression").value+"){";
	if ($("expression").value)
	{
		$("generated_code").value=exp;
		$("generated_code_view").value=exp;
	}
	else{
		$("generated_code").value='';
		$("generated_code_view").value='';
	}
	
}

$("add_loop").addEventListener('mouseover',BuildLoop);
</script>
<?php
	if(isset($_POST['generated_code']))
	{
		$_SESSION['loop']=$_POST['generated_code'];
		if(isset($_SESSION['loop']))
		{
			echo "<script>alert(\"The loop has been created successfully. Your can add components to a loop\")</script>";
		}
	}
?>
</html>
