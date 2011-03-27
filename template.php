<?php
//$err = new ErrorHandler ();
//GeneralFunctions::login_handler (&$err);
/*if (!$err->has_errors ()) {
	session_start();
	$_SESSION[user] = $_POST[login_form];
}*/

if (!isset ($_SESSION[user])) {
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
		<div class="leftcoloumn">
<?php
Main::leftcoloumn_content ();
?>
		</div>
		<div class="central">
<?php
Main::central_content ();
?>
		</div>
		<div class="rightcoloumn">
<?php
Main::rightcoloumn_content ();
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