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
 <h3>Files</h3>
 <p>The system enables you to create C code files(with the extension .c) to store your solution. On submission, these files can be viewed or downloaded and executed in a compiler.<br/>
 It should be noted therefore that its very important for the user to always save their work in a file before submission because it is this file that the teacher will use to award marks.</p>
 </fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>