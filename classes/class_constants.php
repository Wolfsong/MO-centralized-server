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
}
?>