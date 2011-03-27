<?php
class InputForms extends Module {
	function __construct($type) {
	$int_type = 0;
	if (!is_string($type)) ErrorHandler::c_throw(CErrorNum::WRONG_TYPE, CErrorMessage::WRONG_TYPE);
	if (stristr($type, "input")) $int_type |= 1;
	if (stristr($type, "output")) $int_type |= 2;
	if (stristr($type, "necessary")) $int_type |= 4;
	if (stristr($type, "transitional")) $int_type |= 8;
		$this->type = $int_type;
	}
	
	static function is_valid ($validate_value, $should_be) {
		return ($validate_value == $should_be)?true:false;
	}
	
	function begin_handler () {
		return 0;
	}
	
	function middle_handler () {
		return 0;
	}
	
	function end_handler () {
		return 0;
	}
	
	function forms ($area, $condition) {
		echo "success!";
	}
}
?>