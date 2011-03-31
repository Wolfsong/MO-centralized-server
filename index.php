<?php
header("Content-type: text/html; charset=utf-8");
?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="content-type" charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/classic/styles.css" />
		<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" />
		<title>Test</title>
		<script type="text/javascript" src="./include/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="./include/ajax.js"></script>
		<script type="text/javascript" src="./include/jquery.sha1.js"></script>
		<script type="text/javascript" src="./include/jquery.form.js"></script>
		<script type="text/javascript" src="./include/jquery-ui-1.8.11.custom.min.js"></script>
		<script type="text/javascript" src="./include/registration.js"></script>
	</head>
	<body>
<?php
require_once "./classes/class_cglobalconstants.php";
include_once "config.php";

function __autoload ($classname) {
	include_once (CGlobalConstants::CLASSES_ROOT.CGlobalConstants::CLASSES_PREFIX.strtolower ($classname).CGlobalConstants::CLASSES_POSTFIX);
}

$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
$content_maker = new Main ("modules.xml");

include "./include/template.php";
include "./include/registration.html";

?>
	</body>
</html>