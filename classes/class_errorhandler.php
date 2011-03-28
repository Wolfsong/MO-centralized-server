<?php
class ErrorHandler {
	private $errors;
	private $sys_warnings;
	private $usr_warnings;
	
	function __construct () {
		$this->errors = "";
	}
	
	function c_throw ($num, $message, $type) {
		if ($type == CGlobalConstants::SYSTEM_ERROR) {
			die (Decoration::system_error_message_decorate($num, $message));
		}
		elseif ($type == CGlobalConstants::USER_ERROR) {
			$this->errors .= $message."\n";
		}
		elseif ($type == CGlobalConstants::SYSTEM_WARNINGS) {
			$this->sys_warnings .= $message."\n";
		}
		elseif ($type == CGlobalConstants::USER_WARNINGS) {
			$this->usr_warnings .= $message."\n";
		}
		else {
			$this->sys_warnings = CErrorMessage::WRONG_ERR_TYPE.$type."\n";
		}
	}
	
	function has_errors () {
		return empty($this->errors)?false:true;
	}
	
	function errors_flash () {
		$tmp = $this->errors;
		$this->errors = "";
		return $tmp;
	}
	
	function sys_warnings_flash () {
		$tmp = Decoration::system_warning_massage_decorate ($this->sys_warnings);
		$this->sys_warnings = "";
		return $tmp;
	}
	
	function usr_warnings_flash () {
		$tmp = Decoration::user_warning_massage_decorate ($this->usr_warnings);
		$this->sys_warnings = "";
		return $tmp;
	}
}
?>