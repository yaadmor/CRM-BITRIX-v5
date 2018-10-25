<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle(GetMessage("WD_WEBDAV"));
?><?$APPLICATION->IncludeComponent(
	"bitrix:webdav",
	"",
	Array(
		"IBLOCK_TYPE" => "docs", 
		"IBLOCK_ID" => "31", 
		
		"SEF_MODE" => "Y", 
		"SEF_FOLDER" => "/docs/", 
		"BASE_URL" => "/docs/", 
		
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600", 
		"SET_TITLE" => "Y", 
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>