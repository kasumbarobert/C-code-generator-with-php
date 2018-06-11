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

   <h3>if statement</h3>
<p>if (condition){<br />
/*statements go here*/;<br />
}<br />
The above is the if statement in its simplest form. If the condition is true, the statements are executed. If condition is not true, statements are ignored.<br />For example;<br />
if (var%2 == 0){<br />
printf("The number is even");<br />
}<br />
The above code snippet will display the words 'The number is even' only if the value of var is an even number otherwise the statements in the if are ignored.</p>

 <h3> if else statement</h3>
<p>if (condition){<br />
/*statements go here*/;<br />
}<br />
else{<br />
/*statements go here*/;<br />
}<br />
If the condition is true, the statements are executed. If condition is false, the statements in the else part are executed.
<br />For example;<br />
if (var%2 == 0){<br />
printf("The number is even");<br />
}<br />
else{<br />
printf("The number is odd");<br />
}<br />
The above code snippet will display the words 'The number is even' only if the value of var is an even number otherwise the the words 'The number is odd' in the else part are executed.</p>
 
<h3>Switch</h3>

<p>The switch statement is a multi-way decision that tests whether an expression matches one of a number of constant integer values, and branches accordingly.<br />

switch (variable) {<br />
case a:{<br />
	/*statements*/<br />
	break;<br />
} <br />
case b:{<br />
	/*statements*/<br />
	break;<br />
} <br />
default: <br />
/*statements*/<br />
}<br />

If variable matches any of the case values i.e. a and b, the statements in the respective case are executed and the break exits the switch. If no matches are found, then the statements in the default are execution.
</p>
<h3>The for loop</h3>
<p>This is an example of a <strong>repetitive structure</strong> in the C language. Repetitive structures are used when one needs to perform a given action repeatedly given a certain condition. They include the for loop, the do while loop and the while loop. The for loop takes the following form<br />
for ( initial; condition; increment/decrement ){<br />
/*statements*/;<br />
}<br />
<ol>
<li>The initial section is where the values to be initiated before the loop starts are put. It is usually an assignment statement that sets a variable
to a particular value.<br /></li>
<li>The condition is what determines whether to execute the statements in the loop, as long as the condition is true, the statements will be executed. A condition is typically a relational expression.<br /></li>
<li>The increment/decrement statement(s) is evaluated everytime the execution of the statements is done.</li></ol>

<h3>The while loop</h3>
<p>The while loop executes a block of statements as long as a specified
condition is true. The while loop has the following form:<br />
while (condition){<br />
/*statements*/<br />
}<br />
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>