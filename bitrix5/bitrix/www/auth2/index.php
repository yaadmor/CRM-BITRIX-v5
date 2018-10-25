<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("auth2");
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>
<?global $USER;
if ($_REQUEST['logout']=='logout') {$USER->Logout();}
if (!$USER->IsAuthorized()) {
	if ($_REQUEST['register']=='yes') {
	?><?$APPLICATION->IncludeComponent(
		"bitrix:main.register", 
		".default", 
		array(
			"AUTH" => "Y",
			"REQUIRED_FIELDS" => array(
				0 => "NAME",
				1 => "SECOND_NAME",
				2 => "LAST_NAME",
			),
			"SET_TITLE" => "N",
			"SHOW_FIELDS" => array(
				0 => "PERSONAL_PHONE",
				1 => "PERSONAL_MOBILE",
				2 => "NAME",
				3 => "SECOND_NAME",
				4 => "LAST_NAME",
			),
			"SUCCESS_PAGE" => "",
			"USER_PROPERTY" => array(
				0 => "UF_MARITAL_STATUS",
				1 => "UF_COUNTRY_OF_BIRTH",
				2 => "UF_COUNTRY_RESID",
			),
			"USE_BACKURL" => "Y",
			"COMPONENT_TEMPLATE" => ".default"
		),
		false
	);
	} elseif ($_REQUEST['forgot_password'] == 'yes') {
	?><?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd","",
			Array(),array("ACTIVE_COMPONENT" => "Y")
		);
	} else {
	?><?$APPLICATION->IncludeComponent(
			"bitrix:system.auth.form",
			"",
			Array(
				"PROFILE_URL" => "/personal/profile/",
				"REGISTER_URL" => "/auth2/?register=yes",
				"FORGOT_PASSWORD_URL" => "/auth2/?forgot_password=yes",
				"SHOW_ERRORS" => "Y",
			),
			array("ACTIVE_COMPONENT" => "Y")
		);?>
	<? }
}?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>