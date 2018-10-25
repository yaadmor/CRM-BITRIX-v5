<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("tester");
?><span>Defualt Editor</span><form id="editorSelector" action="<?php echo($_SERVER['PHP_SELF']); ?>" method="POST">
	<Input id="o1" type = 'Radio' Name ='option' value= 'on' >on
	<Input id="o2" type = 'Radio' Name ='option' value= 'off'>off
	<input type="submit" name="submit">
</form>
<?php
////////////////////////////////////
echo"<h1>test1 = </h1>";
//print_r($_POST);
echo'<br>end test<br>';
//////////////////////////////////
//if(isset($_POST['submit'])){
//$selected_radio = $_POST['option'];
//if($selected_radio==='on'){
		//global $USER;
		//$arGroups = $USER->GetUserGroupArray();
		//$arGroups[] = 22;
		//$USER->SetUserGroupArray($arGroups);
?>
<script>
document.getElementById('o1').setAttribute('checked', 'checked');
</script>
<?php
//}else if($selected_radio==='off'){
//		global $USER;
////		$arGroups = $USER->GetUserGroupArray();
//		$dGroup = array(22);
//		$arGroups = array_diff($arGroups, $dGroup);
//       $USER->SetUserGroupArray($arGroups);
?>
<script>
document.getElementById('o2').setAttribute('checked', 'checked');
</script>
<?php
//}
//}
#	var_dump($USER);
#	echo'<br>';
//print_r($USER->GetUserGroupArray());
//$cpm = CUtil::decodeURIComponent($_POST);
//print_r($cpm);
?>
<?php
echo '<br>';
/////////////////////////////////////////////////////////////////

