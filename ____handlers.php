<?php // надо ли все это?
global $db_manager;
global $content_maker;

if ($_POST[start_login] && !(empty($_POST[login_field]) && empty($_POST[password_field]))) {
	$pass = $db_manager->get_attribute_string_list ("Password", "Accounts", "`Login` = '".mysql_real_escape_string($_POST[login_field])."'");
	if (!$pass) {
		$content_maker->local_objects[error_handler]->c_throw(0, CErrorMessage::WRONG_LOGIN, CGlobalConstants::USER_ERROR);
	}
	if (sha1 ($_POST[password_field]) != $pass) {
		$content_maker->local_objects[error_handler]->c_throw(0, CErrorMessage::WRONG_PASSWORD, CGlobalConstants::USER_ERROR);
	}
}
?>
