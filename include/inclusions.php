<?php
require_once "./classes/class_cglobalconstants.php";
include_once "config.php";

function __autoload ($classname) {
	include_once (CGlobalConstants::CLASSES_ROOT.CGlobalConstants::CLASSES_PREFIX.strtolower ($classname).CGlobalConstants::CLASSES_POSTFIX);
}

$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
$content_maker = new Main ("modules.xml");
?>