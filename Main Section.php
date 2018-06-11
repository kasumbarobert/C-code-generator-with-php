<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Solve a C Problems</title>
	<script src="getSpecifier.js"></script>
	<script src="utilityFunctions.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
	<link rel="stylesheet" type="text/css" href="main_style_general.css"/>
<?php
require_once("utilityFunctions.php");
?>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<div id='body_section_main_page'>
<aside id='first_section_main_page'>
<fieldset>
<?php
$con=connect();
if(isset($_SESSION['solution_id']) && isset($_SESSION['problem_id']))
{
	
	echo "<h2>You are currently solving this problem</h2>";
	$id=$_SESSION['problem_id'];
	
	$query="SELECT `problem`.`Description` ,`problem`.`Title`, newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username AND problem.Problem_ID='$id'";
	$resource=mysql_query($query) or die(mysql_error());
	$problem=mysql_fetch_array($resource);
	
	$title=$problem['Title'];
	$uploaded_By=$problem['Name'];
	$description=$problem['Description'];
	$solution_id=$id."_".$_SESSION['Username'];
echo <<<_END
<div>
<h3>Problem Topic</h3>
$title
</div>
<div>
<h3>Full Description</h3>
$description
</div>
</fieldset>
<fieldset style='font-size:1.2em;'>
<p><strong><u>Guidelines when solving a problem.</u></strong></p>
<ol>
<li>After choosing the problem to solve, the action cannot be reversed</li>
<li>If you wish to define your own functions, create these functions before creating the main function
You can create your own functions by clicking the word function in the menu</li>
<li>For each function you create, you should add components. Use the menu to choose components to add</li>
<li>If you create a decision/switch/repetition, you should first add all components needed to that structure before adding it to the function. 
Once it has been added to the function, you won't be able to add components to it</li>
<li>Make sure you complete a function before moving on to another one. 
This is done by clicking the word function in the menu bar and then clicking the 'complete function' button.
<li>After creating all functions, you can create the 'main' function</li>
<li>Then Add components to  function "main"</li>
<li>Once all needed components have been added, complete the main function - the same way as described earlier - then 
create a file to store the solution</li>
</ol>
</fieldset>
_END;

}
else{
	$query="SELECT Title, Problem_ID FROM problem ORDER BY Problem_ID DESC";
	$result=mysql_query($query) or die(mysql_error());
	$count=1;
	echo "<h3>Choose a problem to solve from this list</h3>";
	echo "<ol>";
	while($problem=mysql_fetch_array($result))
	{
		$title=$problem['Title'];
		$id=$problem['Problem_ID'];
		echo"
		<li>
		<form action='View Problem.php' method='post'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$id'/>
		$title <input type='submit' value='View Problem' style='color:blue;'/>
		</form>
		</li>
		";}
echo "</ol>";
}
?>
</aside>
<section id='second_section_main_page' style='padding-left:0.5%;'>
<?php
$con=connect();
if(isset($_POST['solution_id'])){
	if(!isset($_SESSION['solution_id'])){
	$problem_id=$_POST['problem_id'];
	$solution_id=$_POST['solution_id'];
	$username=$_SESSION['Username'];
	$addSection="INSERT INTO solution(solution_id,Date,Problem_ID,username) VALUES('$solution_id',CURRENT_DATE(),'$problem_id','$username')";
	mysql_query($addSection) or die(mysql_error());
	$_SESSION['problem_id']=$problem_id;
	$_SESSION['solution_id']=$solution_id;
	echo "<script>window.location.href='Main Section.php'</script>";
	}
	else{
		  echo "<script>
		  alert('You are currently solving another problem');
		  window.location.href='Main Section.php'
		  </script>";
	}
}
if(isset($_SESSION['solution_id']) && !isset($_SESSION['main']))
{
echo <<<_END
<p style='font-size:1.3em;font-style:italic; color:red; padding-left:2%;padding-right:2%;'>
Make sure you are done with any other function before you work on main. You can only work on one function at ago. 
If you have not finished with other functions, you may lose all your if you start working on another function. 
<strong>Please read the guidelines given aside for more informaton</strong>
</p>

<form method='post' action='Main Section.php'>
<input type='hidden' name='create_main' value='true'/> 
<input type='submit' value='Create Function Main'/>
</form>
_END;
}
else if(isset($_SESSION['solution_id']) && (isset($_SESSION['section'])||isset($_SESSION['main']))){
	if(isset($_SESSION['section'])){$sec=$_SESSION['section'];
	echo <<<_END
	<h1>You are working on function "$sec" of the solution</h1>
_END;
}
echo <<<_END
	<fieldset style='font-size:1.2em; '>
	<h4 style='color:blue;'>This is the current state of your complete solution. Once you create a file, your solution will be similar to the code below</h4>
	<hr border='1'/>
_END;

	echo "<pre style='overflow:scroll;width:39em;'>".htmlentities(completeCode())."</pre>";
	echo "</fieldset>";
	
	echo "<a href='#create_file' >Store the solution in a file</a>";
}


if(isset($_POST['create_main']))
{
	$section_header="int main(void) {";
	$sectionName="main";
	$returnType='void';
	$solution_id=$_SESSION['solution_id'];
	$addSection="INSERT INTO logs(SectionName,sectionHeader,returnType,function,Date,Time,Solution_ID) VALUES('$sectionName','$section_header','$returnType','$section_header',CURRENT_DATE(),CURTIME(),'$solution_id')";
	mysql_query($addSection) or die(mysql_error());
	
	$_SESSION['main']="main";
	$_SESSION['section']="main";
	echo "<script>window.location.href='Main Section.php'</script>";
}
?>
</section>
<aside id='third_section_main_page'>
<fieldset>
<h1>Preview  Function Main</h1>
<?php
	if(isset($_SESSION['solution_id'])&&isset($_SESSION['section']) && $_SESSION['section']=='main')
	{
		$con=connect();
		$solution=$_SESSION['solution_id'];
		$getFunction="SELECT function FROM logs WHERE sectionName='main' AND solution_id='$solution'";
		$query1=mysql_query($getFunction) or die(mysql_error());
		$result=mysql_fetch_array($query1);
		$newfunction=$result['function'];
		echo "<div style='font-size:1.3em;'>";
		printcode($newfunction."</div>");
		
	echo "</fieldset>";
	}
		
if(isset($_SESSION['solution_id']) && isset($_SESSION['main'])){
	echo <<<_END
	<fieldset style='background-color:#bbb;'>
	<h2>Create a C file to store your solution</h2>
	<p style='font-size:1em;font-style:italic; color:red; padding-left:1%;padding-right:1%;'>This form section should only be filled once the entire solution is complete. Once a c file is created, you won't be able to reverse the action  </p>
	<fieldset style='margin:2%; font-size:1.2em'>
	<legend style='color:green;'>Create a C file </legend>
	<form action='Generate File.php' method='post' name='create_file' id='create_file'>
_END;
	if(isset($_SESSION['file_exist']))
	{
		echo $_SESSION['file_exist'];
		unset($_SESSION['file_exist']);
	}
echo <<<_END
Is your solution complete?<br />
<input type='radio' name='solution_complete' id=name='solution_complete_no' value='0' required/>No <br/ >
<input type='radio' name='solution_complete' id=name='solution_complete_yes' value='1' required/>Yes <br/ >
<label>Enter Your prefered file name: <input type='text' id='c_filename' name='c_filename' size='30' onMouseOver='checkCompletion();' disabled/></label><br /><br />
<input type='submit' value='Create File'/>&nbsp &nbsp <input type='reset' value='clear' />
</form>
</fieldset>
<script>
function checkCompletion(){
	var test=document.create_file.solution_complete.value;
	
	if(test=='1')
	{
		$('c_filename').disabled=false;
		$('c_filename').focus();
	}
	else{
		$('c_filename').disabled=true;
		alert("First complete the solution and then create the file");
	}
}
document.create_file.addEventListener('change',checkCompletion);

</script>
_END;
}
	
	
mysql_close($con);
?>
</aside>
</div>
<?php
 require_once('footer.php');
?>
</body>

</html>