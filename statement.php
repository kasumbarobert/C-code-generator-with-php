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
<h3>Introduction</h3>
<p>Programming languages have input functions(which the programmer uses to read data input by the user) and output functions(which the programmer uses to display messages to the users). The C language has input functions like scanf() and output functions like printf().<br/></p>

<h4>The printf() function:</h4>
<p>The printf() is a library function that displays information on-screen. It can be used to output stored values of variables<br/>

<h4>The scanf() function:</h4>
<p>The scanf() statement is another library function. It reads data from the keyboard and assigns that data to one or more program variables.<br/></p>

<h4>The return() function:</h4>
<p>The return function is used to bring back a value(result) after a computation it is normally used in functions.<br/></p>
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>