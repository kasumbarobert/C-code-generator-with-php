<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Home| C Code Generator</title>
<meta charset="utf-8">
<script src='utilityFunctions.js'></script>
<link rel='icon' type="images/png" href='logo.png' />
<link rel="stylesheet" type="text/css" href="main_style_general.css">
<?php
require_once("utilityFunctions.php");
?>
<style type='text/css'>
#second_section_main_page{
width:35em;
}
#third_section_main_page{
	width:27em;
}
</style>
</head>
<body>

<?php
require_once("student.php");
?>

<div id='body_section_main_page'>
<aside id='first_section_main_page'>
<div id='problems' style=''>
<fieldset>
<?php
	$con=connect();
	$query="SELECT Title,Problem_ID FROM problem ORDER BY Problem_ID DESC";
	$result=mysql_query($query) or die(mysql_error());
	$count=1;
	echo "<h3>Recently Uploaded Problems</h3>";
	echo "<ul style='list-style:none;'>";
	while($problem=mysql_fetch_array($result))
	{
		$title=$problem['Title'];
		$id=$problem['Problem_ID'];
		$form_id="all_recent_problem_".$count;
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
		if($count==9)
		{
			break;
		}
	}
	echo "</ul>";
?>
<a href='problems.php' style='text-align:right;'>More Problems</a>
</fieldset>
</div>
<div id='problems_not_solved'>
<fieldset>
<?php
	$con=connect();
	$user=$_SESSION['Username'];
	$query="SELECT Title,Problem_ID FROM problem ORDER BY Problem_ID DESC";
	$result=mysql_query($query) or die(mysql_error());
	$form_number=1;
	echo "<h3>Problems you have not solved</h3>";
	echo "<ul style='list-style:none;'>";
	while($problem=mysql_fetch_array($result))
	{
		$title=$problem['Title'];
		$id=$problem['Problem_ID'];
		$sol_id=$problem['Problem_ID']."_".$user;
		$form_id="recent_problems_".$form_number;
		$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
		if(mysql_num_rows($query2)==0){
		echo"
		<li>
		<form action='View Problem.php' method='post' id='$form_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$id'/>
		<label><a href='javascript:{}' onClick='send_problem(\"$form_id\");'>$title</a></label>
		</form>
		</li>
		";
		$form_number++;
		}
	}
	echo "</ul>";
echo <<<_END
<form method='post' action='problems.php' id='prob_not_solved'>
<input type='hidden' id='search_cat' name='search_cat' value='1'/>
<label><a href='javascript:{}' onClick='send_problem("prob_not_solved");'>More problems</a></label>
</form>
_END;
?>

</fieldset>
</div>
<div id='my_problems'>
<fieldset>
<?php
	$con=connect();
	$user=$_SESSION['Username'];
	$users_name=$_SESSION['the_name'];
	$query="SELECT Title,Problem_ID FROM problem WHERE Username='$user' ORDER BY Problem_ID DESC";
	$result=mysql_query($query) or die(mysql_error());
	$count=1;
	echo "<h3>Problems You Uploaded</h3>";
	if(mysql_num_rows($result)>0){
	echo "<ul style='list-style:none;'>";
	while($problem=mysql_fetch_array($result))
	{
		$title=$problem['Title'];
		$id=$problem['Problem_ID'];
		$form_id='my_pro'.$count;
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
		if($count==5)
		{
			break;
		}
	}
	echo "</ol>";
	
echo <<<_END
<br />
<form method='post' action='problems.php' id='prob_i_uploaded'>
<input type='hidden' id='search_cat' name='search_cat' value='4'/>
<input type='hidden'id='search_key' name='search_key' value='$users_name'/>
<label><a href='javascript:{}' onClick='send_problem("prob_i_uploaded");'>More problems</a></label>
</form>
_END;
	}
	else{
		
		echo  "<h4>You have never uploaded a problem. Click <a href='Upload Problem.php'>here to upload</a></h3>";
	}

?>
</fieldset>
</div>
<div>
<fieldset>
<h3>Recent solutions you have provided</h3>
<?php
	$con=connect();
	$user=$_SESSION['Username'];
	$query="SELECT solution.solution_id, solution.FileName, solution.Date,solution.MarksAwarded, solution.teacher_id, problem.Problem_ID,problem.Title, newaccount.Name FROM solution, problem, newaccount WHERE solution.username=newaccount.Username AND problem.Problem_ID=solution.Problem_ID AND solution.username='$user' ORDER BY solution.Date DESC";
	$resource = mysql_query($query) or die(mysql_error());
	while ($solution=mysql_fetch_array($resource))
	{
		$solution_id=$solution['solution_id'];
		$fileName=$solution['FileName'];
		$Date=$solution['Date'];
		$MarksAwarded=$solution['MarksAwarded'];
		$teacher_id=$solution['teacher_id'];
		$attached_prob_id=$solution['Problem_ID'];
		$attached_prob_title=$solution['Title'];
		$Name=$solution['Name'];
echo <<<_END
<form method='post' action='View Solution.php'>
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$attached_prob_title'/>
<input type='hidden' id='created_by' name='created_by' value='$Name'/>
<input type='hidden' id='marked_by' name='marked_by' value='$teacher_id'/>
<input type='hidden' id='marks_awarded' name='marks_awarded' value='$MarksAwarded'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
<table>
<tr><td>$attached_prob_title</td><td><a href='$fileName'/>Download Solution</a></td><td></td></tr>
<tr><td colspan='2' align='left'><input type='submit' value='View Solution'/></td></tr>
</table>
</form>
_END;
}
?>
</fieldset>
</div>
<div>
</div>
</aside>
<section id='second_section_main_page'>
<div style=''>

