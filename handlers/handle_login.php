<?php
header ("Cache-control: no-cache");
header ("Pragma: no-cache");
header ("Content-type: text/xml");

require_once "../classes/class_cglobalconstants.php";
include_once "../config.php";

function __autoload ($classname) {
	include_once (".".CGlobalConstants::CLASSES_ROOT.CGlobalConstants::CLASSES_PREFIX.strtolower ($classname).CGlobalConstants::CLASSES_POSTFIX);
}

$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
$content_maker = new Main ("../modules.xml");

if (!(empty($_GET[login_field]) && empty($_GET[password_field]))) {
	$pass = $db_manager->get_attribute_string_list ("Password", "Accounts", "`Login` = '".mysql_real_escape_string($_GET[login_field])."'");
	if (!$pass) {
		$content_maker->local_objects[error_handler]->c_throw(0, CErrorMessage::WRONG_LOGIN, CGlobalConstants::USER_ERROR);
	}
	if ($_GET[password_field] != $pass) {
		$content_maker->local_objects[error_handler]->c_throw(0, CErrorMessage::WRONG_PASSWORD, CGlobalConstants::USER_ERROR);
	}
}

if ($content_maker->local_objects[error_handler]->has_errors()) {
	print CGlobalConstants::XML_HEADER;
	print Decoration::xml_decorate("errors", $content_maker->local_objects[error_handler]->flash());
}
?>