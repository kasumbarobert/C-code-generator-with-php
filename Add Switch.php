<html>
<head>
	<title>Switch Statement</title>
	<script src="utilityFunctions.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
	<script>
		var number_of_cases=1;
	</script>
<style type="text/css">
</style>
<?php
require_once("utilityFunctions.php");

?>
<style type='text/css'>
#main{
	width:100%;
	display:inline-block;
	border: 1px solid;
}
#first_section{
	width:22%;
	float:left;
	background-color:#ddd;
}
#second_section{
	width:40%;
	float:left;
	padding:1%;
}
#third_section{
	width:32%;
	float:left;
	background-color:#ddd;
	padding:1%;
}
section{
	overflow:scroll;
}
</style>
</head>
<body>
<?php
	require_once("generate_code_header.php");
	//unset($_SESSION['switch_case']);
?>
<div id='main'>
<section id='first_section'>
<fieldset style='font-size:1.2em;'>
<?php

	if(isset($_SESSION['switch_case']) && $_SESSION['switch_case'] != '')
	{
		echo "<h5>Below is the case statement you are working on</h5>";
		echo "<p style='font-size:0.8em;'> Use the menu bar above to add components to and then add it(the case) to its parent switch</p>";
		$newfunction=$_SESSION['switch_case'];
		$newfunction=preg_replace('/[:]/',':<br />',$newfunction);
		$newfunction=preg_replace('/[;]/',';<br />',$newfunction);
		$newfunction=preg_replace('/[{]/','{<br />',$newfunction);
		echo $newfunction."break;";
echo <<<_END
<hr border='1'>
<form action='Compile Switch.php' method='post' id='add_to_switch'>
<input type='hidden' name='add_case' value='true'/> 
<a href='javascript:{}' onClick='send_problem("add_to_switch");' style='text-decoration:underline;' >Add the case components to the switch<a/> <br />Note: Only add the case once you are done
</form>
</fieldset>
_END;
	}
	else{
		echo "No case structure is being worked on!";
	}
