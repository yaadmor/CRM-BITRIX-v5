<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

die;
/* init */
// echo 'Init<br>';
if(!CModule::IncludeModule("crm")) die('Dead error: CRM Module not installed');

$leadObj = new CCrmLead;
$dealObj = new CCrmDeal;
$contactObj = new CCrmContact;
$CCrmFieldMulti = new CCrmFieldMulti;

$arOrder = Array('DATE_CREATE' => 'DESC'); 
$arFilter = Array("CHECK_PERMISSIONS" => "N");
$arSelect = Array('*','UF_*');
$lines = 100;



/** stage 1 
**  Convert leads 
**  http://hq.rebza.com/bitrix/admin/bitrix.liveapi_live_api.php?module_id=crm&class=CCrmLead
*/

/*
if ($_REQUEST['offset2'] === NULL && $_REQUEST['offset3'] === NULL) {
	if ($_REQUEST['offset'] > 0) $offset = $_REQUEST['offset']; else $offset = 0;
	$end = true;
	$navListOptions = array('QUERY_OPTIONS' => array('LIMIT' => $lines, 'OFFSET' => $offset));

	// $leadUF = $leadObj->GetUserFields();
	// echo '<details><summary>leadserFields</summary><pre>';var_dump($leadUF);echo '</pre></details>';
	echo 'Convert Leads '.$offset . ' - ' . ($offset+$lines).'<br>';

	$leadGetObj = $leadObj->GetListEx($arOrder, $arFilter, false, false, $arSelect, $navListOptions);
	while ($lead = $leadGetObj->GetNext()) {
		$end = false;
		$lead = prepareData($lead);
		$phones = array();
		foreach ($lead as $UFfieldName => $UFfieldData) {
			switch ($UFfieldName) {
				case 'UF_CRM_1449141485': // Middle Name: UF
					$lead["SECOND_NAME"] = $lead['UF_CRM_1449141485'];	break;
				case 'UF_CRM_1449131702': // Email:
					if ($UFfieldData !== '') addEmail($lead['ID'],$lead['UF_CRM_1449131702'],'LEAD',$CCrmFieldMulti); break;
				case 'UF_CRM_1449131631': // 1282827 
				case 'UF_CRM_1449131653': // 1282827 
					if ($UFfieldData !== '') $phones[] = $UFfieldData;break;
				case 'UF_CRM_1449131560': break; // Name: uf // 1 lead
				case 'UF_CRM_1449146909': break; // Name: uf 2 // Not Used
				case 'UF_CRM_1449140630': break;// Status ???
				case 'UF_CRM_1449131576': break;// Last Name: UF // Not used
				case 'UF_CRM_1449131599': break;// Birth Country: UF // Not changed
				case 'UF_CRM_1449131611': break;// IP: // Not changedVust delete
				case 'UF_CRM_1449131669': break;// IP Country: // Not changed
				case 'UF_CRM_1449131682': break;// Martial Status: // Not changed
				case 'UF_CRM_1449131692': break;// Client ID: // Not changed
				case 'UF_CRM_1449141918': break;// New field 2 // Not used
				case 'UF_CRM_1449142241': break;// Spouse Country of Birth // Not used
				case 'UF_CRM_1449142336': break;// Number of children // Not used
				case 'UF_CRM_1449142373': break;// Child 1 Name: // Not used
				case 'UF_CRM_1449142386': break;// New field 5:  // Not used
				case 'UF_CRM_1449142389': break;// New field 6: // Not used
				case 'UF_CRM_1449142392': break;// New field 7: // Not used
				case 'UF_CRM_1449142524': break;// 08.04.2016 06:26:00 // Not used
				case 'UF_CRM_1449142527': break;// 09.04.2016 06:26:00 // Not used
				case 'UF_CRM_1449142530': break;// 10.04.2016 06:26:00 // Not used
				case 'UF_CRM_1449142617': break;// New field 11: // Not used
				case 'UF_CRM_1449142621': break;// New field 12: // Not used
				case 'UF_CRM_1449142624': break;// New field 13: // Not used
				case 'UF_CRM_1449142726': break;// New field 14: // Not used
				case 'UF_CRM_1449142729': break;// New field 15: // Not used
				case 'UF_CRM_1449142733': break;// New field 16: // Not used
				case 'UF_CRM_1449142805': break;// 17.04.2016 06:26:00 // Not used
				case 'UF_CRM_1449143238': break;// Spouse Name: // Not used
				case 'UF_CRM_1449562089': break;// Spouse Name: // Not used
			}
		}
		foreach (array_unique($phones) as $phone) {
			$r2 = addPhone($lead['ID'], $phone, 'LEAD', $CCrmFieldMulti);
		}
		updateEntity($lead,$leadObj);
	}
	if ($end === false) {echo 'Please waiting. Lead converting process...';
		?><script>window.onload = function() {
			window.location.replace(window.location.origin+window.location.pathname+"?offset=<?=$_REQUEST['offset']+$lines?>");
		}</script><?
	} else {echo 'Lead converting complete';
		?><script>window.onload = function() {
			window.location.replace(window.location.origin+window.location.pathname+"?offset3=0");
		}</script><?
	}
}

*/
if ($_REQUEST['offset'] === NULL && $_REQUEST['offset3'] === NULL && $_REQUEST['offset2'] !== NULL ) {
/* Convert deals
**  http://hq.rebza.com/bitrix/admin/bitrix.liveapi_live_api.php?module_id=crm&class=CCrmDeal
*/

	$offset2 = $_REQUEST['offset2']; 
	echo 'Convert deals '.$offset2 . ' - ' . ($offset2+$lines).'<br>';

	$end = true;
	$navListOptions = array('QUERY_OPTIONS' => array('LIMIT' => $lines, 'OFFSET' => $offset2));
	$dealGetObj = $dealObj->GetListEx($arOrder, $arFilter, false, false, $arSelect, $navListOptions);
	while ($deal = $dealGetObj->GetNext()) {
	$contactId = $deal['CONTACT_ID'];	
		$end = false;
		$deal = prepareData($deal);
		foreach ($deal as $UFfieldName => $UFfieldData) {

			/* convert */
			switch ($UFfieldName) {
				/*
				case 'UF_CRM_1449154214': 
					if ($UFfieldData === '' || $contactId < 1) break;
					$fields = array(
						'ID' => $contactId,
						'BIRTHDATE' => substr($UFfieldData,0,10)
					);
					// d($fields);
					$ret = updateEntity($fields,$contactObj);
					if ($ret === false) d($fields);
					//	d($contactId);
					break;
				case 'UF_CRM_566EEC9127994': 
					if ($UFfieldData === '') break;
					updateUF($contactId,'UF_CRM_566016C18B2CC',$UFfieldData);
					break;// Spouse Date Of Birth 
				case 'UF_CRM_1449154248': 
					updateUF($contactId,'UF_CRM_1462453575',$UFfieldData);
					break;// Spouse Date Of Birth 
				case 'UF_CRM_1449154252': 
					updateUF($contactId,'UF_CRM_1462453236',$UFfieldData); 
					break;// Spouse Country Of Birth:
				case 'UF_CRM_1449154263': 
					updateUF($contactId,'UF_CRM_1462453275',$UFfieldData); 
					break;// Spouse City Of Birth:
				case 'UF_CRM_1449562180': 
					updateUF($contactId,'UF_CRM_5663EF2587EEC',$UFfieldData);
					break;// Spouse Name: 
				case 'UF_CRM_1449154594':
					updateUF($contactId,'UF_CRM_5663EF24E7D06',$UFfieldData);  
					break;// Child 1 Name:
				case 'UF_CRM_1449154601': 
					updateUF($contactId,'UF_CRM_1462452635',$UFfieldData);
					break;// Child 1 Date Of Birth: 
				case 'UF_CRM_1449154597': 
					updateUF($contactId,'UF_CRM_1462452763',$UFfieldData);
					break;// Child 1 City Of Birth 
				case 'UF_CRM_1449154690': 
					updateUF($contactId,'UF_CRM_1462452446',$UFfieldData);
					break;// Child 1 Country Of Birth:
				case 'UF_CRM_1449154607': 
					updateUF($contactId,'UF_CRM_1462452141',$UFfieldData);
					break;// Child 2 Name: 
				case 'UF_CRM_1449154610': 
					updateUF($contactId,'UF_CRM_1462452670',$UFfieldData);
					break;// Child 2 Date Of Birth:
				case 'UF_CRM_1449154604': 
					updateUF($contactId,'UF_CRM_1462452782',$UFfieldData);
					break;// Child 2 City Of Birth
				case 'UF_CRM_1449154694': 
					updateUF($contactId,'UF_CRM_1462452364',$UFfieldData);
					break;// Child 2 Country Of Birth:  
				case 'UF_CRM_1449154612': 
					updateUF($contactId,'UF_CRM_1462452161',$UFfieldData);
					break;// Child 3 Name: 
				case 'UF_CRM_1449154618': 
					updateUF($contactId,'UF_CRM_1462452689',$UFfieldData);
					break;// Child 3 Date Of Birth: 
				case 'UF_CRM_1449154615': 
					updateUF($contactId,'UF_CRM_1462452551',$UFfieldData);
					break;// Child 3 Country Of Birth:
				case 'UF_CRM_1449154696': 
					updateUF($contactId,'UF_CRM_1462452834',$UFfieldData);
					break;// Child 3 City Of Birth:
				case 'UF_CRM_1449154878': 
					updateUF($contactId,'UF_CRM_1462452204',$UFfieldData);
					break;// Child 4 Name:
				case 'UF_CRM_1449154625': 
					updateUF($contactId,'UF_CRM_1462452735',$UFfieldData);
					break;// Child 4 Date Of Birth:
				case 'UF_CRM_1449154623': 
					updateUF($contactId,'UF_CRM_1462452868',$UFfieldData);
					break;// Child 4 City Of Birth:
				case 'UF_CRM_1449154621': 
					updateUF($contactId,'UF_CRM_1462452497',$UFfieldData);
					break;// Child 4 Country Of Birth:
				case 'UF_CRM_1449153643': 
					$compare = array(
						'54'=>'192','56'=>'193','58'=>'194','60'=>'195','62'=>'196'
					);
					updateUF($contactId,'UF_CRM_1462461728',$compare[$UFfieldData[0]]); 
					break;// Program // ****
				*/
			}
		}
	}
	
	if ($end === false) {echo 'Please waiting. Deal converting process...';
		?><script>window.onload = function() {
			window.location.replace(window.location.origin+window.location.pathname+"?offset2=<?=$_REQUEST['offset2']+$lines?>");
		}</script><?
	} else {echo 'Deal converting complete';die();}
}

