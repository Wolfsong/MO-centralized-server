<?php
class ErrorHandler {
	private $errors;
	
	function __construct () {
		$this->errors = "";
	}
	
	function c_throw ($num, $message, $type) {
		if ($type == CGlobalConstants::SYSTEM_ERROR) {
			die (Decoration::system_error_message_decorate($num, $message));
		}
		elseif ($type == CGlobalConstants::USER_ERROR) {
			$this->errors .= Decoration::app_to_the_end($message, "br/");
		}
	}
	
	function has_errors () {
		return empty($this->errors)?false:true;
	}
	
	function flash () {
		$tmp = $this->errors;
		$this->errors = "";
		return $tmp;
	}
}
?>