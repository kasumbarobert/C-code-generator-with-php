<html>
<head>
	<title>Add Condition</title>
	<script src="utilityFunctions.js"></script>
<?php
require_once("utilityFunctions.php");
?>
<script>
</script>
<style type='text/css'>
#main{
	width:100%;
	display:inline-block;

	height:100%;
}
#first_section{
	width:29%;
	height:100%;
	float:left;
	padding-top:3%;
	padding-left:1%;
	background-color:#ddd;
}
#second_section{
	width:3%;
	float:left;
}
#third_section{
	width:65%;
	float:left;
	background-color:#ddd;
	padding-top:3%;
	height:100%;
	text-overflow:scroll;
}
</style>
</head>
<body>
<div id='main'>
<section id='first_section'>

<?php
	if(isset($_SESSION['switch_case']) && $_SESSION['switch_case'] != '')
	{
		echo "<h4>Below is the decision statement you are working on</h4>";
		$newfunction=$_SESSION['switch_case'];
		$newfunction=preg_replace('/[:]/',':<br />',$newfunction);
		$newfunction=preg_replace('/[;]/',';<br />',$newfunction);
		$newfunction=preg_replace('/[{]/','{<br />',$newfunction);
		echo $newfunction."break;";
echo <<<_END
<hr border='1'>
<form action='Compile Switch.php' method='post'>
Choose where to add the case <br />
	<input type='radio' name='add_to' id='add_to_decision' value='decision' required='required'/>Decision <br /><input type='radio' name='add_to' id='add_to_repetition' value='repetition' required='required'/>Repetition<br />
	<input type='radio' name='add_to' id='add_to_switch_case' value='switch' required='required'/>Case in a Switch<br /><br />
<input type='submit' value='Add case components to the switch'> <br />Note: Only add the case once you are done
</form>
_END;
	}
	else{
		echo "No case structure is being worked on!";
	}
?>

</section>
<section id='second_section'>

</section>
<section id='third_section'>
<?php
if(isset($_POST['view_Switch']))
{
	
} else{
echo <<<_END
<ol>
<li><a href='Add Read.php'>Add Read statement</a></li>
<li><a href='Add Print.php'>Add Print Statement</a></li>
<li><a href='Add Expression.php'>Add Computations</a></li>
<li><a href='Add Return.php'>Add Return Statements</a></li>
<li><a href='Add Condition.php'>Add Decision statements</a></li>
</ol>
</section>
</div>
_END;
}
?>
<script>
function updateExp(value)
{
	$("expression").value+=value;
}
</script>
<?php
 require_once('footer.php');
?>
</body>
</html>