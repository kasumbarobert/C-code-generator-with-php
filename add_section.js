
var functionName;
var returnType;
var AddParameters=false;
var functionHeader;
var number_of_parameters=1;
var parameter_name= new Array();
var parameter_type=new Array();
var function_created;
var i=1;

function $(id)
	{
		return document.getElementById(id);
	}//function to replace the long document.getElementById with $;

function store_parameters()
{
	var i=0;
	var arg;
	var type;
	while(i<number_of_parameters)
	{
		i++;
		arg=$("p_name"+i).value;
		type=$("p_type"+i).value;
		parameter_name[i]=arg;
		parameter_type[i]=type;
	}
	functionName=$("sectionName").value;
	returnType=$("returnType").value;
	createFunctionHeader();
}

function createFunctionHeader()
{	
	var header="(";
	var j=0;
	var datatype;
	var arg_name;
	var arg;
	if(!AddParameters)
	{
		function_created= returnType+" "+functionName+" (){\n"; 
	}
	else {
		
		function_created= returnType+" "+functionName+" ";
		while(j<number_of_parameters)
		{
			j++;
			arg_name=parameter_name[j];
			datatype=parameter_type[j];
			if(j==number_of_parameters){
			header+=datatype+' '+arg_name+" ";
			}
			else{
				header+=datatype+' '+arg_name+" ,";
			}
		}

		function_created+=header+=") {\n";
	}
	$("section_header").value=function_created; 
	if(AddParameters)
	{
		$("number_of_args").value=number_of_parameters;
	}
	else{
		$("number_of_args").value=0;
	}
}



