<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Solutions</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="main_style_general.css">
<script src='utilityFunctions.js'></script>
<?php
require_once("utilityFunctions.php");
?>
<style type='text/css'>
#main_section{
	width:100%;
}
#left_section{
	width:32%;
	padding:2%;
	float:left;
	font-size:1.2em;
}
#right_section{
	width:60%;
	float:left;
	padding:2%;
	font-size:1.3em;
}

#sub_footer_main_page{
	clear:both;
}
</style>
</head>
<body>
<?php
require_once("student.php");
?>
<div id='main_section'>
<div id='left_section'>
<?php
if(isset($_POST['marks_Awarded']))
{
	$con=connect();
	$marks=$_POST['marks_Awarded'];
	$solution_id=$_POST['solution_id'];
	$solvedBy=$_POST['created_by'];
	$attached_prob_id=$_POST['problem_id'];
	$problem_title=$_POST['problem_title'];
	$teacher_username=$_SESSION['Username'];
	$fileName=$_POST['fileName'];
	$resource1=mysql_query("SELECT Name, IdentificationNumber FROM newaccount WHERE Username='$teacher_username'") or die(mysql_error());
	$teacher=mysql_fetch_array($resource1);
	
	$teacher_id=$teacher['IdentificationNumber'];
	$teacher_name=$teacher['Name'];
	$query=mysql_query("UPDATE `c`.`solution` SET `MarksAwarded` = '$marks' WHERE `solution`.`solution_id` = '$solution_id'") or die(mysql_error());
	$query2=mysql_query("UPDATE `c`.`solution` SET `teacher_id` = '$teacher_id' WHERE `solution`.`solution_id` = '$solution_id'") or die(mysql_error());
echo <<<_END
<form method='post' action='View Solution.php' id='auto_form'>
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$problem_title'/>
<input type='hidden' id='created_by' name='created_by' value='$solvedBy'/>
<input type='hidden' id='marked_by' name='marked_by' value='$teacher_name'/>
<input type='hidden' id='marks_awarded' name='marks_awarded' value='$marks'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
</form>
<script>
$('auto_form').submit();
</script>
_END;

}
if(isset($_POST['problem_title'])){
	$solvedBy=$_POST['created_by'];
	$problem_title=$_POST['problem_title'];
	$marksAwarded=$_POST['marks_awarded'];
	$markedBy=$_POST['marked_by'];
	$fileName=$_POST['fileName'];
	$attached_prob_id=$_POST['problem_id'];
	$solution_id=$_POST['solution_id'];
echo <<<_END
<fieldset>
<legend>Solution</legend>
<p>Problem Solved : $problem_title</p>
<p>Provided by : $solvedBy</p>
_END;

if($marksAwarded!='')
{
echo <<<_END
<p>Marks Awarded: $marksAwarded %</p>
<p>Marked by: $markedBy</p>
_END;
}
else{
echo <<<_END
<p>Marks Awarded: <span style='color:red;'>No Marks Awarded yet</span></p>
_END;
}
echo <<<_END
<a href='$fileName'><button style='font-size:1.5em; border-radius:8px;color:blue; background-color:#af8;'>Download Solution</button></a>
<br /><br />
_END;

$category=$_SESSION['user_category'];


if($category==='Teacher' && $marksAwarded=='')
{
echo <<<_END
<div style='background-color:#868;'>
<fieldset>
<legend style='color:blue;'>Award Marks to this Solution</legend>
<form method='post' action='View Solution.php'>
<br />
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$problem_title'/>
<input type='hidden' id='created_by' name='created_by' value='$solvedBy'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
Enter the marks<input type='number' id='marks_Awarded' name='marks_Awarded' min='0' max='100'/><br />
<input type='submit' value='Award Marks' />
</form>
</fieldset>
</div>
</fieldset>
_END;
}
}
else{
	echo
	"
	<script>window.location.href='index.php';</script>
	";
}
?>
</div>
<div id='right_section'>
<?php
if(isset($_POST['problem_title'])){
echo <<<_END
<fieldset>
_END;

	$fileName=$_POST['fileName'];
	if($fileName !==''){
	$fptr=fopen($fileName,"r+");
	$contents=htmlentities(file_get_contents($fileName));
	/*$contents=preg_replace('/(#include<stdio.h>)/',"#include &ltstdio.h&gt",$contents);
	//$contents=preg_replace('/(#include<math.h>)/',"#include &ltmath.h&gt",$contents);*/
	echo "<pre style='overflow:scroll;'>";
	echo $contents;
	echo "</pre>";
	}
	else{
		echo "<p style='color:red; font-size:1.5em;'> The author did not complete this solution</p>";
	}
echo <<<_END
</fieldset>
_END;
}else{
	echo
	"
	<script>window.location.href='index.php';</script>
	";
}
?>
</div>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>