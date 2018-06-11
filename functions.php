<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Help</title>
	<script src='utilityFunctions.js'></script>
	<link rel='stylesheet' type="text/css" href='main_style.css'/>
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
<fieldset >
<h3>Functions </h3>

<p>A function is a named, independent section of C code that performs a specific task and optionally <br/>returns a value to the calling program.<br/>
<h5>NB: Points to note about functions;</h5>
<ol>
<li>	Each function has a unique name. By using that name in another part of the Program,<br/>
         you can execute the statements contained in the function.</li>
<li>	Each function performs a specific task.</li>
<li>	Every program must have a main() function which is the function in which other functions are executed. Therefore if you are to use
		functions in your program, start with them and end with the main() fuction so that you call them up in main. </li>
</ol></p>

<h4>Steps for writing a function</h4>
<p>The first line of writing a function is a function header and it has three components<br /> i.e 
<strong>return_type&nbsp&nbspfunction_name&nbsp&nbsp(parameters)</strong>;</p>


<h5>The Function Name</h5>
<p>You can name a function anything you like, as long as you follow the <a href="variable declaration.php"><strong><u>Variable Naming Rules</u></strong></a> (<em><u>click link more information</u></em>)<br/>
 A function name must be unique (not assigned to any other function or variable).<br/>
 It's a good idea to assign a name that reflects what the function does.</p>

<h5>The Function return type</h5>
<p>The function return type specifies the data type that the function returns to the calling program.<br/>
 The return type can be any of C's data types: char, int, long, float, or double. <br/>
 You can also define a function that doesn't return a value by using a return type of void. Here are some examples:<br/>
int func1(...) /* Returns a type int. (whole numbers)*/<br/>
float func2(...) /* Returns a type float.(whole numbers with decimal places) */<br/>
void func3(...) /* Returns nothing.(no return type) */</p>

<h5>The Parameter List</h5>
<p>Many functions use arguments, which are values passed to the function when it's called.<br/>
 A function needs to know what kinds of arguments to expect -- <strong>the data type of each argument must be specified</strong>--.<br/>
 You can pass a function any of C's data types. Argument type information is provided in the function header by the parameter list. For each argument that is passed to the function, the parameter list must contain one entry.<br/>
 This entry specifies the data type and the name of the parameter, starting with the data type followed by the parameter name. For example, <br/>
int cube(int x) -- This is specifing a function called cube - which takes one parameter named x, of data type int - and returns a value of data type int.<br/>
If there is more than one parameter, each must be separated by a comma. For example if the above function takes two parameters then we would write it like this;
int cube(int x,int y)<br />
Some functions take no arguments, in which case the parameter list should consist of void, like this:<br/>
int func2(void). If the function doesn't return any value then the return type is void i.e void cube(int x,int y)</p>

<h5>The function header</h5>
<p>This specifies to the compiler the type of functions going to be used in the program. They are written before any function.<br/>
For example: void func1(int x, float y, char z) - specifies a function with three arguments: a type int named x, a type float named y, and a type char named z 
while the function returns no value.
</p>

<h5>The main() Function </h5>
<p>The only component that is required in every C program is the main() function. This is because program execution is done in main(),
 therefore a C program that doesn't have the main function can't be compiled.<br/>
 In its simplest form, the main() function consists of the name main followed by a pair of empty parentheses (()) and a pair of braces ({}).<br/>
 i.e<br/> main(){<br/>
   /*statements go here*/<br/>
 }<br/>
 Within the braces are statements that make up the main body of the program. The functions that were used are also called from here. <br/>
 </p>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>