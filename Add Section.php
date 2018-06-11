<html>
<head>
	<title>Add Section</title>
	<script src="add_section.js"></script>
	<script src="utilityFunctions.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
	<script>
</script>
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
<?php
if(isset($_SESSION['section'])){
	$section=$_SESSION['section'];
echo <<<_END
<p style='color:blue;'>You are working on a function $section. You can use the menu bar above to add components to the function and the preview section to track the progress of the build.</p> <p style='color:blue;'> Once you are done with adding all components, click on the "Complete Function" button below. You will not be able to work on another function once this one is not done.</p>
<form method='post' action='Add Section.php'>
<input type='hidden' value='true' name='complete_section'/>
<input type='submit' value='Complete Function'/>
</form>
_END;
}
else{
echo <<<_END
<form action="Add Section.php" method="post" id="newSectionForm" name="newSectionForm">
<p>Enter the function Name <input type="textbox" name='sectionName' id='sectionName' onChange="validate('sectionName');"/></p>
<p>Choose the return type
<select name='returnType' id='returnType'>
<option value='void'>No return type</option>
<option value='int'>Whole Numbers</option>
<option value='float'>Numbers with decimal points</option>
<option value='char'>Single characters</option>
</select></p>
<p>Add Parameters?<br/>
<input type="radio" name="addParameter" id="addParameter_yes" value='1' />Yes<input type="radio" name="addParameter" id="addParameter_no" value='0' />No</p>
<p>Parameter name <input type="textbox" name="p_name1" id='p_name1' disabled/>
 &nbsp&nbsp Parameter Data type <select name='p_type1' id='p_type1' disabled>
<option value='int'>Whole Numbers</option>
<option value='float'>Numbers with decimal points</option>
<option value='char'>Single characters</option>
</select></p>
<div id='AddVariable'>
<input type='hidden' name='section_header' id='section_header'/>
<input type='hidden' name='number_of_args' id='number_of_args'/>
</div>
<p> <button style="font-size:1.1em;" id="otherParameters" onClick='return AddVariable();' >Add another parameter</button></p>
<input style="font-size:1.1em; " type="submit" name="submit_section" id="submit_section" value="Create Function"/>&nbsp &nbsp &nbsp &nbsp &nbsp <input style="font-size:1.1em; margin-right:0px;" type="reset" name="" value="Clear"/>
</form>
_END;
}
?>
<script>
 function AddVariable()
 {
	 var id="p_name"+number_of_parameters;
	if(AddParameters && $(id).value != '') 
	{
	number_of_parameters++;
	 var variableName="p_name"+number_of_parameters;
	 var variableType="p_type"+number_of_parameters;
	 var content="Parameter name <input type='text' name ='"+variableName+"' id='"+variableName+"' onChange='validate(\""+variableName+"\");'required/> &nbsp&nbsp "+
	 "Parameter Data type "+ 
"<select id='"+variableType+"' name='"+variableType+"'> <option value='int'>Whole Numbers</option>"+"<option value='float'>Numbers with decimal points</option><option value='char'>Single characters</option></select><br /><br />";
	 var addVariable=document.createElement("div");
	 var section=$("AddVariable");
	 addVariable.innerHTML=content;
	 section.appendChild(addVariable);
	 }
	 else if(AddParameters){
		 alert("First fill the empty fields");
		 $(id).focus();
	 }
	 return false;
 }
 function activateDeactivate()
 {
	if(document.newSectionForm.addParameter.value==1)
	{
		$("p_name1").disabled=false;
		$("p_type1").disabled=false;
		AddParameters=true;
	}
	else if(document.newSectionForm.addParameter.value==0)
	{
		$("p_name1").disabled="disabled";
		$("p_type1").disabled="disabled";
		$("p_name1").value="";
		$("p_type1").value="";
		AddParameters=false;
	}
 }
 $("addParameter_no").addEventListener("click",activateDeactivate);
 $("addParameter_yes").addEventListener("click",activateDeactivate);
 $("submit_section").addEventListener("click",store_parameters);
</script>
</div>
<div id='add_print_div_2' class='code_preview' >
<?php
require_once('code_preview.php');
?>
</div>
</div>

<?php
 if(isset($_POST['section_header']))
 {
	 $section_header=$_POST['section_header'];
	 $sectionName=$_POST['sectionName'];
	 $date=DATE("y-m-d");
	$con=connect();
	$number_of_args=$_POST['number_of_args'];
	$returnType=$_POST['returnType'];
	$solution=$_SESSION['solution_id'];
	$addSection="INSERT INTO logs(SectionName,sectionHeader,returnType,function,Date,Time,Solution_ID) VALUES('$sectionName','$section_header','$returnType','$section_header','$date',CURTIME(),'$solution')";
	mysql_query($addSection) or die(mysql_error());
	$i=1;
	while($i<=$number_of_args){
		$arg=$_POST["p_name".$i];
		$type=$_POST["p_type".$i];
	$addArgument="INSERT INTO variable(variableName,variableType, variableScope, sectionName, solution_id) VALUES('$arg','$type','argument','$sectionName','$solution')";
	mysql_query($addArgument) or die(mysql_error());
	$i++;
 }
 $_SESSION['section']=$sectionName;
 echo "<script>window.location.href='Add Section.php';</script>";
 }
 else if(isset($_POST['complete_section']))
 {
	 $section=$_SESSION['section'];
	$print="}";
	 if(UpdateSection($print,$section))
	 {
		unset($_SESSION['section']);
		echo "<script>window.location.href='Main Section.php';</script>";
	 }
 }
?>
<?php
 require_once('footer.php');
?>
</body>
</html>