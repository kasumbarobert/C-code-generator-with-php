<html>
<head>
	<title>Read Statement</title>
<?php
require_once("utilityFunctions.php");
?>
<script src="getSpecifier.js"></script>
<script src="declare_variable.js"></script>
<link rel='stylesheet' href='main_style.css'/>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<div id='main_print'>
<div id='add_print_div_1'>
<ol style='list-style:none;'>
<li><a href='Declare Variable.php'>Variable Declaration</a></li>
<li><a href='Add Read.php'>Read Statements</a></li>
<li><a href='Add Print.php'>Print Statement</a></li>
<li><a href='Add Expression.php'>Computation/Expression</a></li>
<li><a href='Add Return.php'>Return Statements</a></li>
</ol>
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
</html>