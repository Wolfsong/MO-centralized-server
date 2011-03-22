<?php
class InputForms extends Module {
	function __construct($type) {
		$this->type = $type;
	}
	
	function begin_handler () {
		echo "Success";
	}
	
	function middle_handler () {
		return 0;
	}
	
	function end_handler () {
		return 0;
	}
	
	function forms ($area) {
		return 0;
	}
}
?>