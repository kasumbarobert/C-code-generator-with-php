<html>
<head>
	<title>Variables</title>
	<script src="declare_variable.js"></script>
<style type="text/css">
</style>
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
<h1 style='text-align:centre;'>Declare a Variable</h1>
<form id='variable_declaration' name='variable_declaration' action='Declare Variable.php' method='post'>
<p>Enter variable name <input type='textbox' name='var_name' size='30' id='var_name' required='required'/>
<a href="variableRules.php"><u>Read About Acceptable Declarations</u></a></p>
<p>Choose the nature of the data of the variable 
<select name='var_type' id='var_type' required='required'>
<option value='int'>Whole Numbers</option>
<option value='float'>Numbers with decimal points</option>
<option value='char'>Single characters</option>
</select></p>
<p>Do you wish to give the variable an initial value?<br/>
<input type="radio" name='add_initial_value' id='add_initial_value_yes' value='1' required/>Yes<input type="radio" name='add_initial_value' value='0'id='add_initial_value_no' required/>No</p>
<p>Enter initial value <input type="textbox" name='initial_value' id='initial_value' disabled/></p>
<p>Choose scope of the variable
<select name='var_scope' id='var_scope'>
<option value='local'>Only to this section</option>
<option value='global'>Accessible by all sections</option>
</select></p>
<p><input type='submit' value='Add Variable'/>&nbsp &nbsp &nbsp &nbsp &nbsp
	<button>Clear</button> &nbsp &nbsp &nbsp &nbsp &nbsp
	<button>Add Another Variable</button> </p>
	<input type='hidden' id='generated_code' name='generated_code'>
	<textarea cols='50' rows='10' id='generated_code_view' name='generated_code_view' disabled></textarea>
</form>
</div>
<script>
var keywords = new Array('int','char','break','if','auto','double','struct','else','long','switch','case','enum',
			'register','typedef','extern','return','union','const','float','short','unsigned','continue','for','signed',
			'void','default','goto','sizeof','volatile','do','static','while','_Bool','_Complex','_Imaginary','inline',
			'restrict','string');
function validate () {
	var a = document.variable_declaration.var_name.value;
	for (var i = 0; i < keywords.length; i++) {
		var b = keywords[i];
		if (a === b) {
			alert(a+" is a reserved word, Choose a different name");
			document.variable_declaration.var_name.value='';
			break;
		} 
		else if (a == "") {
			alert("No name was entered");
			document.variable_declaration.var_name.value='';
			break;
		}
		else if (a.length > 30){
			alert("Variable names must not exceed 30 characters.");
			document.variable_declaration.var_name.value='';
			break;
		}
		else if (/[^a-zA-Z0-9_]/.test(a)){
			alert("Only a-z, A-Z, 0-9 and _ allowed in variable names.");
			document.variable_declaration.var_name.value='';
			break;
		}
		else if (/^[0-9_]/.test(a)){
			alert("Variable namescan only begin with  a-z and A-Z.");
			document.variable_declaration.var_name.value='';
			break;
		}
	}
}
document.getElementById("var_name").addEventListener("change",validate);

function activateDeactivate()
{
	if(document.variable_declaration.add_initial_value.value==1)
	{
		$("initial_value").disabled=false;
	}
	else{
		$("initial_value").disabled=true;
	}
}
 $("add_initial_value_no").addEventListener("click",activateDeactivate);
 $("add_initial_value_yes").addEventListener("click",activateDeactivate);
 
 function declareVar()
 {
	 var declaration;
	 
	 if(document.variable_declaration.add_initial_value.value==1)
	 {
		 if($('var_type').value=='char'){
		 declaration=$('var_type').value+' '+$('var_name').value+"='"+$('initial_value').value+"';\n";}
		 else
		 {
			 declaration=$('var_type').value+' '+$('var_name').value+"="+$('initial_value').value+";\n";
		 }
		 $('generated_code_view').value=declaration;
		  $('generated_code').value=declaration;
	 }
	 else if(document.variable_declaration.add_initial_value.value==0)
	 {
		 declaration=$('var_type').value+' '+$('var_name').value+";\n";
		  $('generated_code_view').value=declaration;
		  $('generated_code').value=declaration;
	 }
 }
 $("variable_declaration").addEventListener("change",declareVar);
</script>

<?php
	$con=connect();
	if(isset($_POST['generated_code']))
	{
	$print="\n".$_POST['generated_code'];
	$section=$_SESSION['section'];
	/*$getFunction="SELECT function FROM logs WHERE sectionName='$section' AND solution_id=";
	$query1=mysql_query($getFunction) or die(mysql_error());
	$result1=mysql_fetch_array($query1);
	$newfunction=$result1['function'].$print;
	$AddPrint="UPDATE logs SET function='$newfunction' WHERE sectionName='$section'";
	$query2=mysql_query($AddPrint) or die(mysql_error());*/
	UpdateSection($print,$section);
	}
	if(isset($_POST['var_name']) && isset($_POST['var_type'])){
	$var_name=$_POST['var_name'];
	$var_datatype=$_POST['var_type'];
	$scope=$_POST['var_scope'];
	$sectionName=$_SESSION['section'];
	$solution=$_SESSION['solution_id'];
	$addArgument="INSERT INTO variable(variableName,variableType, variableScope, sectionName, solution_id) VALUES('$var_name','$var_datatype','$scope','$sectionName','$solution')";
	mysql_query($addArgument) or die(mysql_error());}
?>
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
</html>