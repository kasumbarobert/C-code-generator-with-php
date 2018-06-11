<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Problems Available</title>
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
<div>
<aside id='first_section_main_page'>

<fieldset>
<h3>Search Section</h3>
<p style='font-style:italic; color:blue;'>Use this section to search for problems based on your chosen criteria</p>
<form method='post' action='problems.php' id='search_form'>
Search Uploaded problems By <br />
<select id='search_cat' name='search_cat'>
<option value='4'>User who Uploaded</option>
<option value='3'>Problem Title or Description</option>
<option value='2'>Date Uploaded</option>
<option value='1'>Problems I have not solved</option>
<option value='0'>Problems I have solved</option>
</select>
<p id='search_key_par'>
Enter the search key<br />
<input type='text' id='search_key' name='search_key' />
</p>
<input type='submit' value='Search'/>
</form>
<script type='text/javascript'>
function prepare_search()
{
	var cat=$('search_cat').value;
	var search_key=$('search_key').value;
	if(cat=='1' || cat=='0')
	{
		$('search_form').submit();
	}
}
$('search_form').addEventListener('change',prepare_search);
</script>
</fieldset>
<p style='font-size:1.3em; font-style:bold; color:green;'>To view the solutions provided to a particular problem, click on the number of solutions indicated</p>
<fieldset>
<a href='Upload Problem.php' style='font-size:1.3em; text-decoration:underline;'>Upload a new problem</a>
</fieldset>
</aside>
<section id='major_section'>
<fieldset>
<?php
$user=$_SESSION['Username'];

