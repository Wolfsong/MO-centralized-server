<!doctype html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<title>Test</title>
	</head>
	<body>
<?php
require_once "./classes/class_constants.php";
include_once "config.php";

function __autoload ($classname) {
	require_once (CGlobalConstants::CLASSES_ROOT.CGlobalConstants::CLASSES_PREFIX.strtolower ($classname).CGlobalConstants::CLASSES_POSTFIX);
}

$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
$mod_stack = new Main();
$mod_stack->module_objects[module_inputforms]->begin_handler();
?>
	</body>
</html>