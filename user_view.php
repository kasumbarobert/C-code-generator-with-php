<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Problems Available</title>
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
<aside id='first_section_main_page'>

<fieldset>
<h3>Search Section</h3>
<p style='font-style:italic; color:blue; font-size:1.3em;'>Search For solutions provided by a particular person </p>
<form method='post' action='user_view.php' id='search_form'>
<br />
Enter the Name
<input type='text' id='search_name' name='search_name' />
</p>
<input type='submit' value='Search'/>
</form>
<script>

</script>
</fieldset>
</aside>
<section id='major_section'>
<fieldset>
<?php
$user=$_SESSION['Username'];
if(isset($_POST['search_name'])){
	$search_name=mysql_fix_string($_POST['search_name']);
	$query="SELECT solution.solution_id, solution.FileName, solution.Date, solution.MarksAwarded, solution.teacher_id, problem.Problem_ID,problem.Title, newaccount.Name FROM solution, problem, newaccount WHERE solution.username=newaccount.Username AND problem.Problem_ID=solution.Problem_ID AND newaccount.Name LIKE '%$search_name%' ORDER BY solution.Date DESC";
	$resource = mysql_query($query) or die(mysql_error());
echo <<<_END
<table border='1'>
<caption style='color:blue; font-size:1.9em;'>Showing solutions Provided by $search_name</caption>
<tr><th width='20%'>Problem Solved</th><th width='20%'>Solved By</th> <th width='10%'>Solution Date</th><th width='7%'>Marks Awarded</th><th width='10%'>Marked By</th><th width='10%'>View Solution</th><th width='10%'>Download Solution</th></tr>
_END;
		while($solution=mysql_fetch_array($resource)){
		$problem=$solution['Title'];
		$solver=$solution['Name'];
		$date=$solution['Date'];
		$solution_id=$solution['solution_id'];
		$attached_prob_id=$solution['Problem_ID'];
		$MarksAwarded=$solution['MarksAwarded'];
		if($solution['MarksAwarded']!='')
		{
			$marks=$solution['MarksAwarded'];
		}
		else{
			$marks="<p style='color:red;'>No marks awarded</p>";
		}
		$fileName=$solution['FileName'];
		$teacher_id=$solution['teacher_id'];
		if($teacher_id!=''){
		$result=mysql_fetch_array(mysql_query("SELECT Name FROM newaccount WHERE identificationNumber='$teacher_id' AND Category='Teacher'") );
		$teacher_name=$result['Name'];
		}
		else{
		$teacher_name='';
		}
		$download="<a href='$fileName'>Download</a>";
$view=<<<_END
<form method='post' action='View Solution.php'>
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$problem'/>
<input type='hidden' id='created_by' name='created_by' value='$solver'/>
<input type='hidden' id='marked_by' name='marked_by' value='$teacher_name'/>
<input type='hidden' id='marks_awarded' name='marks_awarded' value='$MarksAwarded'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
<input type='hidden' id='from_view' name='from_view' value='true'/>
<input type='submit' value='View Solution'/>
</form>
_END;
		
echo "
<tr><td>$problem</td><td>$solver</td><td>$date</td><td>$marks</td><td>$teacher_name</td><td>$view</td><td>$download</td></tr>
";
		}

echo "</table>";	
	
}else if(isset($_POST['solutions_by_problem']))
{
	$problem_id=$_POST['problem_id'];
	$user=$_SESSION['Username'];
	$problem_title=$_POST['problem_title'];
	$query="SELECT solution.solution_id, solution.FileName, solution.Date, solution.MarksAwarded, solution.teacher_id, problem.Problem_ID,problem.Title, newaccount.Name FROM solution, problem, newaccount WHERE solution.username=newaccount.Username AND problem.Problem_ID=solution.Problem_ID AND solution.Problem_ID='$problem_id' ORDER BY solution.Date DESC";
	$resource = mysql_query($query) or die(mysql_error());
	echo <<<_END
<table border='1'>
<caption style='color:blue; font-size:1.9em;'>Solutions to Problem: $problem_title</caption>
<tr><th width='20%'>Problem Solved</th><th width='20%'>Solved By</th> <th width='10%'>Solution Date</th><th width='7%'>Marks Awarded</th><th width='10%'>Marked By</th><th width='10%'>View Solution</th><th width='10%'>Download Solution</th></tr>
_END;
		while($solution=mysql_fetch_array($resource)){
		$problem=$solution['Title'];
		$solver=$solution['Name'];
		$date=$solution['Date'];
		$solution_id=$solution['solution_id'];
		$attached_prob_id=$solution['Problem_ID'];
		$MarksAwarded=$solution['MarksAwarded'];
		if($solution['MarksAwarded']!='')
		{
			$marks=$solution['MarksAwarded'];
		}
		else{
			$marks="<p style='color:red;'>No marks awarded</p>";
		}
		$fileName=$solution['FileName'];
		$teacher_id=$solution['teacher_id'];
		if($teacher_id!=''){
		$result=mysql_fetch_array(mysql_query("SELECT Name FROM newaccount WHERE identificationNumber='$teacher_id' AND Category='Teacher'") );
		$teacher_name=$result['Name'];
		}
		else{
		$teacher_name='';
		}
		$download="<a href='$fileName'>Download</a>";
$view=<<<_END
<form method='post' action='View Solution.php'>
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$problem'/>
<input type='hidden' id='created_by' name='created_by' value='$solver'/>
<input type='hidden' id='marked_by' name='marked_by' value='$teacher_name'/>
<input type='hidden' id='marks_awarded' name='marks_awarded' value='$MarksAwarded'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
<input type='hidden' id='from_view' name='from_view' value='true'/>
<input type='submit' value='View Solution'/>
</form>
_END;
		
echo "
<tr><td>$problem</td><td>$solver</td><td>$date</td><td>$marks</td><td>$teacher_name</td><td>$view</td><td>$download</td></tr>
";
		}

echo "</table>";	
}
else{
	$user=$_SESSION['Username'];
	$query="SELECT solution.solution_id, solution.FileName, solution.Date, solution.MarksAwarded, solution.teacher_id, problem.Problem_ID,problem.Title, newaccount.Name FROM solution, problem, newaccount WHERE solution.username=newaccount.Username AND problem.Problem_ID=solution.Problem_ID ORDER BY solution.Date DESC";
	$resource = mysql_query($query) or die(mysql_error());
echo <<<_END
<table border='1'>
<caption style='color:blue; font-size:1.9em;'>Showing the recent solutions to problems</caption>
<tr><th width='20%'>Problem Solved</th><th width='20%'>Solved By</th> <th width='10%'>Solution Date</th><th width='7%'>Marks Awarded</th><th width='10%'>Marked By</th><th width='10%'>View Solution</th><th width='10%'>Download Solution</th></tr>
_END;
		while($solution=mysql_fetch_array($resource)){
		$problem=$solution['Title'];
		$solver=$solution['Name'];
		$date=$solution['Date'];
		$solution_id=$solution['solution_id'];
		$attached_prob_id=$solution['Problem_ID'];
		$MarksAwarded=$solution['MarksAwarded'];
		if($solution['MarksAwarded']!='')
		{
			$marks=$solution['MarksAwarded'];
		}
		else{
			$marks="<p style='color:red;'>No marks awarded</p>";
		}
		$fileName=$solution['FileName'];
		$teacher_id=$solution['teacher_id'];
		if($teacher_id!=''){
		$result=mysql_fetch_array(mysql_query("SELECT Name FROM newaccount WHERE identificationNumber='$teacher_id' AND Category='Teacher'") );
		$teacher_name=$result['Name'];
		}
		else{
		$teacher_name='';
		}
		$download="<a href='$fileName'>Download</a>";
$view=<<<_END
<form method='post' action='View Solution.php'>
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$problem'/>
<input type='hidden' id='created_by' name='created_by' value='$solver'/>
<input type='hidden' id='marked_by' name='marked_by' value='$teacher_name'/>
<input type='hidden' id='marks_awarded' name='marks_awarded' value='$MarksAwarded'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
<input type='hidden' id='from_view' name='from_view' value='true'/>
<input type='submit' value='View Solution'/>
</form>
_END;
		
echo "
<tr><td>$problem</td><td>$solver</td><td>$date</td><td>$marks</td><td>$teacher_name</td><td>$view</td><td>$download</td></tr>
";
		}

echo "</table>";	
}
?>
</fieldset>
</section>
</div>
</body>
<?php
 require_once('footer.php');
?>
</html>