<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $APPLICATION;
$page = $APPLICATION->GetCurPage();
echo $page;
/*
$idr=array(

);
foreach($idr as $id){

		global $USER_FIELD_MANAGER;
		//lead
		$crmlead = new CCrmLead(false);
		$ll = $crmlead->GetByID($id);
		$araDlT=explode(' ',$ll['DATE_CREATE']);

		if($araDlT[0] and $araDlT[1]){
			$timeNumarl=explode(':',$araDlT[1]);
			if($timeNumarl[0] and $timeNumarl[1]){
				$timeNuml=floatval($timeNumarl[0].''.$timeNumarl[1]);
				$timeup=$USER_FIELD_MANAGER->Update('CRM_LEAD',$id,array('UF_CRM_1495375826' => $timeNuml));
			}
			$dateup=$USER_FIELD_MANAGER->Update('CRM_LEAD',$id,array('UF_CRM_1495375889' => $araDlT[0]));
		}
}

$od='2017-05-21 21:56:23';
$arstrod=explode(' ',$od);
if($arstrod[0] and $arstrod[1]){
	$timear=explode(':',$arstrod[1]);
	if($timear[0] and $timear[1]){
		$timeNum=floatval($timear[0].''.$timear[1]);
		//$timeup=$USER_FIELD_MANAGER->Update('CRM_LEAD',483241,array('UF_CRM_1495454163' => $timeNum));
	}
	$datar=explode('-',$arstrod[0]);
	if($datar[0] and $datar[1] and $datar[2]){
		$datestr=$datar[1].'/'.$datar[2].'/'.$datar[0];
		//$dateup=$USER_FIELD_MANAGER->Update('CRM_LEAD',483241,array('UF_CRM_1495454109' => $datestr));
	}
}
echo'<br>';
echo $datestr.' '.$timeNum;
*/

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