?>
</section>
<section id='second_section'>
<?php
if(isset($_SESSION['switch'])){
	$switch=$_SESSION['switch'];
	$con=connect();
	$getCase="SELECT case_Value FROM cases WHERE attached_Switch='$switch' AND case_Status='0' ";
	$result=mysql_query($getCase) or die(mysql_error());
	if(mysql_num_rows($result)==0)
	{
		echo "All cases have been worked!";
	}
if(!isset($_SESSION['switch_case'])){
echo <<<_END
<form id='choose_case' name='choose_case' method='post' action='Components to case.php'>
Choose a case to add components<br />

_END;

while($case=mysql_fetch_array($result))
{
	$thiscase=$case['case_Value'];
	$thiscase = htmlentities($thiscase);
	echo"<p style='text-indent:4%;'><input type='radio' name='chosen_case' value=\"".$thiscase."\">Case: $thiscase </option><br /></p>";
}
echo <<<_END

<input type='submit' value='Add components'/>
</form>

_END;
}
else{
	
}
}
else{
echo <<<_END
	<div>
		<form method='post' name='add_switch' id='add_switch' action='Add Switch.php'>
		What do you wish to pass to the switch statement?<br />
		<input type='radio' name='pass_to_switch' id='pass_single_var' value='1' required='required'/>Single Variable <br />
		<input type='radio' name='pass_to_switch' id='pass_single_exp' value='0' required='required'/>An Expression<br />
		<div id='pass_exp' style='display:none;'>
		<textarea cols='60' rows='5' id="expression" name="expression" required></textarea><br />
		<p>
		<input type='button' value='*' onClick='updateExp("*");' />
		<input type='button' value='+'  onClick='updateExp("+");' />
		<input type='button' value='/'  onClick='updateExp("/");'/> 
		<input type='button' value='-'  onClick='updateExp("-");'/>
		<input type='button' value='%'  onClick='updateExp("%");'/>  
		<input type='button' value='>'  onClick='updateExp(">");'/>
		<input type='button' value='<'  onClick='updateExp("<");'/>
		<input type='button' value='='  onClick='updateExp("=");'/>
		<input type='button' value='==' onClick='updateExp("==");'/>
		<input type='button' value='>=' onClick='updateExp(">=");'/>
		<input type='button' value='=<' onClick='updateExp("=<");'/>
		<input type='button' value='!=' onClick='updateExp("!=");'/> 
		<input type='button' value='('  onClick='updateExp("(");'/> 
		<input type='button' value=')'  onClick='updateExp(")");'/> 
		</p>
		<p>
		The following variables can be used in the expression<br />
_END;
			
				$sectionName=$_SESSION['section'];
				$con=connect();
				$getSections="SELECT variableName,variableType FROM variable WHERE sectionName='$sectionName' OR variableScope='global'";
				$result=mysql_query($getSections) or die(mysql_error());
				while($section=mysql_fetch_array($result))
				{
					$sect=$section["variableName"];
					$type=$section["variableType"];
					print("<input type='checkbox' id='$sect' value='$sect' onClick='updateExp(\"$sect\");'/>$sect<br />");
				}
echo <<<_END
			</p>
		 </div>
		 <div id='variables' style='display:none;'>
			 Choose the variable to pass the switch Statement <select id='pass_var' name='pass_var'>
_END;
			 
				$con=connect();
				$sectionName=$_SESSION['section'];
				$getSections="SELECT variableName,variableType FROM variable WHERE sectionName='$sectionName'";
				$result=mysql_query($getSections) or die(mysql_error());
				while($section=mysql_fetch_array($result))
				{
					$sect=$section["variableName"];
					$type=$section["variableType"];
					print("<option value='$sect'>".$section["variableName"]."</option>  ");
				}
echo <<<_END
			</select>
		 </div>
		 <div id='cases'>
		 Add cases to the switch:
		 <p>Case 1: Value <input type='text' id='case_1' name='case_1' required='required'/></p>
		 </div>
		 <p> <button style="font-size:0.8em;" id="otherCases" onClick='return AddCase();' >Add another Case</button></p>
		<input type='hidden' name='generated_code' id='generated_code'/>
		<input type='hidden' name='number_of_cases' id='number_of_cases'/>
		<textarea id='generated_code1' cols='50' disabled></textarea><br /><br />
		<input type='submit' value='Create Switch Statement'/> &nbsp &nbsp &nbsp &nbsp &nbsp
		<input type='reset' value='Clear' /><br /><br />

		</form>

	</div>
	<script>
	function AddCase()
	 {
		var id="case_"+number_of_cases;
		if($(id).value != '') 
		{
			number_of_cases++;
			var caseId="case_"+number_of_cases;
			var content="Case"+number_of_cases+ ": Value <input type='text' name ='"+caseId+"' id='"+caseId+"' required/>";
			var addVariable=document.createElement("p");
			var section=$("cases");
			addVariable.innerHTML=content;
			section.appendChild(addVariable);
		 }
		 else{
			 alert("First fill the empty fields");
			 $(id).focus();
		 }
		 return false;
	 }
	 
	 function updateExp(value)
	 {
		 $("expression").value+=value;
	 }
	 function hideExp()
	 {
		 $("pass_exp").style.display='none';
		  $("expression").disabled=true;
		 $("variables").style.display='block';
		 $("pass_var").disabled=false;
	 }
	 function hideVar()
	 {
		  $("pass_exp").style.display='block';
		  $("expression").disabled=false;
		 $("variables").style.display='none';
		 $("pass_var").disabled=true;
	 }
	 function updateSwitch()
	 {
		 var choice=document.add_switch.pass_to_switch.value;
		 var switch_stmnt="switch(";
		 if(choice==1)
		 {
			 switch_stmnt=switch_stmnt+$("pass_var").value+") {";
			 $("generated_code").value=switch_stmnt;
			 $("generated_code1").value=switch_stmnt;
		 }
		 else if(choice==0)
		 {
			 switch_stmnt=switch_stmnt+$("expression").value+") {";
			 $("generated_code").value=switch_stmnt;
			 $("generated_code1").value=switch_stmnt;
		 }
	 }
	 function organize()
	 {
		 $("number_of_cases").value=number_of_cases;
	 }
	 $('pass_single_var').addEventListener("click",hideExp);
	 $('pass_single_exp').addEventListener("click",hideVar);
	 $('add_switch').addEventListener("click",updateSwitch);
	  $('add_switch').addEventListener("mouseover",updateSwitch);
	 $('add_switch').addEventListener("submit",organize);

	</script>
_END;
}

