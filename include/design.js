$(document).ready (function () {
	$('#request_login').click(function(){sendGetRequest("http://test1.ru/MO-centralized-server/handlers/handle_login.php?");});
	$(document).height($(document).height() + "px")
});