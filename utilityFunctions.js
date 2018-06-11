function $(id){
		return document.getElementById(id);
	}//function to replace the long document.getElementById with $;

function send_problem(id){
	$(id).submit();
}


function validate(id){
	var keywords = new Array('int','char','break','if','auto','double','struct','else','long','switch','case','enum',
			'register','typedef','extern','return','union','const','float','short','unsigned','continue','for','signed',
			'void','default','goto','sizeof','volatile','do','static','while','_Bool','_Complex','_Imaginary','inline',
			'restrict','string');
	var a = $(id).value;
	for (var i = 0; i < keywords.length; i++) {
		var b = keywords[i];
		if (a === b) {
			alert("\""+a+"\" is a reserved word, Choose a different name");
			$(id).value='';
			break;
		} 
		else if (a == "") {
			alert("No name was entered");
			$(id).value='';
			break;
		}
		else if (a.length > 30){
			alert("Variable names must not exceed 30 characters.");
			$(id).value='';
			break;
		}
		else if (/[^a-zA-Z0-9_]/.test(a)){
			alert("Only a-z, A-Z, 0-9 and _ allowed in variable names.");
			$(id).value='';
			break;
		}
		else if (/^[0-9_]/.test(a)){
			alert("Variable names can only begin with letters a-z and A-Z.");
			$(id).value='';
			break;
		}
	}
}