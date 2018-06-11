<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Solve a C Problems</title>
	<script src="getSpecifier.js"></script>
	<script src='utilityFunctions.js'></script>
	<link rel='stylesheet' href='main_style.css'/>
	<link rel="stylesheet" type="text/css" href="main_style_general.css"/>
<?php
require_once("utilityFunctions.php");
?>
</head>
<body>
<?php
	require_once("student.php");
?>
<div id='main_print'>
<div id='add_print_div_1'>
<?php
	$con=connect();
	$query="SELECT Title, Problem_ID FROM problem ORDER BY Problem_ID DESC";
	$result=mysql_query($query) or die(mysql_error());
	$count=1;
	echo "<h3>Available Uploaded Problems</h3>";
	echo "<ol>";
	while($problem=mysql_fetch_array($result))
	{
		$title=$problem['Title'];
		$id=$problem['Problem_ID'];
		$form_id="problems_view_".$count;
		echo"
		<li>
		<form action='View Problem.php' method='post' id='$form_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$id'/>
	<label><a href='javascript:{}' onClick='send_problem(\"$form_id\");'>$title</a></label>
		</form>
		</li>
		";
		$count++;
	}
	echo "</ol>";
?>
</div>
<div id='add_print_div_2' style='font-size:1.3em;'>
<?php
if(isset($_POST['view_problem']))
{
	$id=$_POST['id_problem'];
	
	$query="SELECT `problem`.`Description` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username AND problem.Problem_ID='$id'";
	$resource=mysql_query($query) or die(mysql_error());
	$problem=mysql_fetch_array($resource);
	
	$title=$_POST['view_problem'];
	$uploaded_By=$problem['Name'];
	$description=$problem['Description'];
	$solution_id=$id."_".$_SESSION['Username'];
echo <<<_END
<h3>Problem Topic</h3>
<div>
$title
</div><br />
<h3>Full Description</h3>
<div>
$description
</div>
<p>Uploaded by : $uploaded_By</p>
_END;

$check = mysql_query("SELECT * FROM solution WHERE solution_id='$solution_id'");

if(mysql_num_rows($check) == 0){
	if(!isset($_SESSION['solution_id'])){
		$form2_id='problem_solve';
echo <<<_END
<form action='Main Section.php' method='post' id='$form2_id' >
<input type='hidden' value='$solution_id' id='solution_id' name='solution_id' />
<input type='hidden' value='$id' id='problem_id' name='problem_id' /><br />
<label><a href='javascript:{}' onClick='send_problem("$form2_id");' style='color:green; text-decoration:underline;'>Solve Problem</a></label>
<br />
</form>
_END;
}
else{
	echo "<h3 style='color:red;'>You are currently solving a different problem</h3>";
}
	
}
else{
	
	echo "<h2 style='color:blue;'>You have already solved this problem</h2>";
}
}
else{
	
	echo "<script>window.location.href='index.php'</script>";
}
?>
</div>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>