<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/about/auth/index.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) 
	//LocalRedirect($backurl);
	LocalRedirect('http://usalws.org/');

$APPLICATION->SetTitle(GetMessage("AUTH_TITLE"));
?>
<p><?=GetMessage("AUTH_SUCCESS")?></p>

<p><a href="<?=SITE_DIR?>"><?=GetMessage("AUTH_BACK")?></a></p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>