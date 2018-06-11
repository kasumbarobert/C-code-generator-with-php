<?PHP
echo <<<_END
 <link rel="stylesheet" type="text/css" href="main_style_general.css">
 <link rel='stylesheet' href='main_style.css'/>
_END;
require_once("student.php");
echo <<<_END
<div id='generate_code_header'>
<nav  id='generate_code_header_nav'>
<ul style='list-style:none;'>
<li><a href='Main Section.php'>Home</a></li>
<li><a href='Add Section.php'>Functions</a></li>
<li><a href='Declare Variable.php'>Declare Variables</a></li>
<li><a href='Add Read.php'>Read</a></li>
<li><a href='Add Print.php'>Print </a></li>
<li><a href='Add Expression.php'>Computation</a></li>
<li><a href='IncreDecre.php'>Increment/Decrement</a></li>
<li><a href='Add Constants.php'>Add Constants</a></li>
<li><a href='Add Return.php'>Return Statements</a></li>
<li><a href='Add Condition.php'>if/else</a></li>
<li><a href='Add Switch.php'>Switch</a></li>
<li><a href='Add Loop.php'>Repetitions</a></li>

<li><a href='Call Function.php'>Call a function</a></li>
</ul>
</nav>
</div>
_END;

?>