<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Custom report");
?><div  class="well" id="whell"></div>
<div style="position:absolute;top:20%;left:10px;" class="spiner" id="spiner"></div>
<?

if(isset($_GET['done'])){
	header("Location: https://usalws.org/crm/report.csv");
	unlink('https://usalws.org/crm/report.csv');
}
?>

<form method="POST">
CREATED DATE<br>


													<div class="bx-filter-alignment">
														<div class=" bx-filter-box-sizing"><div class="bx-user-field-wrap"><div class="fields integer" id="main_UF_CRM_1495454109"><div class="fields datetime">
<input type="text" name="DATE_CREATE_from" value="" size="10"  class="filter-date-interval"><img src="/bitrix/js/main/core/images/calendar-icon.gif" alt="Select date in calendar" class="calendar-icon" onclick="BX.calendar({node:this, field:'DATE_CREATE_from', form: 'filter_CRM_LEAD_LIST_V12', bTime: false, currentTime: '1516794354', bHideTime: false});" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/><span class="date-interval-hellip">&hellip;</span><input type="text" name="DATE_CREATE_to" value="" size="10"  class="filter-date-interval">
<img src="/bitrix/js/main/core/images/calendar-icon.gif" alt="Select date in calendar" class="calendar-icon" onclick="BX.calendar({node:this, field:'DATE_CREATE_to', form: 'filter_CRM_LEAD_LIST_V12', bTime: false, currentTime: '1516794354', bHideTime: false});" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/></div></div></div></div>
													</div>
<br>
												Original Created Date:

													<div class="bx-filter-alignment">
														<div class=" bx-filter-box-sizing"><div class="bx-user-field-wrap"><div class="fields integer" id="main_UF_CRM_1495454109"><div class="fields datetime">
<input type="text" name="UF_CRM_1495454109_from" value="" size="10"  class="filter-date-interval"><img src="/bitrix/js/main/core/images/calendar-icon.gif" alt="Select date in calendar" class="calendar-icon" onclick="BX.calendar({node:this, field:'UF_CRM_1495454109_from', form: 'filter_CRM_LEAD_LIST_V12', bTime: false, currentTime: '1516794354', bHideTime: false});" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/><span class="date-interval-hellip">&hellip;</span><input type="text" name="UF_CRM_1495454109_to" value="" size="10"  class="filter-date-interval">
<img src="/bitrix/js/main/core/images/calendar-icon.gif" alt="Select date in calendar" class="calendar-icon" onclick="BX.calendar({node:this, field:'UF_CRM_1495454109_to', form: 'filter_CRM_LEAD_LIST_V12', bTime: false, currentTime: '1516794354', bHideTime: false});" onmouseover="BX.addClass(this, 'calendar-icon-hover');" onmouseout="BX.removeClass(this, 'calendar-icon-hover');" border="0"/>
</div></div></div></div>
							<br>Source URL:

													<div class="bx-filter-alignment">
														<div class=" bx-filter-box-sizing"><div class="bx-user-field-wrap"><div class="fields string" id="main_UF_CRM_1502880965"><div class="fields string"><input type="text" name="UF_CRM_1502880965" value="" size="20" class="fields string"></div></div></div></div>
													</div>

<br>IP COUNTRY
<div class="fields string" id="main_UF_CRM_1449131669">
<input type="radio" id="ex1449131669a" name="ex1449131669" value="match">Match
<input type="radio" id="ex1449131669a" name="ex1449131669" value="Exclude">Exclode
<div class="fields string"><input type="text" name="UF_CRM_1449131669" value="" size="20" class="fields string"></div></div>	
<br> <input type="submit" value="submit" name="submit" id="submit">
</form>
<hr>

