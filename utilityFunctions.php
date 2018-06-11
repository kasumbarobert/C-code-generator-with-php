<?php
session_start();
//$_SESSION['section']='ReadNumber';
//$_SESSION['solution_id']='problem_20150721_4_robert';
function connect()
{
	$con=@mysql_connect("localhost","root", "");
	mysql_select_db("c",$con);
	return $con;
}
function trimPrototype($header)
{
	$newstrin=preg_replace('/[{]/',";",$header);
	return $newstrin;
}

if(isset($_SESSION['solution_id']))
{
	$action=' ';
}
function completeCode(){
	$con=connect();
	$solution=$_SESSION['solution_id'];
	$problem=$_SESSION['problem_id'];
	$query1="SELECT SectionName, sectionHeader , function FROM logs WHERE solution_id='$solution'";
	$resource=mysql_query($query1) or die(mysql_error());
	$prototype='';
	$function_body='';
	$consts='';
	$getConstants=mysql_query("SELECT `const_value` FROM `myconstants` WHERE solution_id='$solution'");
	
	while($constants=mysql_fetch_array($getConstants))
	{
		$consts=$consts." \n ".$constants['const_value'];
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
	$code="#include <stdio.h>\n#include <math.h>\n";
	
	$code=$code.$consts."\n".$prototype."\n".$main."\n".$function_body;
	
	return $code;
}
function mysql_fix_string($string) {if (get_magic_quotes_gpc()) $string = stripslashes($string);    return mysql_real_escape_string($string); } 

function printCode($code)
{
	$newfunction=$code;
	$newfunction=preg_replace('/[;]/',';<br />',$newfunction);
	$newfunction=preg_replace('/[:]/',':<br />',$newfunction);
	$newfunction=preg_replace('/[{]/','{<br />',$newfunction);
	$newfunction=$newfunction."}";
	echo $newfunction;
} 

function getSection()//returns the function body of the current function
{
	$con=connect();
	if(isset($_SESSION['section'])){
	$section=$_SESSION['section'];
	$solution=$_SESSION['solution_id'];
	$getFunction="SELECT function FROM logs WHERE sectionName='$section' AND solution_id='$solution'";
	$query1=mysql_query($getFunction) or die(mysql_error());
	$result=mysql_fetch_array($query1);
	$newfunction=$result['function'];
	}
	else{
		$newfunction='<p>There is no created function. Create a function first and then preview it from here</p> ';
	}
	return $newfunction;
}

if(!isset($_SESSION['Username']))
{
	header("Location:login.php");
}

function UpdateSection($print,$section)
{
	$solution_id=$_SESSION['solution_id'];
	$getFunction="SELECT function FROM logs WHERE sectionName='$section' AND solution_id='$solution_id'";
	$query1=mysql_query($getFunction) or die(mysql_error());
	$result1=mysql_fetch_array($query1);
	$newfunction=$result1['function'].$print;
	$newfunction=mysql_fix_string($newfunction);
	$AddPrint="UPDATE logs SET function='$newfunction' WHERE sectionName='$section'";
	$query2=mysql_query($AddPrint) or die(mysql_error());
	if($query2)
	{
		return true;
	}
}
?>

