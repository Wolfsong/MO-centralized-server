<?php
abstract class Module {
	private $params;
	private $type;
	
	abstract function __construct($type);
	abstract function begin_handler ();
	abstract function middle_handler ();
	abstract function end_handler ();
	abstract function forms ($area);
	function get_param ($index) {
		return $params[$index];
	}
}
?>