<?php
class ErrorHandler {
	function c_throw ($num, $message) {
		die ("<center><div class=\"error\">Error<br>Error number: ".$num."<br>Error message: ".$message."</div></center>");
	}
}
?>