if(isset($_POST['search_cat'])){
	
	switch($_POST['search_cat'])
	{
		case 0:
			$search_cat='0';
			$search_value='0';
			$query="SELECT `problem`.`Description`,`problem`.`Date_Added`,`problem`.`Problem_ID`,`problem`.`Title` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username ORDER BY `problem`.`Date_Added` DESC";
			$resource=mysql_query($query) or die(mysql_error());
			echo <<<_END
			<table border='1'>
			<caption style='color:blue; font-size:1.9em;'>Showing problems you have solved</caption>
			<tr><th width='20%'>Problem Title</th><th width='20%'>Uploaded By</th> <th width='10%'>Upload Date</th><th width='7%'>Solutions provided</th><th width='10%'>Solution  Status</th><th width='10%'>View Complete Description</th><th width='10%'>Solve</th></tr>
_END;
			$count=1;
			while($problem=mysql_fetch_array($resource)){
			$uploaded_By=$problem['Name'];
			$title=$problem['Title'];
			$date=$problem['Date_Added'];
			$problem_id=$problem['Problem_ID'];
			$query1=mysql_query("SELECT * FROM solution WHERE Problem_ID='$problem_id'");
			$number_of_solutions=mysql_num_rows($query1);
			$sol_id=$problem['Problem_ID']."_".$user;
			$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
			if(mysql_num_rows($query2)==0)
			{	
			}
			else{
			$status="<p style='color:green;'>Solved</p>";
			$action='';
			$form1_id="view_problem_".$count;
			$view=<<<_END
<form action='View Problem.php' method='post' id='$form1_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<label><a href='javascript:{}' onClick='send_problem("$form1_id");'>view</a></label>
		</form>
_END;
$form_solution=<<<_END
<form method='post' action='user_view.php' id='$problem_id'>
<input type='hidden' name='solutions_by_problem' value='true'/>
<input type='hidden' name='problem_id'  value='$problem_id'/>
<input type='hidden' name='problem_title'  value='$title'/>
</form>
_END;
		echo "
<tr><td>$title</td><td>$uploaded_By</td><td>$date</td><td align='center'>$form_solution 
<a href='javascript:{}' onClick='send_problem(\"$problem_id\");'>$number_of_solutions</a></td><td>$status</td><td>$view</td><td>$action</td></tr>
";
	$count++;
			}
		}
echo "</table>";	
		break;
		case 1:
			$search_cat='1';
			$search_value='1';
			$count=1;
			$query="SELECT `problem`.`Description`,`problem`.`Date_Added`,`problem`.`Problem_ID`,`problem`.`Title` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username ORDER BY `problem`.`Date_Added` DESC";
		$resource=mysql_query($query) or die(mysql_error());
echo <<<_END
<table border='1'>
<caption style='color:blue; font-size:1.9em;'>Showing problems you have not solved</caption>
<tr><th width='20%'>Problem Title</th><th width='20%'>Uploaded By</th> <th width='10%'>Upload Date</th><th width='7%'>Solutions provided</th><th width='10%'>Solution  Status</th><th width='10%'>View Complete Description</th><th width='10%'>Solve</th></tr>
_END;
		while($problem=mysql_fetch_array($resource)){
		$uploaded_By=$problem['Name'];
		$title=$problem['Title'];
		$date=$problem['Date_Added'];
		$problem_id=$problem['Problem_ID'];
		$query1=mysql_query("SELECT * FROM solution WHERE Problem_ID='$problem_id'");
		$number_of_solutions=mysql_num_rows($query1);
		$sol_id=$problem['Problem_ID']."_".$user;
		$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
		if(mysql_num_rows($query2)==0)
		{
			$status="<p style='color:red;'>Not solved</p>";
			$form1_id="view_problem_".$count;
			$form2_id="solve_problem_".$count;
			$action= <<<_END
<form action='Main Section.php' method='post' id='$form2_id'>
<input type='hidden' value='$sol_id' id='solution_id' name='solution_id' />
<input type='hidden' value='$problem_id' id='problem_id' name='problem_id' />
<label><a href='javascript:{}' onClick='send_problem("$form2_id");'>Solve</a></label>
</form>
_END;
$view=<<<_END
<form action='View Problem.php' method='post' id='$form1_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<label><a href='javascript:{}' onClick='send_problem("$form1_id");'>view</a></label>
		</form>
_END;
$form_solution=<<<_END
<form method='post' action='user_view.php' id='$problem_id'>
<input type='hidden' name='solutions_by_problem' value='true'/>
<input type='hidden' name='problem_id'  value='$problem_id'/>
<input type='hidden' name='problem_title'  value='$title'/>
</form>
_END;
		echo "
<tr><td>$title</td><td>$uploaded_By</td><td>$date</td><td align='center'>$form_solution 
<a href='javascript:{}' onClick='send_problem(\"$problem_id\");'>$number_of_solutions</a></td><td>$status</td><td>$view</td><td>$action</td></tr>
";
		}
	
		}

echo "</table>";	

		break;
		case 2:
			$search_cat='Date';
			$search_value=$_POST['search_key'];
			$query="SELECT `problem`.`Description`,`problem`.`Date_Added`,`problem`.`Problem_ID`,`problem`.`Title` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username AND `problem`.`Date_Added`='$search_value' ORDER BY `problem`.`Date_Added` DESC";
			$resource=mysql_query($query) or die(mysql_error());
			echo <<<_END
			<table border='1'>
			<caption style='color:blue; font-size:1.9em;'>Showing problems uploaded on $search_value</caption>
			<tr><th width='20%'>Problem Title</th><th width='20%'>Uploaded By</th> <th width='10%'>Upload Date</th><th width='7%'>Solutions provided</th><th width='10%'>Solution  Status</th><th width='10%'>View Complete Description</th><th width='10%'>Solve</th></tr>
_END;
					$count=1;
					while($problem=mysql_fetch_array($resource)){
					$uploaded_By=$problem['Name'];
					$title=$problem['Title'];
					$date=$problem['Date_Added'];
					$problem_id=$problem['Problem_ID'];
					$query1=mysql_query("SELECT * FROM solution WHERE Problem_ID='$problem_id'");
					$number_of_solutions=mysql_num_rows($query1);
					$sol_id=$problem['Problem_ID']."_".$user;
					$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
					$form1_id="view_problem_".$count;
					$form2_id="solve_problem_".$count;
					if(mysql_num_rows($query2)==0)
					{
						$status="<p style='color:red;'>Not solved</p>";
						$action= <<<_END
<form action='Main Section.php' method='post' id='$form2_id'>
<input type='hidden' value='$sol_id' id='solution_id' name='solution_id' />
<input type='hidden' value='$problem_id' id='problem_id' name='problem_id' />
<label><a href='javascript:{}' onClick='send_problem("$form2_id");'>Solve</a></label></form>
_END;
						
					}
					else{
						$status="<p style='color:blue;'>Solved</p>";
						$action='';
					}
				$view=<<<_END
<form action='View Problem.php' method='post' id='$form1_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<label><a href='javascript:{}' onClick='send_problem('$form1_id');'>view</a></label>
		</form>
_END;
$form_solution=<<<_END
<form method='post' action='user_view.php' id='$problem_id'>
<input type='hidden' name='solutions_by_problem' value='true'/>
<input type='hidden' name='problem_id'  value='$problem_id'/>
<input type='hidden' name='problem_title'  value='$title'/>
</form>
_END;
		echo "
<tr><td>$title</td><td>$uploaded_By</td><td>$date</td><td align='center'>$form_solution 
<a href='javascript:{}' onClick='send_problem(\"$problem_id\");'>$number_of_solutions</a></td><td>$status</td><td>$view</td><td>$action</td></tr>
";
$count++;
		}
		echo "</table>";	
		break;
		
		case 3:/* to be run if search is to be made on title/description*/
			$search_cat='Title';
			$search_value=$_POST['search_key'];
			$count=1;
			$query="SELECT `problem`.`Description`,`problem`.`Date_Added`,`problem`.`Problem_ID`,`problem`.`Title` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username AND (`problem`.`Title` LIKE '%$search_value%' OR `problem`.`Description` LIKE '%$search_value%') ORDER BY `problem`.`Date_Added` DESC";
			$resource=mysql_query($query) or die(mysql_error());
			echo <<<_END
			<table border='1'>
			<caption style='color:blue; font-size:1.9em;'>Showing problems that match "$search_value"</caption>
			<tr><th width='20%'>Problem Title</th><th width='20%'>Uploaded By</th> <th width='10%'>Upload Date</th><th width='7%'>Solutions provided</th><th width='10%'>Solution  Status</th><th width='10%'>View Complete Description</th><th width='10%'>Solve</th></tr>
_END;
					while($problem=mysql_fetch_array($resource)){
					$uploaded_By=$problem['Name'];
					$title=$problem['Title'];
					$date=$problem['Date_Added'];
					$problem_id=$problem['Problem_ID'];
					$query1=mysql_query("SELECT * FROM solution WHERE Problem_ID='$problem_id'");
					$number_of_solutions=mysql_num_rows($query1);
					$sol_id=$problem['Problem_ID']."_".$user;
					$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
$view=<<<_END
<form action='View Problem.php' method='post'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<button style='background-color:#cfc;'><a href=''>view</a></button>
		</form>
_END;
					if(mysql_num_rows($query2)==0)
					{
						$status="<p style='color:red;'>Not solved</p>";
						$action= <<<_END
<form action='Main Section.php' method='post'>
<input type='hidden' value='$sol_id' id='solution_id' name='solution_id' />
<input type='hidden' value='$problem_id' id='problem_id' name='problem_id' />
<input type='submit' value='Solve Problem' />
</form>
_END;
						
					}
					else{
						$status="<p style='color:blue;'>Solved</p>";
						$action='';
					}
					$form1_id='search_query_form'.$count;
				$view=<<<_END
<form action='View Problem.php' method='post' id='$form1_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<a href='javascript:{}' onClick='send_problem("$form1_id");'>view</a>
		</form>
_END;
$form_solution=<<<_END
<form method='post' action='user_view.php' id='$problem_id'>
<input type='hidden' name='solutions_by_problem' value='true'/>
<input type='hidden' name='problem_id'  value='$problem_id'/>
<input type='hidden' name='problem_title'  value='$title'/>
</form>
_END;
		echo "
<tr><td>$title</td><td>$uploaded_By</td><td>$date</td><td align='center'>$form_solution 
<a href='javascript:{}' onClick='send_problem(\"$problem_id\");'>$number_of_solutions</a></td><td>$status</td><td>$view</td><td>$action</td></tr>
";
		$count++;
		}
		echo "</table>";	
		break;
		
		case 4:
			$search_cat='Name';
			$search_value=mysql_fix_string($_POST['search_key']);
			$query="SELECT `problem`.`Description`,`problem`.`Date_Added`,`problem`.`Problem_ID`,`problem`.`Title` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username AND newaccount.Name LIKE '%$search_value%' ORDER BY `problem`.`Date_Added` DESC";
			$resource=mysql_query($query) or die(mysql_error());
			echo <<<_END
			<table border='1'>
			<caption style='color:blue; font-size:1.9em;'>Showing problems uploaded by $search_value</caption>
			<tr><th width='20%'>Problem Title</th><th width='20%'>Uploaded By</th> <th width='10%'>Upload Date</th><th width='7%'>Solutions provided</th><th width='10%'>Solution  Status</th><th width='10%'>View Complete Description</th><th width='10%'>Solve</th></tr>
_END;
					while($problem=mysql_fetch_array($resource)){
					$uploaded_By=$problem['Name'];
					$title=$problem['Title'];
					$date=$problem['Date_Added'];
					$problem_id=$problem['Problem_ID'];
					$query1=mysql_query("SELECT * FROM solution WHERE Problem_ID='$problem_id'");
					$number_of_solutions=mysql_num_rows($query1);
					$sol_id=$problem['Problem_ID']."_".$user;
					$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
$view=<<<_END
<form action='View Problem.php' method='post'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<button style='background-color:#cfc;'><a href=''>view</a></button>
		</form>
_END;
					if(mysql_num_rows($query2)==0)
					{
						$status="<p style='color:red;'>Not solved</p>";
						$action= <<<_END
<form action='Main Section.php' method='post'>
<input type='hidden' value='$sol_id' id='solution_id' name='solution_id' />
<input type='hidden' value='$problem_id' id='problem_id' name='problem_id' />
<input type='submit' value='Solve Problem' />
</form>
_END;
						
					}
					else{
						$status="<p style='color:blue;'>Solved</p>";
						$action='';
					}
				$view=<<<_END
<form action='View Problem.php' method='post'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<button style='background-color:#cfc;'><a href=''>view</a></button>
		</form>
_END;
$form_solution=<<<_END
<form method='post' action='user_view.php' id='$problem_id'>
<input type='hidden' name='solutions_by_problem' value='true'/>
<input type='hidden' name='problem_id'  value='$problem_id'/>
<input type='hidden' name='problem_title'  value='$title'/>
</form>
_END;
		echo "
<tr><td>$title</td><td>$uploaded_By</td><td>$date</td><td align='center'>$form_solution 
<a href='javascript:{}' onClick='send_problem(\"$problem_id\");'>$number_of_solutions</a></td><td>$status</td><td>$view</td><td>$action</td></tr>
";
		}
		echo "</table>";	
		break;
	}
	
}else{
	$user=$_SESSION['Username'];
	$query="SELECT `problem`.`Description`,`problem`.`Date_Added`,`problem`.`Problem_ID`,`problem`.`Title` , newaccount.Name FROM problem, newaccount WHERE problem.Username=newaccount.Username ORDER BY `problem`.`Date_Added` DESC";
		$resource=mysql_query($query) or die(mysql_error());
echo <<<_END
<table border='1'>
<caption style='color:blue; font-size:1.9em;'>Showing all problems uploaded </caption>
<tr><th width='20%'>Problem Title</th><th width='20%'>Uploaded By</th> <th width='10%'>Upload Date</th><th width='7%'>Solutions provided</th><th width='10%'>Solution  Status</th><th width='10%'>View Complete Description</th><th width='10%'>Solve</th></tr>
_END;
$count=0;
		while($problem=mysql_fetch_array($resource)){
		$uploaded_By=$problem['Name'];
		$title=$problem['Title'];
		$date=$problem['Date_Added'];
		$problem_id=$problem['Problem_ID'];
		$form1_id="view_problem_".$count;
		$form2_id="solve_problem_".$count;
		$query1=mysql_query("SELECT * FROM solution WHERE Problem_ID='$problem_id'");
		$number_of_solutions=mysql_num_rows($query1);
		$sol_id=$problem['Problem_ID']."_".$user;
		$query2=mysql_query("SELECT * FROM solution WHERE solution_id='$sol_id'") or die(mysql_error());
		if(mysql_num_rows($query2)==0)
		{
			$status="<p style='color:red;'>Not solved</p>";
			
			$action= <<<_END
<form action='Main Section.php' method='post' id='$form2_id'>
<input type='hidden' value='$sol_id' id='solution_id' name='solution_id' />
<input type='hidden' value='$problem_id' id='problem_id' name='problem_id' />
<label><a href='javascript:{}' onClick='send_problem("$form2_id");'>Solve</a></label>
</form>
_END;
			
		}
		else{
			$status="<p style='color:green;'>Solved</p>";
			$action =" ";
		}
$view=<<<_END
<form action='View Problem.php' method='post' id='$form1_id'>
		<input type='hidden' name='view_problem' id='view_problem' value='$title'/>
		<input type='hidden' name='id_problem' id='id_problem' value='$problem_id'/>
		<label><a href='javascript:{}' onClick='send_problem("$form1_id");'>view</a></label>
		</form>
_END;
$form_solution=<<<_END
<form method='post' action='user_view.php' id='$problem_id'>
<input type='hidden' name='solutions_by_problem' value='true'/>
<input type='hidden' name='problem_id'  value='$problem_id'/>
<input type='hidden' name='problem_title'  value='$title'/>
</form>
_END;
		echo "
<tr><td>$title</td><td>$uploaded_By</td><td>$date</td><td align='center'>$form_solution 
<a href='javascript:{}' onClick='send_problem(\"$problem_id\");'>$number_of_solutions</a></td><td>$status</td><td>$view</td><td>$action</td></tr>
";
		}

echo "</table>";	
}
if(isset($_SESSION['solution_id']))
{
echo <<<_END
<script>
var cell= document.getElementsByTagName('td');
var content;
for(var i=0; i<cell.length; i++){
	content=cell[i].innerHTML;
	if(content.match(';\">Solve</a>'))
		{
	cell[i].innerHTML='';
}
}
</script>
_END;
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