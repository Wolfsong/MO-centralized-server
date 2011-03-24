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
	
	static function login_content () {
		echo "<div class=\"login\">
		<form method=\"handlers.php\">
			<fieldset>
			Логин: <input type=\"text\" name=\"login\" maxlength=100 class=\"login-form\" /><br>
			Пароль: <input type=\"password\" name=\"password\" maxlength=40 class=\"password-form\" /><br>
			<input type=\"submit\" value=\"Войти в систему\" name=\"start_login\" class=\"submit-form\" />
			</fieldset>
		</form>
		<div class=\"footer\"><a href=\"handlers.php?forget\">Забыли пароль?</a> | <a href=\"register.php\">Регистрация</a></div>
		</div>";
		/////////////////????????????????????? как передать ошибки???
	}
	
	static function header_content () {
		if (count ($module_objects) > 0) {
			
		}
	}
	
	static function hornavbar_content () {
	
	}
	
	static function leftcoloumn_content () {
	
	}
	
	static function central_content () {
	
	}
	
	static function rightcoloumn_content () {
	
	}
	
	static function footer_content () {
	
	}
}
?>