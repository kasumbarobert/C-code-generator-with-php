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
<a href="functions.php">Functions<a/><br/>
<a href="variable declaration.php">Variables<a/><br/>
<a href="decision.php">If Else/Switch/Repetition<a/><br/>
<a href="comments.php">Comments<a/><br/>
<a href="statement.php">Statements<a/><br/>
<a href="files.php">Files<a/><br/>

</aside>
<section id='major_section'>

 <fieldset>
 <h3>Statements</h3>
 <p>There are different types of statements which include: read, print, function calls and return statements.<br/>
 The real work of a C program is done by its statements. C statements display information on-screen, read<br/>
keyboard input, perform mathematical operations, call functions, read disk files, and carry out all the<br/>
other operations that a program needs to perform.<br/></p>
<h4>Print(printf())</h4>
<p>The printf() statement is a library function that displays information on-screen.<br/> The
printf() statement can display a simple text message or a message and the value of<br/>
one or more program variables.<br/></p>
<h4>Read(scanf())</h4>
<p>The scanf() statement is another library function. It reads data from the keyboard and<br/>
assigns that data to one or more program variables.<br/></p>
<h4>Return</h4>
<p>The return statements are part of all user defined functions.<br/>
 The return statement returns a result of the argument operations to the operating system just before the program ends.<br/></p>
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>