<?php /// на до ли все это?
class GeneralFunctions {
	static function login_handler (ErrorHandler& $arg) {
			$db_manager = new DatabaseManager ($db_host, $db_user_name, $db_password, $db_database_name);
			$pass = $db_manager->get_attribute_string_list ("password", "accounts", "LOGIN = $_POST[login]");
			global $err = new ErrorHandler ();
			if (!$pass) {
				$arg->c_throw (0, CErrorMessage::WRONG_LOGIN, CGlobalConstants::USER_ERROR);
			}
			if (sha1 ($_POST[password]) != $pass) {
				$arg->c_throw (0, CErrorMessage::WRONG_PASSWORD, CGlobalConstants::USER_ERROR);
			}
		}
}
?>