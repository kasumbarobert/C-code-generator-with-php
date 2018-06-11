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

   <h3>Form 1(if statement)</h3>
<p>If (expression)<br />
statement1;<br />
next_statement;<br /><br />
This is the if statement in its simplest form. If expression is true, statement1 is executed. If expression is not true, statement1 is ignored.<br />
If expression evaluates to true, statement is executed. If expression evaluates to false, statement is not executed.<br />
In either case, execution then passes to whatever code follows the if statement. You could say that execution of statement depends on the result of expression. <br />
Note that both the line if (expression) and the line statement; are considered to comprise the complete if statement; they are not separate statements.<br />
An if statement can control the execution of multiple statements through the use of a compound statement, or block.</p>

 <h3>  Form 2(if else statement)</h3>
<p>If ( expression )<br />
statement1;<br />
else<br />
statement2;<br />
next_statement;<br />
This is the most common form of the if statement. If expression is true, statement1 is executed; otherwise, statement2 is executed.</p>

  <h3> Form 3(else if statement)</h3>

<p>If( expression1 )<br />
statement1;<br />
else if( expression2 )<br />
statement2;<br />
else<br />
statement3;<br />
next_statement;<br />
This is a nested if. If the first expression, expression1, is true, statement1 is executed before the program continues with the next_statement. If the first expression is not true, the second expression, expression2, is checked. If the first expression is not true, and the second is true, statement2 is executed. If both expressions are false, statement3 is executed. Only one of the three statements is executed.
 </p>
 
<h3>Switch</h3>

<p>The switch statement is a multi-way decision that tests whether an expression matches one of a number of constant integer values, and branches accordingly.<br />

switch (expression) {<br />
case const-expr: statements<br />
case const-expr: statements<br />
default: statements<br />
}<br />

Each case is labeled by one or more integer-valued constants or constant expressions. If a case matches the expression value, execution starts at that case. All case expressions must be different. The case labeled default is executed if none of the other cases are satisfied. A default is optional; if it isn't there and if none of the cases match, no action at all takes place. Cases and the default clause can occur in any order.
</p>
<h3>The for Statement</h3>
<p>for ( initial; condition; increment )<br />
statement;<br />
initial, condition, and increment are all C expressions, and statement is a single or compound C
statement. <br />When a for statement is encountered during program execution, the following events occur:<br />
1. The expression initial is evaluated. initial is usually an assignment statement that sets a variable
to a particular value.<br />
2. The expression condition is evaluated. condition is typically a relational expression.<br />
3. If condition evaluates to false (that is, as zero), the for statement terminates, and execution
passes to the first statement following statement.<br />
4. If condition evaluates to true (that is, as nonzero), the C statement(s) in statement are executed.<br />
5. The expression increment is evaluated, and execution returns to step 2.</p>

<h3>The while Statement</h3>
<p>The while statement, also called the while loop, executes a block of statements as long as a specified
condition is true. The while statement has the following form:<br />
while (condition)<br />
statement<br />
condition is any C expression, and statement is a single or compound C statement.<br /> When program
execution reaches a while statement, the following events occur:<br />
1. The expression condition is evaluated.<br />
2. If condition evaluates to false (that is, zero), the while statement terminates, and execution
passes to the first statement following statement.<br />
3. If condition evaluates to true (that is, nonzero), the C statement(s) in statement are executed.<br />
4. Execution returns to step 1.</p>
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>