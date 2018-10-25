<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/crm/product/index.php");
global $APPLICATION;

$APPLICATION->SetTitle(GetMessage("CRM_TITLE"));
//echo $APPLICATION->GetCurPage();
$APPLICATION->IncludeComponent(
	"bitrix:crm.product", 
	".default", 
	array(
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/crm/product/"
	),
	false
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