<?php

	if(isset($_POST['submit'])){
		//print_r($_POST);
		$sourcedic=array(
			'12'=>'talsor26',
			'13'=>'Moked',
			'14'=>'phil15',
			'15'=>'Cyp801',
			'16'=>'Eyals'
		);
		$dic=array(
			'~UF_CRM_1449131669'=>'IP Country',
			'~UF_CRM_1449131682'=>'Marital Status',
			'~UF_CRM_1449131692'=>'Client ID',
			'~UF_CRM_1484911710'=>'Age',
			'~UF_CRM_1484911804'=>'Gender',
			'~UF_CRM_1484911973'=>'Income',
			'~UF_CRM_1484914403'=>'English Level',
			'~UF_CRM_1484914608'=>'Education Level',
			'~UF_CRM_1484914764'=>'Travel to The USA',
			'~UF_CRM_1495375826'=>'Time',
			'~UF_CRM_1495375889'=>'Date',
			'~UF_CRM_1495454109'=>'Original Created Date',
			'~UF_CRM_1500181612'=>'Martial Statuses',
			'~UF_CRM_1502880965'=>'Source URL',
			'~UF_CRM_1502894447'=>'Main Source',
			'~UF_CRM_1510049985'=>'Usalws pass'
			);
		foreach($_POST as $k=>$v){
			if(empty($v)){
				unset($_POST[$k]);
			}
		}
		unset($_POST['submit']);
		if(isset($_POST['ex1449131669']) and $_POST['ex1449131669']=='Exclude'){
	//mail('gabi@gobe-mark.com','on','success1');
	if(isset($_POST['UF_CRM_1449131669'])){
		//mail('gabi@gobe-mark.com','on','success2');
		if(strpos($_POST['UF_CRM_1449131669'], '|') !== false){
				$_POST=explode('|',$_POST['UF_CRM_1449131669']);
				$_POST['!='.'UF_CRM_1449131669'] = $fillarCi;
				unset($_POST['UF_CRM_1449131669']);
		}else{
			$_POST['!='.'UF_CRM_1449131669'] = $_POST['UF_CRM_1449131669'];
			unset($_POST['UF_CRM_1449131669']);
		}
	}
		}elseif(isset($_POST['ex1449131669'])){
			unset($_POST['UF_CRM_1449131669']);
		}
if(isset($_POST['UF_CRM_1495454109_from']) and !empty($_POST['UF_CRM_1495454109_from']) and isset($_POST['UF_CRM_1495454109_to']) and !empty($_POST['UF_CRM_1495454109_to'])){
	if($_POST['UF_CRM_1495454109_from']==$_POST['UF_CRM_1495454109_to']){
		$datex=date('m/d/Y',strtotime($_POST['UF_CRM_1495454109_to'] . "-1 days"));
		$_POST['UF_CRM_1495454109_from']=strval($datex);
		$_POST['UF_CRM_1495454109_to']=CCrmDateTimeHelper::SetMaxDayTime(strval($datex));
	}
}
if(isset($_POST['DATE_CREATE_from']) and !empty($_POST['DATE_CREATE_from']) and isset($_POST['DATE_CREATE_to']) and !empty($_POST['DATE_CREATE_to'])){
	if($_POST['DATE_CREATE_from']==$_POST['DATE_CREATE_to']){
		$datex=date('m/d/Y',strtotime($_POST['DATE_CREATE_to'] . "-1 days"));
		$_POST['DATE_CREATE_from']=strval($datex);
		$_POST['DATE_CREATE_to']=CCrmDateTimeHelper::SetMaxDayTime(strval($datex));
	}
}
				$arFilter = $_POST;
		foreach($arFilter as $k => $v){
			if (preg_match('/(.*)_from$/i'.BX_UTF_PCRE_MODIFIER, $k, $arMatch))
				{
					if(strlen($v) > 0)
					{
						$arFilter['>='.$arMatch[1]] = $v;
					}
					unset($arFilter[$k]);
				}
				elseif (preg_match('/(.*)_to$/i'.BX_UTF_PCRE_MODIFIER, $k, $arMatch))
				{
					if(strlen($v) > 0)
					{
						if (($arMatch[1] == 'DATE_CREATE' || $arMatch[1] == 'DATE_MODIFY') && !preg_match('/\d{1,2}:\d{1,2}(:\d{1,2})?$/'.BX_UTF_PCRE_MODIFIER, $v))
						{
							$v = CCrmDateTimeHelper::SetMaxDayTime($v);
						}
						$arFilter['<='.$arMatch[1]] = $v;
					}
					unset($arFilter[$k]);
				}elseif($k != '!=UF_CRM_1449131669'){
					$arFilter['%'.$k] = $v;
					unset($arFilter[$k]);
				}
		}
					$co=0;
				$csvar=array();
				if($resCon = CCrmLead::GetList(Array('DATE_CREATE' => 'DESC'),$arFilter)){
					while($arCon = $resCon->GetNext() and $co<100){	
						//echo $arCon['ID'];
						/*
						if($co==0){
							$flipped = array_flip($arCon);
							foreach($flipped as $key=>$flip){
								if(isset($dic[$flip])){
									$flipped[$key]=$dic[$flip];
								}
							}
							$csvar[]=$flipped;
						}
						*/
						$newar=array();
						foreach($arCon as $in=>$out){
							if(strpos($in, '~') !== false){
								if($in=='~SOURCE_ID'){
									if(isset($sourcedic[$out])){
										$newar[]=$sourcedic[$out];
									}else{
										$newar[]=$out;
									}
								}else{
									$newar[]=$out;
								}
							}
						}
						$csvar[]=$newar;
						$co++;
					}
				}
		if(!empty($csvar)){

			// stream
			//$f  =   fopen('php://output', 'a');
			$f  =   fopen('report.csv', 'w');
			foreach ($csvar as $fields) {
				fputcsv($f, $fields);
			}

			fclose($f);
			$arFilter['FILL']='fill';
			//$arFilter['co']='100';
			$get=http_build_query($arFilter);
			$url='https://usalws.org/crm/reportHandler.php?'.$get;
			?>
				<script>
					BX.ready(function() {
						var url='<?php echo $url; ?>';
						function sendHandle(num){
							$.ajax({
								url : url,
								type : 'GET',
								data : { co : num },
								success : function(json){
									//consloe.log(json);
									if(num==100){
										//sendHandle(200);
									}
									if(!json.includes("report.csvdone12345")){
										$('#whell').text('Loading..');
										$('#spiner').addClass('loaderTZ');
										sendHandle(parseInt(num)+100);

									}else{
										$('#spiner').removeClass('loaderTZ');
										$('#whell').html('<h2>done</h2> <br> <a href="https://usalws.org/crm/report.php?done=done">Download</a>');
										//window.location.href='https://usalws.org/crm/report.php?done=done';
									}
								}
							});
						}
						sendHandle(100);
					});
				</script>
			<?
			//header("Location: https://usalws.org/crm/report.csv");
			//unlink('https://usalws.org/crm/report.csv');
		}
	}


?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>