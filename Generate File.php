<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Home| C Code Generator</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="main_style_general.css">
<?php
require_once("utilityFunctions.php");
?>
<style type='text/css'>
</style>
</head>
<body>
<?php
require_once("student.php");
?>
<?php


if(isset($_POST['c_filename']))
{
	$con=connect();
	$solution=$_SESSION['solution_id'];
	$problem=$_SESSION['problem_id'];
	$filename=$_POST['c_filename'];
	$target_folder="code files/";
	$file=$target_folder.$filename.".c";
	$query1="SELECT SectionName, sectionHeader , function FROM logs WHERE solution_id='$solution'";
	$resource=mysql_query($query1) or die(mysql_error());
	$prototype='';
	$function_body='';
	$consts='';
	$getConstants=mysql_query("SELECT `const_value` FROM `myconstants` WHERE solution_id='$solution'");
	
	while($constants=mysql_fetch_array($getConstants))
	{
		$consts=$consts."\n".$constants['const_value'];
	}
	while($section=mysql_fetch_array($resource))
	{
		if($section['SectionName']=='main')
		{
			$main=$section['function'];
		}
		else{
			$file_header=trimPrototype($section['sectionHeader']);
			$function=$section['function'];
			$prototype=$prototype."\n".$file_header;
			$function_body=$function_body."\n".$function;
		}
	}
	$get_prob_title=mysql_fetch_array(mysql_query("SELECT Title FROM problem WHERE Problem_ID='$problem'"));
	
	$prob_title="/*".$get_prob_title['Title']."*/\n";
	$code="#include <stdio.h>\n#include <math.h>\n";
	$code=$prob_title.$code.$consts."\n".$prototype."\n".$main."\n".$function_body;
	/*$code=preg_replace('/[;]/',";\n",$code);
	$code=preg_replace('/[:]/',":\n",$code);
	$code=preg_replace('/[{]/',"{\n",$code);
	$code=preg_replace('/[}]/',"}\n",$code);*/

	if(file_exists($file)){
		$_SESSION['file_exist']="<p style='font-size:0.7em;font-style:italic; color:red;'>File \"$filename\" exists. Use a different file name<p/>";
		echo "<script>window.location.href='Main Section.php'</script>";
	}
	else{
		$fptr=fopen($file,"w+");
		if(fwrite($fptr,$code))
		{
			echo "Your file has been created successfully. Click <a href='$file'>here </a> to <a href='$file'>download</a>";
			$query2="UPDATE solution SET FileName='$file' WHERE solution_id='$solution'";
			mysql_query($query2) or die(mysql_error());
			$query="DELETE FROM variable WHERE solution_id='$solution'";
			mysql_query($query) or die(mysql_error());
			mysql_query("DELETE FROM myconstants WHERE solution_id='$solution'") or die(mysql_error());
			if(isset($_SESSION['switch'])){
				$switch=$_SESSION['switch'];
				mysql_query("DELETE FROM case WHERE attached_Switch='$switch'") or die(mysql_error());
				mysql_query("DELETE FROM switch WHERE solution_id='$solution'") or die(mysql_error());
				}
			unset($_SESSION['solution_id']);
			unset($_SESSION['main']);
			unset($_SESSION['section']);
			unset($_SESSION['switch']);
			unset($_SESSION['switch_case']);
			unset($_SESSION['if']);
			unset($_SESSION['loop']);
		}
		else{
			echo "Failure: The file $file has not been created and saved";
		}
	}
}
else{
	
	echo "<script>window.location.href='index.php'</script>";
}

?>
<?php
 require_once('footer.php');
?>
</body>
</html>