?>
</section>
<section id='third_section'>
	<?php
		if(isset($_POST['pass_to_switch']) && isset($_POST['number_of_cases']) )
		{
			$header=$_POST['generated_code'];
			$number_of_cases=$_POST['number_of_cases'];
			$choice=$_POST['pass_to_switch'];
			if($choice==1)
			{
				$pass_variable_or_exp=$_POST['pass_var'];
			}else{
				$pass_variable_or_exp=$_POST['expression'];
			}
			$con=connect();
			$section=$_SESSION['section'];
			
			$query="SELECT id FROM switch WHERE attached_Section='$section'";
			$result=mysql_query($query) or die(mysql_error());
			$result=mysql_num_rows($result) + 1;
			$id=$section.'_switch_'.$result;
			$query1="SELECT variableType FROM variable WHERE variableName='$pass_variable_or_exp'";
			$result1=mysql_query($query1) or die(mysql_error());
			if(mysql_num_rows($result1)==1)
			{
				$result1=mysql_fetch_array($result1);
				$dataType=$result1['variableType'];
				$query2="INSERT INTO switch(id, pass_Value, header, dataType, attached_Section) VALUES('$id','$pass_variable_or_exp','$header','$dataType','$section')";
				$result2=mysql_query($query2) or die(mysql_error());
				if($result2)
				{
					echo "<script>alert('the switch statement is added successful')</script>";
				}
			}
			else{
				$query2="INSERT INTO switch(id, pass_Value, header, attached_Section) VALUES('$id','$pass_variable_or_exp','$header','$section')";
				$result2=mysql_query($query2) or die(mysql_error());
				if($result2)
				{
					echo "<script>alert('the switch statement is added successful')</script>";
				}
			}	
			$i=1;
			$_SESSION['switch']=$id;
			while($i<=$number_of_cases)
			{
				$caseValue=$_POST['case_'.$i];
				$caseValue=mysql_fix_string($caseValue);
				$result2=mysql_query("INSERT INTO `c`.`cases` (`case_Value`, `case_Body`, `case_Status`, `attached_Switch`)VALUES ('$caseValue', '','0', '$id')") or die(mysql_error());
				$i++;
			}
			$result2=mysql_query("INSERT INTO `c`.`cases` (`case_Value`, `case_Body`, `case_Status`, `attached_Switch`)VALUES ('default', '','0', '$id')") or die(mysql_error());
			
			echo "<script>window.location.href='Add Switch.php'</script>";
		}
		if(isset($_SESSION['switch']))
	{
		$switch=$_SESSION['switch'];
		$con=connect();
		$query1="SELECT header FROM switch where id='$switch'";
		$result1=mysql_query($query1) or die(mysql_error());
		$result=mysql_fetch_array($result1);		
		$_SESSION['complete_switch']=$result['header'];
		$newfunction=$result['header'];
		printCode($newfunction);
echo <<<_END
<hr border='1'>
<form method='post' action='Compile Switch.php'>
_END;
require_once("add_to.php");
echo <<<_END
<input type='hidden' name='add_Switch_to_Section' id='add_Switch_to_Section' value='true'/>
<input type='submit' value='Submit Switch'> <br />Note: Only add the switch statement once you are done
<script>
$("add_to_switch_case").disabled=true;
</script>
</form>
_END;
	}
else{
echo <<<_END
<ol>
<li><a href='Add Read.php'>Add Read statement</a></li>
<li><a href='Add Print.php'>Add Print Statement</a></li>
<li><a href='Add Expression.php'>Add Computations</a></li>
<li><a href='Add Return.php'>Add Return Statements</a></li>
<li><a href='Add Condition.php'>Add Decision statements</a></li>
</ol>
<form method='post' action='Add Statements to Case.php'>
<input type='hidden' name='view_Switch' id='view_Switch' value='true'/>
<input type='submit' value='View switch Statement'/>
_END;
}
?>
</form>
</section>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>
