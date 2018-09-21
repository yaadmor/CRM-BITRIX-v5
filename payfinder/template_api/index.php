<?php
define("PERSONAL_HASH", "YFXVQ736FI");
function createSignature($s, $h = PERSONAL_HASH) {
  return base64_encode(hash("sha256", $s.$h, true));
}

$phoneNumber = "1111111111111111111111112";

$app = "https://uiservices.pay-finder.com/hosted/?";
$params = array(
  "merchantID" => "8951766",
  "trans_amount" => 553,
  "trans_currency" => "USD",
  "trans_type" => 0, // ["Debit Transaction", "Authorization only"]
  "trans_installments" => 1,
  "disp_paymentType" => "CC",
  // <optional>
  "trans_refNum" => "ph.{$phoneNumber}", // Unique text used to defer one transaction from another
  "trans_comment" => "some comment", // Optional text used mainly to describe the transaction
  // "trans_storePm" => "", // Send value of 1 to save the payment method for future use if the transaction success
  "disp_payFor" => "Green Card Service", // Text shown to buyer in payment window, Usually description of purchase (Cart description, Product name)
  // "disp_paymentType" => "", // List of payment types that are available to the client. Available values are can be found here: Payment Methods. this list is use the abbreviation field from the list. If more than one, use comma to separate the values. (example: CC,ED)
  // "disp_lng" => "", // The default language for the UI text in the window. If omitted, language is taken from user's browser settings.  Available values are: he-IL = עברית (ישראל) en-US = English (United States) fr-FR = français (France) es-ES = español (España, alfabetización internacional) lt-LT= lietuvių (Lietuva) ru-RU = русский (Россия) de-DE = Deutsch (Deutschland) zh = 中文
  // "disp_lngList" => "", // Specifies the language(s) available to user in the Language Selector in the window.  Available values are: all = all languages are available (default if the field is empty or omitted) hide = the language selector is hidden comma-separated list of codes for enabling specific language(s).  For example, disp_lngList=en-us,it-it will allow user to switch between English and Italian, and disp_lngList=en-us will show English only. The available languages are listed in the disp_lng field description.
  // "disp_recurring" => "", // Specifies the deviations from the standard display of the recurring charges.  Available values are: 0 = standard display (default if the field is empty or omitted) 1 = hide the number of charges in the last stage of the recurring series
  // "disp_mobile" => "", // Specifies that the ui should be sized to small screen.  Available values are: auto = auto detect if the client device has small screen true = show small size UI for small screens false = shows normal UI
  // "client_id" => "", // available soon
  // "client_AutoRegistration" => "", // Send value of 1 to create wallet for the customer if not already exist (match by email) and return the id of the wallet
  // "url_notify" => "", // The URL for notifying your system with the transaction result. Must include http:// or https://. This parameter can be configured in Hosted Page V.2 under the Management section. If specified in the request, overrides the configured value.
  // The URL to which the buyer’s browser is redirected to after completing the payment Must include http:// or https://. This parameter can be configured in under the Management section. If specified in the request, overrides the configured value.
    "url_redirect" => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http")
    ."://$_SERVER[HTTP_HOST]"
    .dirname("$_SERVER[REQUEST_URI] ")
    ."/response_collector.php",
  // "skin_no" => "", // The skin number to apply to the window opened by the request. The skins can be configured in the page.
  // </optional>
  // <form>
  "client_email" => "test@gbm.com",
  "client_fullName"	=> "andy test",
  "client_phoneNum"	=> $phoneNumber
  // </form>
);

$signature = createSignature(join(array_values($params)));
$params['signature'] = $signature;
$url = $app.http_build_query($params);
?>

<div>
<iframe src="<?=$url?>" width="400px" height="800px" ></iframe>
</div>
