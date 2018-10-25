<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("CURRENCY TRANSFER RATES");
global $USER_FIELD_MANAGER;
$curTypes=array('Euro-Dollar','Euro-Shekel','Euro-Pound','Dollar-Shekel','Dollar-Pound','Shekel-Pound');
if(isset($_GET["Save"]) and !empty($_GET["Save"])){
	foreach($curTypes as $ct){
		$case=str_replace("-","",$ct);
		if( $ct=="Euro-Dollar" and isset($_GET[$case]) ){
			$eudo=floatval($_GET[$case]);
			$up1=$USER_FIELD_MANAGER->Update('CURA_EURO_JS',1,array('UF_CURA_DOLLAR' =>$eudo));
		}elseif($ct=='Euro-Shekel' and isset($_GET[$case])){
			$eushe=floatval($_GET[$case]);
			$up1=$USER_FIELD_MANAGER->Update('CURA_EURO_JS',1,array('UF_CURA_SHEKEL' =>$eushe));
		}elseif($ct=='Euro-Pound' and isset($_GET[$case])){
			$eupo=floatval($_GET[$case]);
			$up1=$USER_FIELD_MANAGER->Update('CURA_EURO_JS',1,array('UF_CURA_POUND' =>$eupo));
		}elseif($ct=='Dollar-Shekel' and isset($_GET[$case])){
			$dosh=floatval($_GET[$case]);
			$up1=$USER_FIELD_MANAGER->Update('CURA_DOLLAR_JS',1,array('UF_CURA_SHEKEL' =>$dosh));
		}elseif($ct=='Dollar-Pound' and isset($_GET[$case])){
			$dope=floatval($_GET[$case]);
			$up1=$USER_FIELD_MANAGER->Update('CURA_DOLLAR_JS',1,array('UF_CURA_POUND' =>$dope));
		}elseif($ct=='Shekel-Pound' and isset($_GET[$case])){
			$shope=floatval($_GET[$case]);
			$up1=$USER_FIELD_MANAGER->Update('CURA_SHEKEL_JS',1,array('UF_CURA_POUND' =>$shope)); 
		}


	}
	/*
echo'<pre>';
print_r($_GET);
echo'</pre>';
	foreach($_GET as $k=>$gg){
		echo $k.'='.$gg.'<br>';
	}
*/
}
?>
<form id="exformCH" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" novalidate>
<table id="exchangeRat3" class="" style="border:1px solid black;">
	<tr style="border:1px solid black;" class="ratesTR">
		<th class="ratesTH">
			Currencies 
		</th>
		<th class="ratesTH">
			Exchange Rate 
		</th>
	</tr>

	<?php  

		foreach($curTypes as $ct){
	?>
			<tr class="ratesTR">
				<td class="ratesTD">
					<?php echo $ct; ?> 
				</td>
				<td class="exrateTD">

<?php
			if($ct=='Euro-Dollar'){
				$er=$USER_FIELD_MANAGER->GetUserFieldValue('CURA_EURO_JS', 'UF_CURA_DOLLAR', 1); 
			}elseif($ct=='Euro-Shekel'){
				$er=$USER_FIELD_MANAGER->GetUserFieldValue('CURA_EURO_JS', 'UF_CURA_SHEKEL', 1); 
			}elseif($ct=='Euro-Pound'){
				$er=$USER_FIELD_MANAGER->GetUserFieldValue('CURA_EURO_JS', 'UF_CURA_POUND', 1); 
			}elseif($ct=='Dollar-Shekel'){
				$er=$USER_FIELD_MANAGER->GetUserFieldValue('CURA_DOLLAR_JS', 'UF_CURA_SHEKEL', 1); 
			}elseif($ct=='Dollar-Pound'){
				$er=$USER_FIELD_MANAGER->GetUserFieldValue('CURA_DOLLAR_JS', 'UF_CURA_POUND', 1); 
			}elseif($ct=='Shekel-Pound'){
				$er=$USER_FIELD_MANAGER->GetUserFieldValue('CURA_SHEKEL_JS', 'UF_CURA_POUND', 1); 
			}
			echo '<span class="spanEx" id="'.$ct.'_span">'.$er.'</span>';
?>
<input class="innerEx" style="display:none;" id="<?php echo $ct; ?>" value="<?php echo $er; ?>" type="number" name="<?php echo str_replace("-","",$ct); ?>"/>
				</td>

	</tr>

	<?php
		}
   ?>
	<tr>
		<td>
			<input type="submit"class="butRates"name="Save"value="Save" id="changeRates">
		</td>
		<td>
			<button class="butRates" id="restoreRates">Restore</button>
		</td>
	</tr>
</table>


</form>
<!--
<iframe src="https://usalws.org/crm/curaJS.php" scrolling="no" height="215px" width="300px" ></iframe>
-->
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<script>
BX.ready(function() {
	$('.spanEx').on('dblclick',function(){
		$(this).css('display','none');
		$(this).next().css('display','block');
	});
	$('.innerEx').on('blur',function(){
		$(this).css('display','none');
		$(this).prev().css('display','block');
		var vala=$(this).val();
		$(this).prev().text(vala);
	});
	$('#restoreRates').on('click',function(){
		location.reload();
	});
});
</script>