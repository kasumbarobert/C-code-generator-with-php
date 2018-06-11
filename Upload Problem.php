<html>
<head>
	<title>Upload problem</title>
	<script src="utilityFunctions.js"></script>
</head>
<?php
require_once("utilityFunctions.php");
?>
<body>
<?php
require_once("student.php");
?>
<fieldset style='margin-left:auto; margin-right:auto; width:60%;'>
<?php
	if(isset($_FILES["uploaded_file"]) && $_FILES["uploaded_file"]['name'] != '')
	{
		
		$title=isset($_POST['problem_title'])?$_POST['problem_title']:'';
		$folder="problems/";
		$taget_file=$folder .basename($_FILES["uploaded_file"]["name"]);
	    $ext=$_FILES["uploaded_file"]["type"];
		if($ext=='text/plain')
		{if(move_uploaded_file($_FILES["uploaded_file"]["tmp_name"],$taget_file)){
			
			$resource=file_get_contents($taget_file);
			
			echo <<<_END
			<form method="post" action="Upload Problem.php" id='upload_file_form'  enctype="multipart/form-data" >
				Choose how to add the problem:<br />
				<input type='radio' name='how_to_upload' value='1'>Type the problem<br />
				<input type='radio' name='how_to_upload' value='0'>Upload a text file<br />
				<p>Enter the problem topic/title<br />
				<textarea id='problem_title' name='problem_title' cols='50' rows='2'/>$title</textarea></p>
				<p>Upload problem here: <br />
					<textarea  cols='70' rows='15' id='problem_description' name='problem_description'>$resource</textarea>
				</p>
				<p>Select file: <input type="file" name="uploaded_file" id="uploaded_file" placeholder="" /></p>
				<p><input type="submit" value="Upload"/></p>
			</form>
_END;
		}}
		else{
			echo "<script>alert(\"The file uploaded should be a text file(*.txt)\");
			window.location.href='Upload Problem.php';
			</script>";
		}
	}
	else if(isset($_POST['problem_description']))
	{
		$con=connect();
		$title=$_POST['problem_title'];
		$problemID="problem_".Date("Ymd");
		$date=Date("Y-m-d");
		$user=$_SESSION['Username'];
		$description=$_POST['problem_description'];
		$query="SELECT Problem_ID FROM problem WHERE Problem_ID LIKE '%$problemID%'";
		$resource=mysql_query($query) or die(mysql_error());
		$number_of_upload_problems=mysql_num_rows($resource) + 1;
		$problemID=$problemID."_".$number_of_upload_problems;
		$description=mysql_fix_string($description);
		$query1="INSERT INTO `c`.`problem` (`Problem_ID`, `Title`, `problem`.`Description`, `Date_Added`, `Username`) VALUES('$problemID','$title','$description','$date','$user')";
		$resource1=mysql_query($query1) or die(mysql_error());
		if($resource1)
		{
			header("Location:index.php");
		}
		
	}
	
	else{
echo <<<_END
<form method="post" action="Upload Problem.php" id='upload_file_form' enctype="multipart/form-data" >
	Choose how to add the problem:<br />
	<input type='radio' name='how_to_upload' value='1'>Type the problem<br />
	<input type='radio' name='how_to_upload' value='0'>Upload a text file<br />
	<p>Enter the problem topic/title<br />
	<textarea id='problem_title' name='problem_title' cols='50' rows='2' required/></textarea></p>
	<p>Upload problem here: <br />
		<textarea  cols='55' rows='15' id='problem_description' name='problem_description' placeholder="You may type in the problem or upload a file\n(Only text files are supported i.e .txt)" required></textarea>
	</p>
	<p>Select file: <input type="file" name="uploaded_file" id="uploaded_file" placeholder="" /></p>
	<p><input type="submit" value="Upload"/></p>
</form>
_END;
	}	
?>
</fieldset>
<?php
	
?>
<script>
function UpdateForm()
{
	var file=$('uploaded_file').value;
	
	if(file)
	{
		$('upload_file_form').submit();
	}
}
$('uploaded_file').addEventListener("change",UpdateForm);
</script>
<?php
 require_once('footer.php');
?>
</body>
</html>