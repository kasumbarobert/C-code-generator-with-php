<html><!-- We add html so that the document has properties like title -->
<head>
	<title>Uploaded problem</title>
</head>
<body>
<?php
	$problem = $_POST['input'];
	if($problem != '')
	{
		$filename = "file.txt";
		$newfile = @fopen($filename, "w") or die("Couldn't create file.");
		@fwrite($newfile, $problem) or die("Couldn't write to file."); 		
	}
	else if($_FILES)
	{
		$name = $_FILES['upload']['name'];
		
		switch($_FILES['upload']['type'])
		{
			case 'text/plain':
			$ext = 'txt';
			break;
			
			default:
			$ext='';
			break;
		}
		if($ext)
		{
			$n = "file.$ext";
			move_uploaded_file($_FILES['upload']['tmp_name'],$n);
			echo " File successfully uploaded <br />";
		}
		else
		{
			echo "'$name' is not an accepted text file";
			exit;
		}
	}	
	else
	{
		die("No file selected.");
	}
	
?>
<p><a href="View Uploaded Problem.php"> View uploaded problem </a></p>
				
</body>
</html>