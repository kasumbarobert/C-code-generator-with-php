<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Help</title>
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
require_once("student.php");
?>
<div>
<aside id='first_section_main_page'><br/>
<?php
require_once("help_menu.php");
?>
</aside>
<section id='major_section'style='font-size:1.25em;'>
<fieldset>
<h1>Rules for choosing variable names and function names</h1>
<h3>There are some restrictions on the names of variables and symbolic constants. -</h3>
<ol>
	<li>The name can only contain letters, digits, and the underscore character (_). Arithmetic operators are not to be used</li>
	<li>The first character of the name must be a letter. The underscore is also a legal first character, but its use is not recommended. We don't allow beginning with underscores in this system</li>
	<li>The first character of the name must be a letter. The underscore is also a legal first character, but its use is not recommended and as therefore we don't allow beginning with underscores in this system</li>
	<li>Upper and lower case letters are distinct, so x and X are two different names.</li>
	<li>Variable names should be less than 31 characters</li>
	<li>Keywords like if, else, int, float, etc., are reserved: you can't use them as variable names. A keyword is a word that is part of the C language.</li>
	<li>It's wise to choose variable names that are related to the purpose of the variable</li>
</ol>
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>