<h1 style='color:#93f;font-size:2em'> <?php echo $_SESSION['the_name'];?> , Welcome to the C code Generator</h1>
<center><section style='background-color:black; width:50%; font-size:1.2em; font-style:italic; font-weight:bolder; text-align:left; padding-left:1%; color:white;'>
<span style='color:green;'>#include &lt;stdio.h &gt;</span>
<pre><b>int</b> main(<b>void</b>)
{
 printf(<span style='color:blue;'>"hello world"</span>);
 <b>return</b> 0;
}</pre>
</section></center>
<span style='font-size:2em; font-family: georgia, palatino, times new roman, serif; font-weight:normal;letter-spacing:3px;text-align:left; font-style:italic;text-shadow:4px 4px 8px #acd; color:blue;'>Write programs in C language even when you are novice in programming. All you need is basic programming ideas in any language and you are good to go!</span>
</div>
<div style='font-size:1.2em;'>
<p>To use, this site to write C programs follow the steps below:
<ol>
	<li>Choose a <a href='problems.php'>problem</a> from the list which you wish to solve. </li>
	<li>A link will be given for you to solve the problem. The link will not shown if you have solved that problem before or if you are solving another problem</li>
	<li>You will then be provided with a sub-menu that has the different actions you can perform while solving the problem.</li>
	<li>If you wish to use different "functions", it's advisable you create them before you create the "main" function</li>
	<li>After building your code, you can save it by providing a file name.</li>
	<li>Once the file has been created, you can download it to test the code in a compiler</li>
	<li>Your solution will then be available for everyone to preview and for teachers to mark</li>
<ol>
</div>
</section>
<aside id='third_section_main_page'>
<div>
<?php
	$con=connect();
	$query="SELECT newaccount.Name, login.Time_Logged_In,login.Date, login.Time_Logged_Out FROM newaccount,login WHERE `newaccount`.`Username`=`login`.` Username`  ORDER BY login.Date DESC, login.Time_Logged_In DESC";
	$result=mysql_query($query) or die(mysql_error());
	$count=1;
	echo "<h3>Recent Logins</h3>";
	echo "<table>
	<tr><th>Name</th><th>Login Time</th><th>Logout Time</th></tr>
	";
	while($problem=mysql_fetch_array($result))
	{
		$name=$problem['Name'];
		$time=$problem['Time_Logged_In'];
		$out=$problem['Time_Logged_Out'];
		$date=$problem['Date'];
		if($out!='00:00:00'){		
		echo"
		<tr><td>$name</td><td align='center'>$time</td><td align='center'>$out</td></tr>
		";
		}
		else if($out=='00:00:00' && $date==Date("Y-m-d")){
			echo"
		<tr><td>$name</td><td align='center'>$time</td><td align='center' style='color:green;'>Online</td></tr>
		";
		}
		else{
			echo"
		<tr><td>$name</td><td align='center'>$time</td><td align='center'></td></tr>
		";
		}
		$count++;
		if($count==9)
		{
			break;
		}
	}
	echo "</table>";
?>
</div>
<div>
<h3>Recent Solutions provided</h3>
<?php
	$con=connect();
	$count=0;
	$query="SELECT solution.solution_id, solution.FileName, solution.Date,solution.MarksAwarded, solution.teacher_id, problem.Problem_ID,problem.Title, newaccount.Name FROM solution, problem, newaccount WHERE solution.username=newaccount.Username AND problem.Problem_ID=solution.Problem_ID ORDER BY solution.Date DESC";
	$resource = mysql_query($query) or die(mysql_error());
	while ($solution=mysql_fetch_array($resource))
	{
		$solution_id=$solution['solution_id'];
		$fileName=$solution['FileName'];
		$Date=$solution['Date'];
		$MarksAwarded=$solution['MarksAwarded'];
		$teacher_identifier=$solution['teacher_id'];
		$resource1=mysql_fetch_array(mysql_query("SELECT Name FROM newaccount WHERE IdentificationNumber='$teacher_identifier'"));
		$teacher_id=$resource1['Name'];
		$attached_prob_id=$solution['Problem_ID'];
		$attached_prob_title=$solution['Title'];
		$Name=$solution['Name'];
echo <<<_END
<form method='post' action='View Solution.php'>
<input type='hidden' id='solution_id' name='solution_id' value='$solution_id'/>
<input type='hidden' id='problem_id' name='problem_id' value='$attached_prob_id'/>
<input type='hidden' id='problem_title' name='problem_title' value='$attached_prob_title'/>
<input type='hidden' id='created_by' name='created_by' value='$Name'/>
<input type='hidden' id='marked_by' name='marked_by' value='$teacher_id'/>
<input type='hidden' id='marks_awarded' name='marks_awarded' value='$MarksAwarded'/>
<input type='hidden' id='fileName' name='fileName' value='$fileName'/>
<input type='hidden' id='from_view' name='from_view' value='true'/>
<table>
<tr><td>$attached_prob_title</td><td>
_END;
if($fileName != ''){
echo "<a href='$fileName' target='View Solution.php'/>Download Solution</a></td><td></td></tr>";
}
echo <<<_END
<tr><td colspan='2' align='left'><input type='submit' value='View Solution'/></td></tr>
</table>
</form>
_END;
$count++;
		if($count==15)
		{
			break;
		}
}
?>
</div>
</aside>
</div>

<?php
 require_once('footer.php');
?>
</body>
</html>