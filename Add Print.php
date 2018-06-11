
<html>
<head>
	<title>Print Statement</title>
	<script src="getSpecifier.js"></script>
	<link rel='stylesheet' href='main_style.css'/>
	<script>
	function $(id)
	{
		return document.getElementById(id);
	}//function to replace the long document.getElementById with $;

	var counter=0;
	var specifiers=new Array();
	var variable=new Array();
	var type=new Array();
	var message;
 function getValue(id) {
    // access properties using this keyword
	var content;
	var table=$
    if ( $(id).checked ) {
        specifiers[counter]="%"+(counter+1);
		variable[counter]=$(id).name;
		type[counter]=$(id).value;
        content="<td>"+$(id).name+"</td><td>"+specifiers[counter]+"</td>"
		var addVariable=document.createElement("tr");
		var table=$("t_specifiers");
		addVariable.innerHTML=content;
		table.appendChild(addVariable);
		counter++;
    } else {
        // if not checked ...
    }
}
function generatePrintf()
{
	var spec;
	var format_type;
	var name;
	var tester;
	var re;
	message="\""+$('print_message').value+"\"";
	if(counter>0)
	{
		for(var j=0; j<counter; j++)
		{
			format_type=getSpecifier(type[j]);
			name=variable[j];
			spec=specifiers[j];
			re = new RegExp(spec);
			if(re.test(message))
			{
				message=message.replace(re, format_type);
				message+=", "+name;
			}
		}
	}
	message="printf("+message+");"
	$('generated_code_view').value=message;
	$('generated_code').value=message;
}
function activateDeactivate()
{
	if(document.add_print.use_variables.value==0)
	{
		$('vars').style.display='none';
	}
	else{
		$('vars').style.display='block';
	}
}
//document.add_print.use_variables.addEventListener("change",activateDeactivate);
//$('print_message').addEventListener("change",generatePrintf);
</script>
<style type="text/css">
</style>
<?php
require_once("utilityFunctions.php");
?>
</head>
<body>
<?php
	require_once("generate_code_header.php");
?>
<div style='' id='main_print'>
<?php
if(isset($_SESSION['section']))
{
echo <<<_END
<div id='add_print_div_1' >
<h1 style='text-align:centre;'>Print Statement</h1>
<form method='post' name='add_print'>
<div>
	<p>Do you wish to use any of the declared variables<br />
	<input type="radio" id='use_variables_yes' name='use_variables' value='1' onChange='activateDeactivate();'/>Yes<input type="radio" id='use_variables_yes' name='use_variables' value='0' onChange='activateDeactivate();'/>No	</p>
	<section id='vars'>Choose variables to use in print statement <br />
_END;
	
	$con=connect();
	$sectionName=$_SESSION['section'];
	$getSections="SELECT variableName,variableType FROM variable WHERE sectionName='$sectionName' or variableScope='global'";
	$result=mysql_query($getSections) or die(mysql_error());
	while($section=mysql_fetch_array($result))
	{
		$sect=$section["variableName"];
		$type=$section["variableType"];
		print("<input type='checkbox' value='$type' name='".$section["variableName"]."' id='".$section["variableName"]."' onClick='getValue(\"$sect\");' />".$section["variableName"]."  ");
	}
echo <<<_END
	<p style='color:blue;'>Use the following specifiers to include the value of a variable in a print statement</p>
	<p>
	<div id='specifiers' style='background-color:#CCC;'>
	<table id="t_specifiers" border=1>
	<tr><th>Variable chosen</th><th>Specifier to use</th></tr>
	</table>
	<br />
	For example: My age is %1 will be equivalent to "My age is 17" if the value of
	Variable age=17<br />
	</p>
	</div></section>
	<p>To add a new line in your print, add <span style='color:red;'>"\\n"</span> to the message. You can also use <span  style='color:red;'>"\\t"</span> to add a tabular space</p>
	Enter the display message<br />
	<textarea name='print_message' id='print_message' placeholder='Enter the message here' onChange='generatePrintf();' cols='80'rows='3' required></textarea><br /> 
_END;
require_once("add_to.php");
echo <<<_END
	<input type='submit' value='Add Print Statement'/> &nbsp &nbsp &nbsp &nbsp &nbsp
	<input type='reset' value='clear'></div> 
	<div style='padding:5%;'>
	<input type='hidden' name='section' value='$sectionName'/>
	<input type='hidden' id='generated_code' name='generated_code'>
	<textarea cols='50' rows='10' id='generated_code_view' name='generated_code_view' disabled></textarea>
	</div>
</form>
_END;
}
else{
	
	echo "No section has been is being worked on ". $_SESSION['section'];
}
?>
<?php
if(isset($_POST['print_message']))
{
	$add_to=$_POST['add_to'];
	$con=connect();
	$print="\n".$_POST['generated_code'];
	$section=$_SESSION['section'];
	if($add_to=='section'){
	if(UpdateSection($print,$section))
	{
		echo "<script>alert('successful add')</script>";
	}
	}
	else if($add_to=='decision')
	{
		if(isset($_SESSION['if']))
		{
			$_SESSION['if']=$_SESSION['if'].$print;
			echo $_SESSION['if'];
		}
		else{
			Location("Header:Add Condition.php");
		}
	}
	else if($add_to=='repetition')
	{
		if(isset($_SESSION['loop']))
		{
			$_SESSION['loop']=$_SESSION['loop'].$print;
		}
		else{
			//Location("Header:Add Condition.php");
		}
	}
	else if($add_to=='switch')
	{
		if(isset($_SESSION['switch_case']))
		{
			$_SESSION['switch_case']=$_SESSION['switch_case'].$print;
			echo "<script>window.location.href='Add Switch.php'</script> ";
		}
		else{
			echo "<script>alert(\"No case has been selected\")</script> ";
			echo "Click <a href='Add Switch.php'>here</a> to choose a case";
		}
	}
}
?>
</div>
<div id='add_print_div_2' class='code_preview' >
<?php
require_once('code_preview.php');
?>
</div>
</div>
<?php
 require_once('footer.php');
?>
</body>
</html>