/** Convert contaxts 
**  http://hq.rebza.com/bitrix/admin/bitrix.liveapi_live_api.php?module_id=crm&class=CCrmContact
*/

/*
if ($_REQUEST['offset'] === NULL && $_REQUEST['offset2'] === NULL && $_REQUEST['offset3'] !== NULL) {
	Echo 'Convert contacts<br>';
	
	$offset3 = $_REQUEST['offset3']; 
	echo 'Convert Leads '.$offset3 . ' - ' . ($offset3+$lines).'<br>';
	$end = true;
	$navListOptions = array('QUERY_OPTIONS' => array('LIMIT' => $lines, 'OFFSET' => $offset3));

	$contactGetObj = $contactObj->GetListEx($arOrder, $arFilter, false, false, $arSelect, $navListOptions);
	while ($contact = $contactGetObj->GetNext()) {
		$end = false;
		$contact = prepareData($contact);
		$phones = array();
		foreach ($contact as $UFfieldName => $UFfieldData) {
			switch ($UFfieldName) {
				case 'UF_CRM_566016C1A3BFA': // 1282827
				case 'UF_CRM_566016C1AFA30': // 1282828
					if ($UFfieldData !== '') $phones[] = $UFfieldData; break;
				case 'UF_CRM_566016C1D5B44': // Email:
					if ($UFfieldData != '') addEmail($contact['ID'],$UFfieldData,'CONTACT',$CCrmFieldMulti); break;
				case 'UF_CRM_5663EF24A69A4': break;// Status ???
				case 'UF_CRM_566016C1990B7': break;// IP: // Not Change
				case 'UF_CRM_566016C18B2CC': break;// Birth Country: // Not Change
				case 'UF_CRM_566016C1B8490': break;// IP Country: // Not change
				case 'UF_CRM_566016C1C0C0E': break;// Martial Status: // Not change
				case 'UF_CRM_566016C1CC16A': break;// Client ID: // Not change
				case 'UF_CRM_5663EF24DD8A5': break;// Number of children // Not change
				case 'UF_CRM_566016C1DF692': break;// NA: // Not used
				case 'UF_CRM_566016C16E14D': break;// Name: // Not used
				case 'UF_CRM_5663EF24D37CC': break;// Spouse Country of Birth: // Not used
				case 'UF_CRM_566016C17E10D': break;// Last Name: // Not used
				case 'UF_CRM_5663EF24E7D06': break;// Child 1 Name: // Not used
				case 'UF_CRM_5663EF24BC2F1': break;// Middle Name: // Not used
				case 'UF_CRM_5663EF24C7E81': break;// New field 2 // Not used
				case 'UF_CRM_5663EF2502DAB': break;// New field 5:  // Not used
				case 'UF_CRM_5663EF250DB76': break;// New field 6: // Not used
				case 'UF_CRM_5663EF25164CA': break;// New field 7:  // Not used
				case 'UF_CRM_5663EF251F437': break;// New field 8  // Not used
				case 'UF_CRM_5663EF252C8AF': break;// New field 9 // Not used
				case 'UF_CRM_5663EF253787A': break;// New field 10 // Not used
				case 'UF_CRM_5663EF254101C': break;// New field 11: // Not used
				case 'UF_CRM_5663EF25496E4': break;// New field 12: // Not used
				case 'UF_CRM_5663EF2555BE6': break;// New field 13: // Not used
				case 'UF_CRM_5663EF25607B3': break;// New field 14: // Not used
				case 'UF_CRM_5663EF256AE03': break;// New field 15: // Not used
				case 'UF_CRM_5663EF2574879': break;// New field 16: // Not used
				case 'UF_CRM_5663EF257EAAE': break;// New field 17 // Not used
				case 'UF_CRM_5663EF2587EEC': break;// Spouse Name:  // Not used
				case 'UF_CRM_566EEC6E1E8C2': break;// Client ID:2  // Not used
			}
		}
		$phonesArr = array_unique($phones);
		foreach ($phonesArr as $phone) {
			$r2 = addPhone($contact['ID'], $phone, 'CONTACT', $CCrmFieldMulti);
		//	echo $r2.'<br>';
		}
	}
	if ($end === false) {echo 'Please waiting. Contacts converting process...';
		?><script>window.onload = function() {
			window.location.replace(window.location.origin+window.location.pathname+"?offset3=<?=$_REQUEST['offset3']+$lines?>");
		}</script><?
	} else {echo 'Deal converting complete';
		?><script>window.onload = function() {
			window.location.replace(window.location.origin+window.location.pathname+"?offset2=0");
		}</script><?
	}
}
*/
die();

