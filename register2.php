<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="CSS/layout.css">
	<link rel="stylesheet" type="text/css" href="CSS/menu.css">
	<script>
	 function $(id) {
	     return document.getElementById(id)
	     }	      
	 </script>

</head>
<body>
<div id="Holder">
<div id="Header"></div>
<div id="NavBar">
	<nav>
		<ul>
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</nav>
</div>
<div id="Content">
	<div id="PageHeading">
		<h1>Sign up!</h1>
	</div>
	<div id="ContentLeft">
		<h2>ABOUT THE SYSTEM</h2><br />
		<h5>This system will help you generate code in the C language. You will be able to upload problems and solve any uploaded problems 
		by others.<br /> Your solutions will be marked by top class techers and you will be able to download the generated C code and run it
		in a compiler<a href=""></a></h5>
	</div>
<?php 
function mysql_fix_string($string) {
	if (get_magic_quotes_gpc()) 
		$string = stripslashes($string); 
    return mysql_real_escape_string($string);
	 } 
if(isset($_POST['Username'])){
$Name=(isset($_POST['Name'])) ? $_POST['Name'] : '' ;
$DateOfBirth=(isset($_POST['Date'])) ? $_POST['Date'] : '' ;
$Username=(isset($_POST['Username'])) ? $_POST['Username'] : '' ;
$IdentificationNumber=(isset($_POST['IdNo'])) ? $_POST['IdNo'] : '' ;
$Category=(isset($_POST['Category'])) ? $_POST['Category'] : '' ;
$Password=(isset($_POST['password1'])) ? $_POST['password1'] : '' ;
$ConfirmPassword=(isset($_POST['password2'])) ? $_POST['password2'] : '' ;
$code1="$5%,!";
$code2="#?%2#";

$myCode=md5("$code1$Username$Password$code2");


$con=@mysql_connect("localhost", "root", "");
mysql_select_db("c",$con) or die(mysql_error());

$query1="SELECT Username FROM newaccount WHERE Username='$Username'";

$result1 = mysql_query($query1);

$user = mysql_fetch_array($result1);
//echo $user['Username'].'<br />';
$query2 = "SELECT IdentificationNumber FROM newaccount WHERE IdentificationNumber='$IdentificationNumber'";

$result2 = mysql_query($query2);
if(mysql_num_rows($result1)){
//$Id = mysql_fetch_array($result2) or die(mysql_error());
//echo $Id['IdentificationNumber'].'<br />';
$_SESSION['UsernameError']  = "<span id='erro' name='spans' class='eor'>The username '$Username' is already taken. Try a different one</span>";
$error1=$_SESSION['UsernameError'];
}
else{
	$error1='';
}
if(mysql_num_rows($result2)){
$_SESSION['IdNoError'] = "<span id='erro' name='spans' class='eor'>The Student Number '$IdentificationNumber' already exists.</span>";
$error2=$_SESSION['IdNoError'];
}
else{
	$error2='';
}

session_start();
//$_SESSION['UsernameError'] = (isset($user)) ? $errorUsername : '' ;
//$_SESSION['IdNoError'] = (isset($Id)) ? $errorIdNo : '' ;


if (isset($_SESSION['UsernameError'])) {
		$Username='';
	} 
	
if(isset($_SESSION['IdNoError'])) {
	$IdentificationNumber='';
}

if(isset($_SESSION['IdNoError']) || isset($_SESSION['UsernameError'])){
	
echo <<<_END
<div id="ContentRight">
	<form method='post' action='register.php' name='RegisterForm' id='RegisterForm'>
<table>
<tr>
	<td>
	<h6>Name</h6>
	</td>
	<td><input type='text' name='Name' id='Name' required="required" class="StyleTxtField" value='$Name' >
	</td>
</tr>
<tr>
	<td>
	<h6>Date of Birth</h6>
	</td>
	<td>
	<input type='Date' name='Date' id='Date' class="StyleTxtField" value='$DateOfBirth' required="required"> 
	<i><font color="red" size="2em">*format; yyyy-mm-dd</font></i>
	</td>
</tr>
<tr>
	<td>
	<h6>Username</h6>
	</td>
	<td><input type='text' name='Username' id='Username' class="StyleTxtField" value="$Username" required="required" ><br />
$error1
	</td>
</tr>
<tr>
	<td>
	<h6>Student Number</h6>
	</td>
	<td>
	<input type='text' name='IdNo' id='IdNo' class="StyleTxtField" value="$IdentificationNumber" required="required" maxlength=30><br />
	$error2
	</td>
</tr>
<tr>
	<td>
	<h6>Category</h6>
	</td>
	<td>
	<select name="Category" class="StyleTxtField">
	<option>Student</option>
	</select>
	</td>
</tr>
<tr>
	<td>
	<h6>Password</h6>
	</td>
	<td>
	<input type='password' name='password1' id='passwordcode1' class="StyleTxtField" required="required"><br />
	<span id="err" name="spans" class="error">The passwords do not match</span>
	</td>
</tr>
	<tr>
	<td>
	<h6>Confirm Password</h6>
	</td>
	<td><input type='password' name='password2' id='passwordcode2' class="StyleTxtField" required="required" onChange="testMatch();">
	</td>
</tr>
</table>
	<input type='submit' value='Create Account' onSubmit="testAllFields();" class='button'/> &nbsp&nbsp&nbsp&nbsp <input type='reset' value='Clear form' class='button'/>
</form>
</div>
_END;
unset($_SESSION['username']);
unset($_SESSION['IdNo']);
}

else if (!empty($Name) && !empty($DateOfBirth) && !empty($Username) && !empty($IdentificationNumber) && !empty($Category) && !empty($myCode)) {
	$a="INSERT INTO newaccount(Name,DateOfBirth,Username,IdentificationNumber,Category,Password) VALUES('$Name','$DateOfBirth','$Username','$IdentificationNumber','$Category','$myCode')";
	$resource1= mysql_query("$a",$con) or die(mysql_error());

	if($resource1)
	{
		echo "Thank you $Name for creating an account. <br /><br /> <a href='login.php'>Continue to login</a>";
	}		
}
}
else{

echo <<<_END
<div id="ContentRight">
	<form method='post' action='register.php' name='RegisterForm' id='RegisterForm'>
<table>
<tr>
	<td>
	<h6>Name</h6>
	</td>
	<td><input type='text' name='Name' id='Name' required="required" class="StyleTxtField"  >
	</td>
</tr>
<tr>
	<td>
	<h6>Date of Birth</h6>
	</td>
	<td><input type='Date' name='Date' id='Date' class="StyleTxtField"  required="required"><i><font color="red" size="3em">*format; yyyy-mm-dd</font></i>
	</td>
</tr>
<tr>
	<td>
	<h6>Username</h6>
	</td>
	<td><input type='text' name='Username' id='Username' class="StyleTxtField"  required="required" >
	</td>
</tr>
<tr>
	<td>
	<h6>Student Number</h6>
	</td>
	<td>
	<input type='text' name='IdNo' id='IdNo' class="StyleTxtField"  required="required" maxlength=30>
	</td>
</tr>
<tr>
	<td>
	<h6>Category</h6>
	</td>
	<td>
	<select name="Category" class="StyleTxtField">
	<option>Student</option>
	</select>
	</td>
</tr>
<tr>
	<td>
	<h6>Password</h6>
	</td>
	<td>
	<input type='password' name='password1' id='passwordcode1' class="StyleTxtField" required="required"><br />
	<span id="err" name="spans" class="error">The passwords do not match</span></td>
</tr>
	<tr>
	<td>
	<h6>Confirm Password</h6>
	</td>
	<td><input type='password' name='password2' id='passwordcode2' class="StyleTxtField" required="required" onChange="testMatch();">
	</td>
</tr>
</table>
	<input type='submit' value='Create Account' onSubmit="testAllFields();" class='button'/> &nbsp&nbsp&nbsp&nbsp <input type='reset' value='Clear form' class='button'/>
</form>
</div>
_END;
}
?>
<div id="Content"></div>
</div>
<div id="Footer"></div>
</div>
<script>

function testMatch(){
		var code1=document.getElementById("passwordcode1").value;
		var code2=document.getElementById("passwordcode2").value;
		if(!(code1==code2)){			
			document.getElementById("passwordcode1").value = '';
			document.getElementById("passwordcode2").value = '';
			$("err").style.visibility="visible";
		}
		else{
			$("err").style.visibility="hidden";
		}
	}

/*function UpdateForm()
{
	var file=$('Username').value;
	
	if(file)
	{
		$('RegisterForm').submit();
	}
}
$('Username').addEventListener("change",UpdateForm);

function UpdateForm2()
{
	var file=$('IdNo').value;
	
	if(file)
	{
		$('RegisterForm').submit();
	}
}
$('IdNo').addEventListener("change",UpdateForm2);*/

</script>
</body>
</html>
