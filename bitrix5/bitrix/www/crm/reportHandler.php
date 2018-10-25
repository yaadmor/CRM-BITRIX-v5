<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
if(isset($_GET['FILL']) and isset($_GET['co']) and intval($_GET['co'])>99){

	//print_r($_GET);

		$co=intval($_GET['co']);
		$limit=$co+100;
		$csvar=array();
		$arFilter = $_GET;
		unset($arFilter['FILL']);
		unset($arFilter['co']);
		$index=0;
		if($resCon = CCrmLead::GetList(Array('DATE_CREATE' => 'DESC'),$arFilter)){
			while($arCon = $resCon->GetNext() and $co<$limit){	
				//echo $arCon['ID'];
				if($index<$co){
					$index++;
				}else{
					$csvar[]=$arCon;
					$co++;
					$index++;
				}
			}
		}
			$f  =   fopen('report.csv', 'a');
			foreach ($csvar as $fields) {
				fputcsv($f, $fields);
			}

			fclose($f);
	if(intval($co)!=intval($limit)){
		echo 'report.csvdone12345';
	}

}
?>
Text here....

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>