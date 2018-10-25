<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/about/media.php");
$APPLICATION->SetTitle(GetMessage("ABOUT_TITLE"));
?>

<?$APPLICATION->IncludeComponent("bitrix:iblock.tv", "round", Array(
	"IBLOCK_TYPE"	=>	"services",
	"IBLOCK_ID"	=>	"27",
	"PATH_TO_FILE"	=>	"97",
	"DURATION"	=>	"98",
	"SECTION_ID"	=>	"32",
	"ELEMENT_ID"	=>	"21",
	"WIDTH"	=>	"400",
	"HEIGHT"	=>	"300",
	"CACHE_TYPE"	=>	"A",
	"CACHE_TIME"	=>	"36000000"
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>