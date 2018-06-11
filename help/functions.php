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

<fieldset >
<h3>Functions </h3><br/>

<p>A function is a named, independent section of C code that performs a specific task and optionally <br/>returns a value to the calling program.<br/>
<h5>NB: Points to note about functions;</h5>
<ol>
<li>	Each function has a unique name. By using that name in another part of the Program,<br/>
         you can execute the statements contained in the function.</li>
<li>	A function performs a specific task.</li>
<li>	Every program has a main() function which is the beginning of program execution.</li></ol></p>

<h4>Steps for writing a function</h4><br/>
The first line of writing a function is a function header and it has three components;<br/>



<h5>The Function Name</h5>
<p>You can name a function anything you like, as long as you follow the rules for C variable names.<br/>
 A function name must be unique (not assigned to any other function or variable).<br/>
 It's a good idea to assign a name that reflects what the function does.</p><br/>

<h5>The Function return type</h5>
<p>The function return type specifies the data type that the function returns to the calling program.<br/>
 The return type can be any of C's data types: char, int, long, float, or double. <br/>
 You can also define a function that doesn't return a value by using a return type of void. Here are some examples:<br/>
int func1(...) /* Returns a type int. (whole numbers)*/<br/>
float func2(...) /* Returns a type float.(whole numbers with decimal places) */<br/>
void func3(...) /* Returns nothing.(no return type) */<br/></p>

<h5>The Parameter List</h5>
<p>Many functions use arguments, which are values passed to the function when it's called.<br/>
 A function needs to know what kinds of arguments to expect--the data type of each argument.<br/>
 You can pass a function any of C's data types. Argument type information is provided in the function header by the parameter list.<br/>
For each argument that is passed to the function, the parameter list must contain one entry.<br/>
 This entry specifies the data type and the name of the parameter. For example, <br/>
long cube(long x)<br/>
The parameter list consists of long x, specifying that this function takes one type long argument, represented by the parameter x.<br/>
 If there is more than one parameter, each must be separated by a comma.<br/>
<h5>The function header</h5><br/>
void func1(int x, float y, char z)<br/>
specifies a function with three arguments: a type int named x, a type float named y, and a type char named z. <br/>
Some functions take no arguments, in which case the parameter list should consist of void, like this:<br/>
void func2(void)</p>

<h5>The main() Function </h5><br/>
The only component that is required in every C program is the main() function.<br/>
 In its simplest form, the main() function consists of the name main followed by a pair of empty parentheses (()) and a pair of braces ({}).<br/>
 Within the braces are statements that make up the main body of the program. <br/>
 Under normal circumstances, program execution starts at the first statement in main() and terminates at the last statement in main().</p>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>