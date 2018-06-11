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
<h3>&nbsp&nbsp&nbsp&nbsp&nbspAbout the system</h3>
This system will help you generate code in the C language. You will be able to upload problems and solve any of the uploaded problems.<br /> 
Your solutions will be marked by top class teachers and you will be able to download the generated C code and run it in a compiler.
<br />The system is made up of the following sections;
<p><strong>Home:</strong> This page displays all the recently uploaded problems and solutions, recent solutions provided 
the user and the recent problems the user uploaded, problems not yet solved by the user, recent logins</p>
<p><strong>Problems:</strong> This page shows all the uploaded problems and their details(e.g. the user that up loaded them
and the number of times it has been attempted) with a link to solve problem if the user has not yet solved a particular
problem.The user can also search for problems by a given criteria(e.g. problem title,
date uploaded and problems not yet solved by user). The page also has the link -<em>Upload problem</em>- where the user is directed to the
page where he can upload a problem either by typing or by uploading a file.</p>
<p><strong>Solutions:</strong> This page displays all the recent solutions to problems and the user can search for 
solutions provided by a particular person </p>
<p><strong>My Account:</strong> This page enabels the user to view his profile and edit it, the user can also see his login
details and change his password from this page.</p>
<p><strong>Help:</strong> This gives assistance to the users on how to use the system and gives brief explanations on terms used in the C programming language.</p>
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>