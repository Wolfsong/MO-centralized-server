<?php
class CModuleType {
	const INPUT = 1;
	const OUTPUT = 2;
	const NECESSARY = 4;
	const TRANSITIONAL = 8;
}

class CGlobalConstants {
	const CLASSES_ROOT = "./classes/";
	const CLASSES_PREFIX = "class_";
	const CLASSES_POSTFIX = ".php";
	const MODULE_PREFIX = "module_";
	const USER_ERROR = 1;
	const SYSTEM_ERROR = 2;
}

class CErrorMessage {
	const WRONG_TYPE = "Wrong type of argument.";
	const WRONG_SQL = "Wrong SQL syntax.";
	const WRONG_LOGIN = "¬веден несуществующий логин.";
	const WRONG_PASSWORD = "¬веден неправильный пароль.";
}

class CErrorNum {
	const WRONG_TYPE = 100;
}
?>