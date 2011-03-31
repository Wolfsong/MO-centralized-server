<?php
class DatabaseManager {
	private $connection;
	private $host;
	private $username;
	private $password;
	private $database;
	
	function __construct ($a_host, $a_username, $a_password, $a_database) {
		$this->host = $a_host;
		$this->username = $a_username;
		$this->password = $a_password;
		$this->database = $a_database;
		$this->connection = mysql_connect ($a_host, $a_username, $a_password) or die ("__construct error: " . mysql_error ());
		mysql_select_db ($a_database) or die ("__construct error: " . mysql_error ());
	}
	
	function query_exec ($query) {
		if ($query == "") return 0;
		return mysql_query ($query) or die ("query_exec error: " . mysql_error ());
	}
	
	function get_attribute_string_list ($attribute, $relation, $condition = 1, $limit = 1) {
		$result = mysql_query ("SELECT `".$attribute."` FROM `".$relation."` WHERE ".$condition." LIMIT 0 , ".$limit) or die ("get_attirbute_string_list error: ".mysql_error ());
		if (!$result) return "";
		$tmp = mysql_fetch_row ($result);
		return $tmp[0];
	}
	
	function select_database ($dbname) {
		mysql_select_db ($dbname) or die ("select_database error: ".mysql_error ());
	}
	
	function __get($arg) {
		return $this->$arg;
	}
	
	function __destruct () {
		mysql_close($this->connection);
	}
}
?>