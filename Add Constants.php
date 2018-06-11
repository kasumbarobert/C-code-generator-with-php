<html>
<head>
	<title>Set Constants</title>
	<script src="declare_variable.js"></script>
	<script src="utilityFunctions.js"></script>
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
<h1 style='text-align:centre;'>Create a constant</h1>
<form id='variable_declaration' name='variable_declaration' action='Add Constants.php' method='post'>
<p>Enter the Constant's name <input type='textbox' name='var_name' id='var_name' required='required' onChange="validate('var_name');createDefine();"/>
<span style='font-style:italic; font-size:0.8em; color:blue;'>The constant's name should be given in capital letters e.g PI</span>
</p>

<p>Enter the Constant's value <input type="textbox" name='initial_value' id='initial_value' onChange='createDefine();' required/></p>

<span style='font-style:italic; font-size:0.8em; color:blue;'>All constants created will be added to the main function</span>
<p><input type='submit' value='Add Constant'/>&nbsp &nbsp &nbsp &nbsp &nbsp
	<button>Clear</button> &nbsp &nbsp &nbsp &nbsp &nbsp </p>
	<input type='hidden' id='generated_code' name='generated_code'>
	<textarea cols='50' rows='10' id='generated_code_view' name='generated_code_view' disabled></textarea>
</form>
</div>
<script>
	function createDefine()
	{
		var consta=$('var_name').value;
		var value=$('initial_value').value;
		consta=consta.toUpperCase();
		$('var_name').value=consta;
		var def="#define "+consta+" "+value;
		
		$('generated_code_view').value=def;
		$('generated_code').value=def;
	}
</script>

<?php
	if(isset($_POST['generated_code']))
	{
		$define_statement=$_POST['generated_code'];
		$const_name=$_POST['var_name'];
		$solution_id=$_SESSION['solution_id'];
		$query=mysql_query("INSERT INTO `c`.`myconstants` (`const_value`, `solution_id`, `const_name`) VALUES ('$define_statement', '$solution_id', '$const_name')");
		
		if($query)
		{
			echo "<script>alert('The constant has been added');</script>";
		}
	}
	
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