<html>
<head>
<title>Home| C Code Generator</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();

	if(!(isset($_SESSION['Username'])))
	{
		die("Cannot accesss the page");
	}else{
	require_once("student.php");}   
?>
<fieldset style="position:absolute; background-color: #efefef; left:130px; top: 100px; width: 300px; height: 300px; margin: 10px; border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">
	<legend><h2>Problems Available</h2></legend>
	<button>More<span style="background:#ffffff;color:blue">&raquo;</span></button>
		</fieldset>
<fieldset style="position:absolute; background-color: #efefef; left:510px; top: 100px; width: 300px; height: 300px; margin: 10px; border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">
	<legend><h2>View Solutions</h2></legend>
	<button>More<span style="background:#ffffff;color:blue">&raquo;</span></button>
</fieldset>
<fieldset style="position:absolute; background-color: #efefef; left:890px; top: 100px; width: 300px; height: 300px; margin: 10px; border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">
	<legend><h2>Recently Logged In</h2></legend>
	<button>More<span style="background:#ffffff;color:blue">&raquo;</span></button>
</fieldset>
<fieldset style="position:absolute; background-color: #efefef; left:890px; top: 450px; width: 300px; height: 100px; margin: 10px; border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">
	<legend></legend>
	<font size="5em">Click <a href="">here</a> for comments, feedback and inquiries </font>
</fieldset>
<fieldset style="position:absolute; background-color: #efefef; left:130px; top: 600px; width: 1050px; height: 60px; margin: 10px; border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">
	<legend></legend>
	<font size="30em">C CODE GENERATOR</font>
	<?php
	print("
	          &nbsp&nbsp&nbsp&nbspLogged in as $_SESSION[Username]&nbsp&nbsp&nbsp
			   <a href='logout.php'>Logout</a><br />;
		  ")
    ?>
		</fieldset>
<?php
 require_once('footer.php');
?>
</body>
</html>
