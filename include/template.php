<?php
$err = new ErrorHandler ();
$db_manager->query_exec ("DELETE FROM `Sessions` WHERE `SessionDie` < NOW()");
if (!isset($_COOKIE['mo_session_token']) || ($_COOKIE['mo_session_token'] != $db_manager->get_attribute_string_list ("ID", "Sessions", "`ID` = '".mysql_real_escape_string($_COOKIE['mo_session_token'])."'"))) {
	$content_maker->login_content ();
	$content_maker->error_content ();
}
else {
?>
<div class="mainframe">
	<div class="toppart">
		<div class="header">
<?php
Main::header_content ();
?>
		</div>
		<div class="hornavbar">
<?php
Main::hornavbar_content ();
?>
		</div>
	</div>
	<div class="middlepart">
		<div class="rightcoloumn">
<?php
Main::rightcoloumn_content ();
?>
		</div>
		<div class="central">
<?php
Main::central_content ();
?>
		</div>
	</div>
	<div class="bottompart">
		<div class="footer">
<?php
Main::footer_content ();
?>
		</div>
	</div>
</div>
<?
}