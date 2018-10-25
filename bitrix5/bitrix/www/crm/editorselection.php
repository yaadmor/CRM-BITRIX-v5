<style>
	#editorSelector{
	position: absolute;
    top: 241px;
    left: 383px
	}
	#ht{

	}
</style>
<form id="editorSelector" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
<span id="ht">Defualt Mode Editor</span><br>
	<Input id="o1" type = 'Radio' Name ='option' value= 'on' >on
	<Input id="o2" type = 'Radio' Name ='option' value= 'off'>off
	<input type="submit" name="submit">
</form>
<?php
if(isset($_POST['submit'])){
$selected_radio = $_POST['option'];
	if($selected_radio==='on'){
		global $USER;
		$arGroups = $USER->GetUserGroupArray();
		$arGroups[] = 22;
		$USER->SetUserGroupArray($arGroups);
?>
<script>
document.getElementById('o1').setAttribute('checked', 'checked');
</script>
<?php
}else if($selected_radio==='off'){
		global $USER;
		$arGroups = $USER->GetUserGroupArray();
		$dGroup = array(22);
		$arGroups = array_diff($arGroups, $dGroup);
       $USER->SetUserGroupArray($arGroups);
?>
<script>
document.getElementById('o2').setAttribute('checked', 'checked');
</script>
<?php
}
}