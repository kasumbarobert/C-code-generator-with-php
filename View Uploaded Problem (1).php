
<?php
	//Reading Data from a File

	$filename = "file.txt";

	$whattoread = @fopen($filename, "r") or die("Couldn't open file");

	$file_contents = fread($whattoread, filesize($filename));
	/*fread reads all the lines from the open file pointer ($whattoread)
	for as long as there are lines in the file:*/

	$new_file_contents = nl2br($file_contents);
	/*the nl2br function helps to display the file contents with their breaks
	as the browser which renders only in html doesn't understand the line breaks*/ 

	$msg = "The file contains:<br><br><br>$new_file_contents"; //variable to print msg


?>

<html>
<head>
	<title>Uploaded problem</title>
</head>
<body>

	<?php echo "$msg"; ?>
</body>
</html>