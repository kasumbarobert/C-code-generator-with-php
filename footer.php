<link rel="stylesheet" type="text/css" href="main_style_general.css">
<div id='sub_footer_main_page' style='clear:both;'>
<img src='logo.png' style='float:left;'/>
<?php
$session=$_SESSION['Username'];
$con=connect();
$query="SELECT Name FROM newaccount WHERE Username='$session'";
$result=mysql_query($query) or die(mysql_error());
$run=mysql_fetch_array($result);
$name=$run['Name'];
echo"

					<ul><li>&nbspYou are logged in as $name &nbsp&nbsp</li>
					<li>&nbsp<a href='Logout.php'>Logout</a>&nbsp&nbsp</li></ul>
"
?>				
</div>