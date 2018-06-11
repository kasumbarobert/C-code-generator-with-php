function ValidateName(fields)//function to validate the name input
{
	var message='';
	if(field=='')//tests for empty field 
	{
		return "Please enter the name";
	}
	
	if(/^[a-z]/.test(field))//tests whether the name starts with a lower case letter
	{
		message+="A name should start with an upper case letter. ";
	}
	
	if(/[\d]/.test(field))//tests for occurrence of a digit in the string
	{
		message+="The name cannot contain a number.";
	}
	if((/[\W]/.test(field))&& !(/\s/.test(field)))//checks if the name contains a non-alphabetical character which is not a "space"
	{
		message+="A name cannot contain non-alphabetic character(s). ";
	}
	if(!(/^[A-Z][a-zA-Z]+\s[A-Z][a-zA-Z]+/.test(field)))//checks if there are atleast two names each starting with a capital letter
	{//if a single name is input or if the name starts with a lower case letter, the name will be rejected
		message+="There should be atleast two or more names: each starting with a capital letter.";
	}
	if(message=='')//returns appropriate error message(s)
	{
		return 1;
	}
	else{
		return message;
	}
}