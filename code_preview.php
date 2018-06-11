<?php
echo "<h1 style='text-align:center;'>Preview section</h1>";

echo <<<_END
<p style='font-size:1.2em;font-style:italic; color:red;'>This section enables you view the structures you are working on. You can choose the structure to preview from the drop down box</p>
<form id='wat_to_prev' method='post' action=''>
Choose what to preview
<select id='preview_value' name='preview_value'>
<option></option>
_END;
?>
<?php if(isset($_SESSION['section'])){echo "<option value='section'>Function ".$_SESSION['section']."</option>";}?>
<?php if(isset($_SESSION['loop'])){echo "<option value='loop'>Current Repetition Structure</option>";}?>
<?php if(isset($_SESSION['if'])){echo "<option value='if'>Current IF/Else Statement</option>";}?>
<?php if(isset($_SESSION['switch_case'])){echo "<option value='switch_case'>Current case Structure</option>";}?>
<?php if(isset($_SESSION['switch'])){echo "<option value='switch'>Current Switch Statement</option>";}?>

</select>
</form>

<?php
echo <<<_END
<script>
	function wat_to_prev(){
		$("wat_to_prev").submit();
	}
	$("preview_value").addEventListener("change",wat_to_prev);
</script>
_END;
	
if(isset($_POST['preview_value']))
{
	$print_wat=$_POST['preview_value'];
	
	if($print_wat=='section')
	{
		printCode(getSection());
	}
	else if($print_wat=='if')
	{
		if(isset($_SESSION['if'])){
			printCode($_SESSION['if']);
		}
		else{
			
			echo "There is no current If structure being worked on";
		}
	}
	else if($print_wat=='loop')
	{
		if(isset($_SESSION['loop'])){
			printCode($_SESSION['loop']);
		}
		else{
			echo "There is no current loop structure being worked on";
		}
	}
	else if($print_wat=='switch')
	{
		if(isset($_SESSION['switch'])){
			printCode($_SESSION['switch']);
		}
		else{
			echo "There is no current switch being worked on";
		}
	}
	else if($print_wat=='switch_case')
	{
		if(isset($_SESSION['switch_case'])){
			printCode($_SESSION['switch_case']);
		}
		else{
			echo "There is no case structure being worked on";
		}
	}
}
else{
	
	printCode(getSection());
}
?>