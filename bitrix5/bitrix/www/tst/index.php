<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<? die('ololo');
// init
echo 'Start<br>';
if ($_REQUEST['offset'] !== NULL) {$offset = $_REQUEST['offset'];} 
else {$offset = 0;}
$end = true;
if(!CModule::IncludeModule("crm")){die('No CRM moule included.');} 
echo 'CRM Module included<br>';

$arOrder = array('DATE_CREATE' => 'DESC');
$arFilter = array();
$arSelect = Array('*','UF_*');
$limit = 1000;
$navListOptions = array('QUERY_OPTIONS' => array('LIMIT' => $limit, 'OFFSET' => $offset));

$convertableFields = array(
	array('UF_CRM_5663EF2587EEC' //Spouse First Name
		,'UF_CRM_1465296328' //Spouse Middle Name
		,'UF_CRM_1465296342' //Spouse Last Name
	),
	array('UF_CRM_5663EF24E7D06' //Child 1 Name
		,'UF_CRM_1465297403' //Child 1 Last name
		,'UF_CRM_1465297420' //Child 1 Middle Name
	),
	array('UF_CRM_1462452141' //Child 2 Name
		,'UF_CRM_1465297433' //Child 2 Middle Name
		,'UF_CRM_1465297456' //Child 2 Last Name
	),
	array('UF_CRM_1462452161' //Child 3 Name
		,'UF_CRM_1465297480' //Child 3 Middle Name
		,'UF_CRM_1465297490' //Child 3 Last Name
	),
	array('UF_CRM_1462452204' //Child 4 Name
		,'UF_CRM_1465297507' //Child 4 Middle Name
		,'UF_CRM_1465297520' //Child 4 Last Name
	)
);

/*
$convertableFields = array(
	'ADDRESS_COUNTRY' => '574C14DA3DD09',
	'ADDRESS_CITY' => '1464603577',
	'ADDRESS' => '1464603330',
	'ADDRESS_POSTAL_CODE' => '1465182079',
	'566016C18B2CC' => '1464912539', // Birth Country
	'1462452446' => '1464912691', // Child 1 Country Of Birth
	'1462452364' => '1464912746', // Child 2 Country Of Birth
	'1462452551' => '1464912800', // Child 3 Country Of Birth
	'1462452497' => '1464912876', // Child 4 Country Of Birth
	'1462453236' => '1464912917' // Spouse Country Of Birth
);*/

$crmContactObject = new CCrmContact;
global $USER_FIELD_MANAGER;
echo 'Init complete<br>';

// get Leads ID list
$ContactObject = $crmContactObject->GetListEx(
	$arOrder, $arFilter, false, false, $arSelect, $navListOptions
);
echo 'get Leads ID list<br>'; 
while ($contact = $ContactObject->GetNext()) {
	//d($contact);
	$end = false;
	foreach ($convertableFields as $transforms) {
		
		if(strlen($contact[$transforms[0]]) > 0) {
			$names = explode(" ", $contact[$transforms[0]]);
			
			foreach ($names as $key => $name) {
				if (strlen($name)>0){
					$ret = $USER_FIELD_MANAGER->Update(
						'CRM_CONTACT',$contact['ID'],
						array($transforms[$key] => $name)
					);
				}
			}
		}
	}
}
if ($end === false) {
	echo 'Please waiting. Converting process...<br>';
	?><script>window.onload = function() {
		window.location.replace(window.location.origin+window.location.pathname+"?offset=<?=$_REQUEST['offset']+$limit?>");
	}</script><?
} else echo 'Converting process complete';
die('End');?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>