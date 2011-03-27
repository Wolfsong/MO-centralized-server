<?php
class Decoration {
	static function system_error_message_decorate ($num, $message) {
		return "<center><div class=\"system-error\">Error<br>Error number: ".$num."<br>Error message: ".$message."</div></center>";
	}
	
	static function user_error_message_decorate ($message = "") {
		return "<div id=\"errors_box\" class=\"user-error\">".$message."</div>";
	}
	
	static function app_to_the_end ($message, $tag_name) {
		return $message."<".$tag_name.">";
	}
	
	static function app_to_the_begin ($message, $tag_name) {
		return "<".$tag_name.">".$message;
	}
	
	static function xml_decorate ($tag_name, $content) {
		return "<".$tag_name.">".$content."</".$tag_name.">";
	}
}
?>