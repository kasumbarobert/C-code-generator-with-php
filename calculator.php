
<style>
table tr td input{
	font-size:1em;
	size:100;
	}
</style>

<fieldset style='width:95%; font-style:bold;' id='calculator'>
<div style='float:left; width:62%;'>
<textarea cols='40' rows='8' id="expression" name="expression" ></textarea></div>
<div id="numbers" style='width:38%; float:right;'>
<table>
<tr>
<td><input type='button' value=' 1 ' onClick='updateExp("1");'/></td>
<td><input type='button' value=' 2 ' onClick='updateExp("2");'/></td>
<td><input type='button' value=' 3 ' onClick='updateExp("3");'/></td>
<td><input type='button' value=' 4 ' onClick='updateExp("4");'/></td>
</tr> 
<tr>
<td><input type='button' value=' 5 ' onClick='updateExp("5");'/> </td>
<td><input type='button' value=' 6 ' onClick='updateExp("6");'/></td>
<td><input type='button' value=' 7 ' onClick='updateExp("7");'/></td>
<td><input type='button' value=' 8 ' onClick='updateExp("8");'/></td>
</tr>
<tr>
<td><input type='button' value=' 9 ' onClick='updateExp("9");'/></td>
<td><input type='button' value=' 0 ' onClick='updateExp("0");'/></td>
<td><input type='button' value=' * ' style="width:2.25em;" onClick='updateExp("*");'/></td>
<td><input type='button' value=' + ' onClick='updateExp("+");'/></td>
</tr>
<tr>
<td><input type='button' value=' .' style="width:2.25em;" onClick='updateExp(".");'/></td>
<td><input type='button' value='/' style="width:2.25em;" onClick='updateExp("/");'/> 
<td><input type='button' value='-' style="width:2.3em;" onClick='updateExp("-");'/></td>
<td><input type='button' value='% ' style="width:2.3em;" onClick='updateExp("%");'/></td>
</tr>
<tr>
<td><input type='button' value=' ( ' style="width:2.25em;" onClick='updateExp("(");'/></td>
<td><input type='button' value=' ) ' style="width:2.25em;" onClick='updateExp(")");'/></td> 
<td><input type='button' value=' = '  onClick='updateExp("=");'/></td>
<td><input type='button' value='DEL' onClick='del();' style='color:red;font-size:0.9em;'/></td>
</tr>
</table>
</div>
<div>
<p id='operators'>
<span style='font-size:1em; color: #f77;'>Conditional Operators you can use<span><br />
<input type='button' value='Less than'  onClick='updateExp("<");'/>
<input type='button' value='Greater than'  onClick='updateExp(">");'/>
<input type='button' value='Equivalent to' onClick='updateExp("==");'/>
<input type='button' value='Greater or equal to' onClick='updateExp(">=");'/>
<input type='button' value='Less or equal to' onClick='updateExp("<=");'/>
<input type='button' value='Not equal' onClick='updateExp("!=");'/> 
<input type='button' value='AND' onClick='updateExp("&&");'/>
<input type='button' value='OR' onClick='updateExp("||");'/>
<input type='reset' value='CLEAR' style='color:red;'/>
</p>
</div>
</fieldset>
<script>
function updateExp(value)
{
	$("expression").value+=value;
}
 function del()
 {
	 var stmtValue=$("expression").value;
	 $("expression").value=stmtValue.substr(0,stmtValue.length-1);
 }
</script>
