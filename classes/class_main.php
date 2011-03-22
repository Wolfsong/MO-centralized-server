<?php
class Main {
	public $module_objects;
		
	function __construct ($filename = "modules.xml") {
		$handle = fopen ($filename, r);
		$xml_string = fread ($handle, filesize ($filename));
		$doc = new DOMDocument();
		$doc->loadXML($xml_string);
		$names = $doc->getElementsByTagName("name");
		$types = $doc->getElementsByTagName("type");
		$i = 0;
		foreach ($names as $item) {
			$cons = $item->nodeValue;
			$this->module_objects [CGlobalConstants::MODULE_PREFIX.strtolower ($item->nodeValue)] = new $cons ($types->item($i)->nodeValue);
			$i++;
		}
	}
	
	function _get ($arg) {
		return $arg;
	}
}
?>