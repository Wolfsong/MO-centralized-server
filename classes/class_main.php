<?php
class Main {
	public $module_objects;
	public $local_objects;
	private $error_content;
	private $login_content;
	private $header_content;
	private $hornavbar_content;
	private $leftcoloumn_content;
	private $central_content;
	private $rightcoloumn_content;
	private $footer_content;
		
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
		fclose($handle);
		$this->footer_content = $this->rightcoloumn_content = $this->central_content = $this->leftcoloumn_content = $this->hornavbar_content = $this->header_content = $this->login_content = $this->error_content = " ";
		$this->local_objects[error_handler] = new ErrorHandler();
	}
	
	function _get ($arg) {
		return $arg;
	}
	
	function login_content () {
		$this->login_content .= "<div class=\"login\">
		<form action=\"#\" method=\"get\">
			<fieldset>
			Логин: <input type=\"text\" name=\"login_field\" maxlength=100 class=\"login-form\" value=\"\" /><br>
			Пароль: <input type=\"password\" name=\"password_field\" maxlength=40 class=\"password-form\" value=\"\" /><br>
			<input type=\"button\" value=\"Войти в систему\" id=\"request_login\" name=\"start_login\" class=\"submit-form\" />
			<input type=\"hidden\" name=\"page_request\"/>
			</fieldset>
		</form>
		<div class=\"footer\"><a href=\"index.php?forget\">Забыли пароль?</a> | <a id=\"register\" href=\"javascript:void(0)\">Регистрация</a></div>
		</div>";
		echo $this->login_content;
	}
	
	function error_content () {
		$this->error_content = Decoration::user_error_message_decorate ();
		echo $this->error_content;
	}
	
	function header_content () {
		if (count ($module_objects) > 0) {
			return 0;
		}
	}
	
	function hornavbar_content () {
		echo "<center>Hello World!<center>";
	}
	
	function leftcoloumn_content () {
		return 0;
	}
	
	function central_content () {
		return 0;
	}
	
	function rightcoloumn_content () {
		return 0;
	}
	
	function footer_content () {
		return 0;
	}
}
?>