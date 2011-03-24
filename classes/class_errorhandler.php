<?php
class ErrorHandler {
	private $errors;
	
	function __construct () {
		$this->errors = "";
	}
	
	function c_throw ($num, $message, $type) {
		if ($type == CGlobalConstans::SYSTEM_ERROR) {
			die ("<center><div class=\"system-error\">Error<br>Error number: ".$num."<br>Error message: ".$message."</div></center>");
		}
		elseif ($type == CGlobalConstans::USER_ERROR) {
			$this->errors .= "<div class=\"user-error\">
			<dl><dt>Ошибка:</dt><dd>".$message."</dd></dl>
			</div>";
		}
	}
	
	function has_errors () {
		return empty($this->errors)?false:true;
	}
	
	function flash () {
		echo $this->errors;
		$this->errors = "";
	}
	
	function errors () {
		return $this->errors;
	}
}
?>