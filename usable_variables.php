<?php

	function addVariables()
	{
		echo "<div style=' background-color:#aaa;'>
	<p style='padding-left:3%;'>
	";
	$sectionName=$_SESSION['section'];
	$solution_id=$_SESSION['solution_id'];
	$con=connect();
	$getSections="SELECT variableName,variableType FROM variable WHERE sectionName='$sectionName' OR variableScope='global'";
	$result=mysql_query($getSections) or die(mysql_error());
	$getConstants=mysql_query("SELECT `const_name` FROM `myconstants` WHERE solution_id='$solution_id'");
	if(mysql_num_rows($result)>0 || mysql_num_rows($getConstants)>0){
		if(mysql_num_rows($result)>0){echo "The following variables can be used in the expression<br />";}
	while($section=mysql_fetch_array($result))
	{
		$sect=$section["variableName"];
		$type=$section["variableType"];
		print("<input type='checkbox' id='$sect' value='$sect' onClick='updateExp(\"$sect\");'/>$sect<br />");
	}
	if(mysql_num_rows($getConstants)>0){echo "The following constant(s) can be used in the expression<br />";}
	while($constant=mysql_fetch_array($getConstants))
		{
			$myconst=$constant['const_name'];
			print("<input type='checkbox' id='$myconst' value='myconst' onClick='updateExp(\"$myconst\");'/>$myconst<br />");
		}
	}
	else{
		echo "There are no declared variables. Click <a href='Declare Variable.php' >here to declare a variable</a> ";
	}
echo "<input type='hidden' id='' name='section' value='$sectionName' />";
echo <<<_END
</p></div>
_END;
	}
	
	function addVariablesfor_fuction_call($returnType)
	{
		echo "<div style=' background-color:#aaa;'>
	<p style='padding-left:3%;'>
	";
	$sectionName=$_SESSION['section'];
	$solution_id=$_SESSION['solution_id'];
	$con=connect();
	$getSections="SELECT variableName,variableType FROM variable WHERE (sectionName='$sectionName' OR variableScope='global') AND solution_id
	='$solution_id'";
	$result=mysql_query($getSections) or die(mysql_error());
	
	if(mysql_num_rows($result)>0 && $returnType != 'void' ){
		echo "The called function can be assigned to any of these variables<br />";
		while($section=mysql_fetch_array($result))
		{
			$sect=$section["variableName"];
			$type=$section["variableType"];
			if($type==$returnType){
			print("<input type='checkbox' id='$sect' value='$sect' onClick='updateExp(\"$sect\");'/>$sect<br />");}
		}

	}
	else{
		echo "There are no declared variables. Click <a href='Declare Variable.php' >here to declare a variable</a> ";
	}
echo "<input type='hidden' id='' name='section' value='$sectionName' />";
echo <<<_END
</p></div>
_END;
	}
?>