<?php
function ValidateName($field)//function to validate the name input
{
	$message='';
	if($field=='')//tests for empty field 
	{
		return "The name is missing <br />";
	}
	if(preg_match("/^[a-z]/",$field))//tests whether the name starts with a lower case letter
	{
		$message=$message."A name should start with an upper case letter. <br />";
	}
	
	if(preg_match("/[\d]/",$field))//tests for occurrence of a digit in the string
	{
		$message=$message."The name cannot contain a number. ";
	}
	if(preg_match("/[\W]/",$field)&& !preg_match("/\s/",$field))//checks whether the string contains non-alphabetic characters which is not a "space"
	{
		$message=$message."A name cannot contain non-alphabetic character(s).<br />";
	}
	if(!preg_match("/^[A-Z][a-zA-Z]+\s[A-Z][a-zA-Z]+/",$field))//checks if there are atleast two names each starting with a capital letter
	{
		$message=$message."There should be atleast two or more names: each starting with a capital letter. Ensure there are no more extra spaces between names<br />";
	}
	if($message=='')//returns appropriate error message(s)
	{
		return '';
	}
	else{
		return $message;
	}
}
function ValidateDate($field)//function to validate the date of birth input
{
     $message='';
	if($field=='')//tests for empty field 
	{
		return "The date is missing <br />";
	}
	if($message=='')//returns appropriate error message(s)
	{
		return '';
	}
	else{
		return $message;
	}
}
function ValidateUsername($field)//function to validate the username input
{
	$message='';
	if($field=='')//tests for empty field 
	{
		return "The Username is missing <br />";
	}
	if($message=='')//returns appropriate error message(s)
	{
		return '';
	}
	else{
		return $message;
	}
}
function ValidateIdentification($field)//function to validate the identification number input
{
	$message='';
	if($field=='')//tests for empty field 
	{
		return "The password is missing <br />";
	}
	if($message=='')//returns appropriate error message(s)
	{
		return '';
	}
	else{
		return $message;
	}
}
function ValidatePassword($field){
	//the password should have more than 6 characters, at least one number, letter and non-word character 
	$message='';
	if($field=='')//tests for empty field 
	{
		return "The password is missing <br />";
	}
	}
	if(!preg_match("/[\W]/",$field)&& !preg_match("/\s/",$field))
	{
		$message=$message."A password should contain atleast one non-word characters e.g %,&,@,#,?,/,\,],[. <br />";
	}
	if(field.length < 6)//tests if length of secret code contains atleast six characters
	{
		message+="The secret code should contain atleast 6 characters. ";
	}
	if(!(/[a-zA-Z]/.test(field)))//tests if secret code doesn't contain an alphabetic character
	{
		 message+="The secret code should contain atleast an alpahabetic letter. ";
	}
	if(!(/\d/.test(field)))//tests if secret code doesn't contain a digit
	{
		 message+="The secret code should contain atleast a number. ";
	}
	if(!(/\W/.test(field)))//checks whether the string doesn't contain non-alphabetic characters{
		 message+="The secret code should contain atleast one non-word characters e.g %,&,@,#,?,/,\,],[. ";
	}
	if($message=='')//returns appropriate error message(s)
	{
		return '';
	}
	else{
		return $message;
	}
}
?>