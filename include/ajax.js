function sendGetRequest (url_address) {
	$.get(url_address, {
		login_field: $('.login-form').val(),
		password_field: $.sha1($('.password-form').val()),
		remember: $('.remember:checked').val()
	},
	function(data){handleResponse(data);}, 'xml');
}

function sendPostRequest (url_address, tag, id) {
	$.post(url_address, {}, function(data){handleResponse(data);});
}  
  
function handleResponse (responseXML) {
	if (!$("errors", responseXML).text()) location.replace("index.php");
    $('#errors_box').html($("errors", responseXML).text().replace("\n", "<br>"));
	
}

$(document).ready (function () {
	$('#request_login').click(function(){sendGetRequest("http://test1.ru/MO-centralized-server/handlers/handle_login.php?");});
});