$ca= new CrmExt();
/*
if($ca){
		$x=$ca->ccp(2755,127962,555);
	if($x){
		echo'<pre>';
		print_r($x);
		echo'</pre>';
	}else{
		echo'no';
	}
}else{
	echo'no';
}

echo'<br>data is:<br>';
$y=$ca->feu(131433);
echo'<pre>';
		print_r($y);
		echo'</pre>';
echo'<br>';
echo $y['UF_CRM_1449131692']['VALUE'];

$up=$ca->up2date(127111,184077);
echo'<pre>';
print_r($up);
echo'</pre>';

echo'<br>';
$str="{'error':'201','ID':'128459','error_message':'Lead has been added.','AUTH':'2c0838711421381c5d403dd23ec92876'}";
$tr=trim($str,"{}");
$ta=explode(",", $tr);
$tn=explode(":", $ta[1]);
$nst=(string)$tn[1];
$tr2=trim($nst,"'");
echo 'this is trim '.(int)$tr2;
echo'<br>';
$z=$ca->mailCheck('abc@abc.com');
echo'<pre>';
print_r($z);
echo'</pre>';

$num=10;
$gab=' your num is: '.$num;
mail('ggp1987@gmail.com', 'My Subject', $gab);

$rob=$ca->rob(131433);
echo'/////////////////';
echo'<pre>';
print_r($rob);

echo'</pre>';

echo'<br>';
$ex=4;
$arra=array('other'=>2);
if($ex) $arra['id']=$ex;
if(isset($ex)){
	echo $arra['id'];
	print_r($arra);
}
*/
/*
$xer=array(


);
foreach($xer as $x){
	$arr=explode(',',$x);
	$lid=(int)$arr[0];
	$mail=$arr[1];
	$p1=$arr[2];
	$p2=$arr[3];
	$y=$ca->WPre($lid,$mail,$p1,$p2);
	//echo "$p1<br>$p2<br>";
	//echo $x.'<br>';
	echo'finish';
}



//global $APPLICATION;
//$px=$APPLICATION->GetCurPage();
//echo $px;


$z=$ca->mailCheck('lsovatabua13@gmail.com','Lavenia Sovatabua');
echo'<pre>';
print_r($z);
echo'</pre>';
if(empty($z)){ echo 'empty'; }else{ echo 'full';}


$send=array(
"kristina_muradov_@outlook.com,Kristina Muradov",
"adanex_92@hotmail.com,Adan Exposito Serrano",
"Karkisantosh963@gmail.com,Prakash Khadka",
"Jayojha67@gmail.com,Jay Ojha",
"nibras.bmw@gmail.com,Nibras Alrubaye",
	"ggp1987@gmail.com,Gab piev"
);
foreach($send as $sen){
	$se=explode(',',$sen);
	//echo $se[0].' '.$se[1];
	$s=$ca->cPostMan($se[0],$se[1]);
	echo $se[0].' '.$s.'<br>';
}


//if($lid['STATUS_ID']=='CONVERTED'){
//	echo'<br>'.$lid['STATUS_ID'].'nica';
//}

global $USER;
echo'<pre>';
print_r($USER);
echo'</pre><br>';
//echo "[".$USER->GetID()."] (".$USER->GetLogin().") ".$USER->GetFullName();
$mail=$USER->GetEmail();
echo $mail.'><br>';
echo $USER->GetFullName()."<".$mail.">[".$USER->GetID()."]";
$id=$USER->GetID();
$filter = Array ("ID" => $id,); 
$cUser = new CUser; 
$sort_by = "ID";
$sort_ord = "ASC";

$dbUsers = $cUser->GetList($sort_by, $sort_ord, $filter);
while ($arUser = $dbUsers->Fetch()) 
{
	echo '<br>'.$arUser["NAME"]." ".$arUser["LAST_NAME"]."<br>";
	//	echo'<pre>';
	//	print_r($arUser);
	//	echo'</pre><br>';
}

$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
$department = $arUser['UF_DEPARTMENT'][0]; 
echo $department;
echo'<br>';
$did=$ca->delad(4165);
echo'<pre>';
print_r($did);
echo'</pre>';

$z=$ca->mailCheck('Mano.dhaliwal@outlook.com','Maninder singh Dhaliwal');
echo'<pre>';
print_r($z);
echo'</pre>';

$de=array(

);
foreach($de as $d){
	$did=$ca->delad($d);
	echo $did;
	echo'<br>';
}

$lid=$ca->lInfo(583,'elroy.foreman@gmail.com');
echo'<pre>';
print_r($lid);
echo'</pre>';

$remove=array(

);
foreach($remove as $rid){
	$rl=$ca->deldeal($rid);
	echo $rl.'<br>';
}

//$c2d=$ca->con2lead(11442,261048);
///echo $c2d;
//echo'<br>';

$r=$ca->lInfo(11457,264906,'gavriel@gsasim.com');
echo'<pre>';
print_r($r);
echo'</pre>';

$birth=array(

);
foreach($birth as $b){
	$up=$ca->birthfunc($b);
	echo $b.','.$up.'<br>';
}

$CCrmDeal = new CCrmDeal(false);
$con=$CCrmDeal->GetByID(5065);

$rows = $CCrmDeal->LoadProductRows($con['ID']);

foreach($rows as $product) {
				$arrProducts[] = $product['PRODUCT_NAME'];
				$arrProducts2[] = $product['PRODUCT_ID'];
			}
			rsort($arrProducts);
			$productNames = array_shift($arrProducts);
echo'<pre>';
print_r($productNames);
echo'</pre>';

$dbPaySysAction = CSalePaySystemAction::GetList(
				array(),array(
					"PAY_SYSTEM_ID" => 11,
					"PERSON_TYPE_ID" =>4
				),
				false,	false, array("ACTION_FILE", "PARAMS", "ENCODING")
			);
while($arLead = $dbPaySysAction->GetNext()){
	print_r($arLead);
	break;
}
/*
$CCrmLead = new CCrmLead(false);
$lData = $CCrmLead->GetByID(317780);
echo'<pre>';
print_r($lData);
echo'</pre><br>';
$CCrmContact = new CCrmContact(false);
$cData = $CCrmContact->GetByID(11956);
echo'<pre>';
print_r($cData);
echo'</pre>';

global $USER_FIELD_MANAGER;
$arra=array(


);
foreach($arra as $id){
			$CCrmDeal = new CCrmDeal(false);
			$cData = $CCrmDeal->GetByID($id);
			if(!empty($cData['CONTACT_ID'])){
				$cid=$cData['CONTACT_ID'];

				$custom2=$USER_FIELD_MANAGER->GetUserFields('CRM_CONTACT', $cid, $LANG = false, $user_id = false);
				if(!empty($custom2['UF_CRM_1485065310']['VALUE'])){
					$sous=$custom2['UF_CRM_1485065310']['VALUE'];
					$update2=$USER_FIELD_MANAGER->Update('CRM_DEAL',$id,array('UF_CRM_1485069606' => $sous));
					echo'done<br>';
				}else{
					echo'no contact<br>';
				}
			}else{
				echo'none<br>';
			}
}
*/
$k='idol@gobe-mark.com';
$v='ido l';

echo $ca->cPostMan($k,$v);
?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>