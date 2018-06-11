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

<p><h3>Variable Declarations</h3><br/>
Before you can use a variable in a C program, it must be declared. <br/>
A variable declaration tells the compiler the name and datatype of a variable and optionally initializes the variable to a specific value.<br/> 
Using an undeclared variable, generates an error message during compling of the program.<br/>
A variable declaration has the following form:<br/>
datatype varname;<br/>
datatype specifies the variable type i.e int, float, double e.t.c<br/>
varname is the variable name, which must follow the rules mentioned below;<br/>
<p><strong>Naming Rules</strong></p>
<ol>
<li>The name can only contain letters, digits, and the underscore character (_). Arithmetic operators are not to be used</li>
<li>The first character of the name must be a letter. The underscore is also a legal first character, but its use is not recommended 
therefore we don't allow beginning with underscores in this system</li>
<li>Upper and lower case letters are distinct, thus, the names count and Count refer to two different variables.</li>
<li>Keywords like if, else, int, float, etc., are reserved: you can't use them as variable names. A keyword is a word that is part of the C language.</li>
<li>Variable names should be less than 31 characters</li>
<li>It's wise to choose variable names that are related to the purpose of the variable</li>
</ol></p>

<p><h3>Initializing Numeric Variables</h3>
When you declare a variable, you instruct the compiler to set aside storage space for the variable.<br/> However, the value
stored in that space--the value of the variable--isn't defined.<br/> It might be zero, or it might be some random "garbage"
value.<br/> Before using a variable, you should always initialize it to a known value. <br/>You can do this independently of the
variable declaration by using an assignment statement, as in this example:<br/>
int count; /* Set aside storage space for count */<br/>
count = 0; /* Store 0 in count */<br/></p>
<p><h3>What Is Scope?</h3>
The scope of a variable refers to the extent to which different parts of a program have access to the<br/>
variable--in other words, where the variable is visible. When referring to C variables, the terms<br/>
accessibility and visibility are used interchangeably. When speaking about scope, the term variable refers<br/>
to all C data types: simple variables, arrays, structures, pointers, and so forth. It also refers to symbolic<br/>
constants defined with the const keyword.<br/>
Scope also affects a variable's lifetime: how long the variable persists in memory, or when the variable's<br/>
storage is allocated and deallocated. First, this chapter examines visibility.<br/>
<h4>A Demonstration of Scope</h4>
Look at the program in Listing 12.1. It defines the variable x in line 3, uses printf() to display the value of<br/>
x in line 7, and then calls the function print_value() to display the value of x again. Note that the<br/>
function print_value() is not passed the value of x as an argument; it simply uses x as an argument to<br/>
printf() in line 13.<br/>
<strong>Listing 12.1. </strong>The variable x is accessible within the function print_value().<br/>
<ol>
<li> /* Illustrates variable scope. */</li>

<li> #include <stdio.h></li>

<li> int x = 999;</li>

<li>void print_value(void);</li>

<li> main()</li>
<li> {</li>
<li> printf("%d\n", x);</li>
<li> print_value();</li>

<li> return 0;</li>
<li> }</li>

<li> void print_value(void)</li>
<li> {</li>
<li>printf("%d\n", x);</li>
<li> }</li></ol><br/>

This program compiles and runs with no problems. Now make a minor modification in the program,<br/>
moving the definition of the variable x to a location within the main() function. The new source code is<br/>
shown in Listing 12.2.<br/>
<strong>Listing 12.2.</strong> The variable x is not accessible within the function print_value().<br/>
 <ol>

<li> #include <stdio.h></li>

<li>void print_value(void);</li>

<li> main()</li>
<li> {</li>
<li>int x = 999;</li>

<li>printf("%d\n", x);</li>
<li>print_value();</li>

<li>return 0;</li>
<li>}</li>
<li> void print_value(void)</li>
<li> {</li>
<li>printf("%d\n", x);</li>
<li> }</li></ol><br/>
 If you try to compile Listing 12.2, the compiler generates an error message similar to the following:<br/>
list1202.c(12) : Error: undefined identifier `x'.<br/>
Remember that in an error message, the number in parentheses refers to the program line where the error was found.<br/>
 Line 6 is the call to printf() within the print_value() function.<br/>
This error message tells you that within the print_value() function, the variable x is undefined or, in other words, not visible.<br/>
 Note, however, that the call to pintf() in line 6 doesn't generate an error message;<br/>
 in this part of the program, the variable x is visible.<br/>
The only difference between Listings 12.1 and 12.2 is where variable x is defined. <br/>By moving the
definition of x, you change its scope.<br/> In Listing 12.1, x is an external variable, and its scope is the entire
program. <br/>It is accessible within both the main() function and the print_value() function. <br/>In Listing 12.2, x
is a local variable, and its scope is limited to within the main() function. <br/>As far as print_value() is
concerned, x doesn't exist. <br/>Later in this chapter, you'll learn more about local and external variables, but<br/>
first you need to understand the importance of scope. </p> 

</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>