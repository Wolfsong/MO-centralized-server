<?php
include "../config.php";
require_once "../classes/class_cglobalconstants.php";

function __autoload ($classname) {
	include_once (".".CGlobalConstants::CLASSES_ROOT.CGlobalConstants::CLASSES_PREFIX.strtolower ($classname).CGlobalConstants::CLASSES_POSTFIX);
}

$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
if (!$db_manager->query_exec("INSERT INTO `Accounts` VALUES (
		'".mysql_real_escape_string(iconv("utf-8", "cp1251", $_POST[rsurname]))."',
		'".mysql_real_escape_string(iconv("utf-8", "cp1251", $_POST[rfirstname]))."',
		'".mysql_real_escape_string(iconv("utf-8", "cp1251", $_POST[rsecondname]))."',
		NULL,
		'".mysql_real_escape_string($_POST[rpassword])."',
		'".mysql_real_escape_string($_POST[remail])."',
		'user' ,
		NULL,
		'".mysql_real_escape_string(iconv("utf-8", "cp1251", $_POST[rlogin]))."')")) {
	echo CGlobalConstants::XML_HEADER;
	echo Decoration::xml_decorate ("errors", "Internal Error!");
	}
else
echo "";
?>