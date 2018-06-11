<link rel="stylesheet" type="text/css" href="main_style_general.css">
<div id='top_section' style='display:inline-block; width:100%;'>
			<div id='main_menu' style='width:70%; color:red; float:left;'>	<ul>
					<li><a href='index.php'>&nbspHome&nbsp&nbsp </a></li>
					<li><a href='Problems.php'>&nbspProblems&nbsp</a></li>
					<li><a href='user_view.php'>&nbspSolutions&nbsp</a></li>
					<li><a href='myprofile.php'>&nbspMy Account&nbsp</a></li>
					<?php if(isset($_SESSION['solution_id'])){echo "<li><a href='Main Section.php' style='color:#f0f; font-style:bold;'>Code generator</a></li>";}?>
					<li><a href='help.php'>&nbspHelp&nbsp</a></li>
				</ul>
			</div>
			<div style='width:30%; float:right;' id='main_menu_account'>
			<?php
			$session=$_SESSION['Username'];
			$con=connect();
			$query="SELECT Name FROM newaccount WHERE Username='$session'";
			$result=mysql_query($query) or die(mysql_error());
			$run=mysql_fetch_array($result);
			$name=$run['Name'];
			echo"

			<ul style='font-size:0.6em; text-align:right;'><li><a href='myprofile.php'>$name</a><li>
			<li><a href='Logout.php' style='font-size:'>(Logout)</a></li></ul>
			"
			?>
			</div>
</div>