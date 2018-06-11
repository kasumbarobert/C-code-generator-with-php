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
 <h3>&nbsp&nbsp&nbsp&nbsp&nbspAbout the form</h3>
 <p>The topic section captures the summary of your comment while the description field is supposed<br/> to capture the full description of your concern/ appreciation/ideas e.t.c</p>
<form method="post" action="comment handler.php">
<strong>Topic</strong><br/>
<textarea name='topic' id='topic_ID' rows="2" cols="50" required ></textarea><br/>
<strong>Description</strong><br/>
<textarea rows='10' cols='100' name='topic_Description' id='topic_Description' required></textarea><br />
<input type='submit' value='submit comment'> <input type='reset' value='Clear form'>

</form>

</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>