function updateUF($contactId,$field,$value) {
		Global $USER_FIELD_MANAGER;
		$USER_FIELD_MANAGER->Update(
			'CRM_CONTACT', $contactId, 
			array($field => $value)
		); 
	
}

function prepareData($fields) {
	$ret = array();
	foreach ($fields as $fieldName => $fieldValue) {
		if (strpos($fieldName,'~') === 0) {
			$ret[substr($fieldName,1)] = $fieldValue;
		}
	}
	return ($ret);
}
 
function addEmail($id, $email, $ENTITY_ID, $CCrmFieldMulti) {
	if (!strpos($email, '@') > 0 && !strpos($email,'.') > 0) {
		echo '<font color="red">Email '.$email.' for '.$ENTITY_ID.' #'.$id.' not valid</font><br>';
		return;
	}
	$arFields = Array(
		'ENTITY_ID'  => $ENTITY_ID,	'ELEMENT_ID' => intval($id),
		'TYPE_ID'    => 'EMAIL', 'VALUE_TYPE' => 'WORK',
		'COMPLEX_ID' => 'EMAIL_WORK', 'VALUE'      => $email
	);
	$CCrmFieldMulti->Add($arFields);
	return;
}

function addPhone($id, $phone, $ENTITY_ID,$CCrmFieldMulti) {
	$arFields = Array(
		'ENTITY_ID'  => $ENTITY_ID,	'ELEMENT_ID' => intval($id),
		'TYPE_ID'    => 'PHONE', 'VALUE_TYPE' => 'WORK',
		'COMPLEX_ID' => 'PHONE_WORK', 'VALUE'      => $phone
	);
	$CCrmFieldMulti->Add($arFields);
	return;
}

function updateEntity($fields,$Obj){
//	echo '<details><summary>Update lead #'.$lead['ID'].'</summary><pre>';
//	var_dump($lead);
//	echo '</pre></details>';
	$ret =  $Obj->Update($fields['ID'], $fields, false, true);
//	var_dump($ret);
	return($ret);
}
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");