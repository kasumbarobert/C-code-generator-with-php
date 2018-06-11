<html>
<head>
 <meta charset="utf-8"/>
 <title>Profile</title><!--Title of the page -->
</head>

<body>
	<?PHP
	session_start();
	
	if(isset($_SESSION['password']))
	{
    echo "<span style='color:blue; font-size:2em;'>Logged in as $_SESSION[Name]
			(<a href='Logout.php' style='color:red; font-size:0.8em; text-decoration:underline;'>logout</a>)</span>";
	}

	?>
</body>
</html>