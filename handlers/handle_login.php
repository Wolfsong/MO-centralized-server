<?php
header ("Cache-control: no-cache");
header ("Pragma: no-cache");
header ("Content-type: text/xml");
$tmp = sha1 ($_GET[password_field].date ('zsYmh'));
$suc = NULL;
if (!isset($_COOKIE['mo_session_token'])) $suc = setcookie ("mo_session_token", $tmp, time ()+3600*12, "/MO-centralized-server");

require_once "../classes/class_cglobalconstants.php";
include_once "../config.php";

function __autoload ($classname) {
	include_once (".".CGlobalConstants::CLASSES_ROOT.CGlobalConstants::CLASSES_PREFIX.strtolower ($classname).CGlobalConstants::CLASSES_POSTFIX);
}

$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
$error_handler = new ErrorHandler ();
$iggog = "";

if (!empty ($_GET[login_field]) AND !empty ($_GET[password_field])) {
	$pass = $db_manager->get_attribute_string_list ("Password", "Accounts", "`Login` = '".mysql_real_escape_string($_GET[login_field])."'");
	if (!$pass)
		$error_handler->c_throw (0, CErrorMessage::WRONG_LOGIN, CGlobalConstants::USER_ERROR);
	if ($_GET[password_field] != $pass)
		$error_handler->c_throw (0, CErrorMessage::WRONG_PASSWORD, CGlobalConstants::USER_ERROR);
}

if ($error_handler->has_errors ()) {
	echo CGlobalConstants::XML_HEADER;
	echo Decoration::xml_decorate ("errors", $error_handler->errors_flash ());
}
else {
	$db_manager->query_exec ("DELETE FROM `Sessions` WHERE `SessionDie` < NOW()");
	if ($suc)
		$db_manager->query_exec ("INSERT INTO `Sessions` (`ID`, `SessionDie`) VALUES ('".$tmp."', NOW() + INTERVAL 12 HOUR)");
	else
		$iggog = 1; /////////////// оработать!
}
?>