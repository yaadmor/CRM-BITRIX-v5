<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/crm/contact/index.php");
$APPLICATION->SetTitle(GetMessage("CRM_TITLE"));
?><?$APPLICATION->IncludeComponent("bitrix:crm.contact", "template1", Array(
	"SEF_MODE" => "Y",	// Enable SEF (Search Engine Friendly Urls) support
		"PATH_TO_LEAD_SHOW" => "/crm/lead/show/#lead_id#/",
		"PATH_TO_LEAD_EDIT" => "/crm/lead/edit/#lead_id#/",
		"PATH_TO_LEAD_CONVERT" => "/crm/lead/convert/#lead_id#/",
		"PATH_TO_COMPANY_SHOW" => "/crm/company/show/#company_id#/",
		"PATH_TO_COMPANY_EDIT" => "/crm/company/edit/#company_id#/",
		"PATH_TO_DEAL_SHOW" => "/crm/deal/show/#deal_id#/",
		"PATH_TO_DEAL_EDIT" => "/crm/deal/edit/#deal_id#/",
		"PATH_TO_INVOICE_SHOW" => "/crm/invoice/show/#invoice_id#/",
		"PATH_TO_INVOICE_EDIT" => "/crm/invoice/edit/#invoice_id#/",
		"PATH_TO_USER_PROFILE" => "/company/personal/user/#user_id#/",
		"ELEMENT_ID" => $_REQUEST["contact_id"],	// Contact ID
		"SEF_FOLDER" => "/crm/contact/",	// Folder for SEF (site-root-relative)
		"SEF_URL_TEMPLATES" => array(
			"index" => "index.php",
			"list" => "list/",
			"edit" => "edit/#contact_id#/",
			"show" => "show/#contact_id#/",
			"service" => "service/",
			"export" => "export/",
			"import" => "import/",
			"dedupe" => "dedupe/",
		),
		"VARIABLE_ALIASES" => array(
			"index" => "",
			"list" => "",
			"edit" => "",
			"show" => "",
			"service" => "",
			"export" => "",
			"import" => "",
			"dedupe" => "",
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>