<?php
abstract class OutputMethods extends Module {
	
	abstract function begin_handler ();
	function middle_handler ();
	function end_handler ();
	
	function forms ($area) {
		switch ($area) {
			case "central":
				echo "<form method>";
		}
	}
}
?>