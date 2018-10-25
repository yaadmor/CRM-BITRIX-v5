<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

//echo'heloo ime lead<br>';
//$lead=$_GET;
//echo'<pre>';
//print_r($lead);
//echo'</pre>';
$APPLICATION->IncludeComponent("bitrix:crm.lead.rest", "", $_POST);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>