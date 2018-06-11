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
<a href="comments page.php">Comments<a/><br/>
<a href="statement.php">Statements<a/><br/>
<a href="files.php">Files<a/><br/>

</aside>
<section id='major_section'>
<fieldset>
<h3>&nbsp&nbsp&nbsp&nbsp&nbspAbout the system</h3>
<p>Home: This page has a header section that has links to the different sections of the system.<br/>
It displays all the recently uploaded problems, solutions, logins, problems not yet attempted, <br/>people who have ever attempted to solve problems.</p>
<p>The header section of this page is composed of links to upload problem, solve problem, my account, and a help page.<br/>
Upload problem: This interface enables the user to upload a problem either by typing as well as file upload.<br/>
 When one chooses to upload a file: they have to choose the location of the file they wish to upload.<br/>
 However, if they choose type, then, they have to give a problem topic/title which acts as the problem summary and a full description of the problem.<br/>
Problem: This interface displays a list of all problems with links to view the problem page,<br/>
 which has a complete description of the selected problem with a link to solve problem in case one wishes to solve the problem.<br/>
 However, if one has already attempted the problem, the link disappears and a message "you have already solved this problem" is displayed.<p/>  
Help: This gives assistance to the users on however to interface with the system.<br/>

</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>