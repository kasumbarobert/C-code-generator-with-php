<html>
<head>
	<title>Add Condition</title>
	<script src="utilityFunctions.js"></script>
<?php
require_once("utilityFunctions.php");
?>
<script>
</script>
<style type='text/css'>
#main{
	width:100%;
	display:inline-block;
	border: 1px solid;
}
#first_section{
	width:29%;
	float:left;
	padding-top:3%;
	padding-left:1%;
	background-color:#ddd;
}
#second_section{
	width:43%;
	padding-left:1%;
	padding-right:1%;
	float:left;
}
#third_section{
	width:24%;
	float:left;
	background-color:#ddd;
	padding-top:3%;
}
</style>
</head>
<body>
<link rel='stylesheet' href='main_style.css'/>
<?php
require_once("generate_code_header.php");
?>
<div id='main'>
<section id='first_section'>
<h2>Preview Section</h2>
<p style='font-size:1.3em;font-style:italic; color:red;'>This section enables you view the if structures you are working on as you build it</p>
<?php
	if(isset($_SESSION['if']) && $_SESSION['if'] != '')
	{
		echo "<h4>Below is the decision statement you are working on</h4>";
		$newfunction=$_SESSION['if'];
		$newfunction=preg_replace('/[;]/',';<br />',$newfunction);
		$newfunction=preg_replace('/[{]/','{<br />',$newfunction);
		$newfunction=$newfunction."<br />}";
		echo $newfunction;
echo <<<_END
<hr border='1'>
<form action='Submit Condition.php' method='post'>
_END;
require_once("add_to.php");
echo <<<_END
<input type='submit' value='Add the decision statement'> <br />Note: Only add the if statement once you are done
</form>
_END;
	}
	else{
		echo "No decision structure is being worked on!";
	}
?>

</section>
<section id='second_section'>

<?php
if(isset($_SESSION['if']))
{
echo <<<_END
	<p style='font-size:0.9em;font-style:italic; color:blue;'>To add other if conditions to current if structure, choose "if..else" from the drop-down before submitting/adding the if structure to another structure. To add the else section, choose "else" from the drop-down. Remember to always add components first before adding another condition</p>
_END;
}
if(isset($_SESSION['section'])){
echo <<<_END
<form method='post' action='' style='' >
<div style=''>
Choose the decision type <select id='decision_type' name='decision_type'>
<option value='if...else'>if...else</option>
<option value='else'>Else</option>
</select><br />
</div>
<br />
_END;
require_once("calculator.php");
echo "
<p style='padding-left:3%;'>
";
require_once("usable_variables.php");
addVariables();

echo <<<_END
<input type='hidden' id='generated_code' name='generated_code'>
<textarea cols='60' rows='5' id='generated_code_view' name='generated_code_view' disabled></textarea><br />
<input type='submit' value='Submit Condition' id='submit'/>
<input type='reset' value='clear'/>
_END;
mysql_close($con);
}
else{
	echo " No section is being worked on!";
}
?>
<script>
function buildheader()
{
	var decision=$('decision_type').value;
	var header;
	if(decision=='if...else' && $('expression').value != '' )
	{
		header="if("+$('expression').value+"){";
		$("generated_code_view").value=header;
		$("generated_code").value=header;
		
	}
	else if(decision=='else')
	{
		$('expression').style.display='none';
		$('operators').style.display='none';
		$('enter_exp').style.display='none';
		$('variables').style.display='none';
		$("calculator").style.display='none';
		$("numbers").style.display='none';
		$('submit').value='Create else section';
	}
	else if(decision=='if...else')
	{
		$('expression').style.display='block';
		$('operators').style.display='block';
		$('variables').style.display='block';
		$('enter_exp').style.display='block';
		$("calculator").style.display='block';
		$("numbers").style.display='block';
		$('submit').value='Submit Condition';
	}
}
$('expression').addEventListener('click', buildheader);
$('expression').addEventListener('mouseover', buildheader);
$('expression').addEventListener('mouseout', buildheader);
$('decision_type').addEventListener('click', buildheader);
$('submit').addEventListener('mouseover', buildheader);
</script>
<?php

$decisionType='';
if(isset($_POST['decision_type'])){
$decisionType=$_POST['decision_type'];
}
if(isset($_POST['generated_code'])||$decisionType=='else')
{
	if(isset($_SESSION['if'])&& $_SESSION['if'] != '')
	{
		$section=$_POST['section'];
		if($decisionType=='if...else'){
		$condition=$_POST['expression'];
		$header=$_POST['generated_code'];
		$_SESSION['if']=$_SESSION['if']."}else if (".$condition.") {";
		}
		else if($decisionType=='else')
		{
			$_SESSION['if']=$_SESSION['if']."}else {";
		}
	}
	else{
	$con=connect();
	$section=$_POST['section'];
	$condition=$_POST['expression'];
	$header=$_POST['generated_code'];
	$_SESSION['if']=$header;

	}
echo "<script>window.location.href='Add Condition.php'</script>";
}
?>
</section>
<section id='third_section' style='color:blue;'>
Guide on how to build If statements
<ol>
<li>Choose "if...else" from the drop-down</li>
<li>Add the condition for the first if component. You can use the operators and the numeric key pad to build the conditions. You can also use the declared variables by clicking on the check box. </li>
<li>Submit the condition and refresh the page</li>
<li>You will see the if structure created in the preview section of this page</li>
<li>Add components/statements to the if structure e.g. if you wish to add a print statement simply click the print link
	and add your print statement to the condition</li>
<li>If you wish to add "else if" section then just another condition before submiting the original if structure</li>
<li>The preview section will display a new updated structure with the "else if" conditions</li>
<li>Then add components to the decision structure. These will get added to the "else if" section</li>
<li>You can repeat steps 6-8 until no more "if..else" components to add</li>
<li>If you wish to add an else component, choose else from the drop-down box</li>
<li>Add components/statements to the else section</li>
<li>If you feel your "if structure" is complete, you can then 'Add the decision structure' to either a function/section or a repition or switch statement. This can be done using the preview section of this page. Make sure that your structure is complete because this step may not be reversible</li>
<li>You can then proceed to add other components to the function</li>
</ol>
</section>
</div>
<script>
$("add_to_decision").disabled=true;
</script>
<script>
function updateExp(value)
{
	$("expression").value+=value;
}
</script>
<?php
 require_once('footer.php');
?>
</body>
</html>