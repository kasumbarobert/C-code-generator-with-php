<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Create new Account</title><!--Title of the page -->
<script src="accountvalidations.js"></script>
<script type="text/javascript">
	function testMatch(){
		var code1=document.getElementById("passwordcode1").value;
		var code2=document.getElementById("passwordcode2").value;
		if(!(code1==code2)){
			alert("The passwords do not match");
		}
	}
	function testName()	{
		var name=document.getElementById('Name').value;
		var error=ValidateName(name);
				
		if(error != 1)
		{
			alert(error);
			return false;
		}
	}
	function testAllFields()
	{	
		testName();
	}
</script>
</head>
<style>
input, p{
	font-size:1.1em;
}
input[type='text']{
	
	background-color:#eea;
	border-radius:5px;
}
input[type='password']{
	
	background-color:#eea;
	border-radius:5px;
}
input.button{
	border-radius:4px;
	color:blue;
	background-color:#aaf;
	font-size:0.6em;
	text
}
a:hover{
	text-decoration:underline;
	color:red;
}
</style>
<body>
<fieldset style="font-size:2em; margin-left:100px; position:absolute; background-color: #efefef; left:300px; top: 100px; width: 450px; height: 300px; margin: 10px; border-style:solid; border-width:2px; border-color:#000000; border-radius:10px;">

<legend>Please enter your details</legend>
<form method='post' action='account.php'>
<table>
<tr><td>Name</td><td><input type='text' name='Name' id='Name' required="required" onChange="testName();"></td></tr>
<tr><td>Date of Birth</td><td><input type='text' name='Date' id='Date' required="required"><i><font color="red" size="2em">*format; yyyy-mm-dd</font></i></td></tr>
<tr><td>Username</td><td><input type='text' name='Username' id='Username' required="required"></td></tr>
<tr><td>Student Number</td><td><input type='text' name='IdNo' id='IdNo' required="required" maxlength=30></td></tr>
<tr><td>Category</td><td>
<select name="Category">
<option>Student</option>
</select></td></tr>
<tr><td>Password</td><td><input type='password' name='password1' id='passwordcode1' required="required"></td></tr>
<tr><td>Confirm Password</td><td><input type='password' name='password2' id='passwordcode2' required="required" onChange="testMatch();"></td></tr>
</table>
<input type='submit' value='Create Account' onSubmit="testAllFields();" class='button'/> &nbsp&nbsp&nbsp&nbsp <input type='reset' value='Clear form' class='button'/>
</form>

</fieldset>
</body>
</html>