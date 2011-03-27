function sendGetRequest (url_address) {
	$.get(url_address, {
		login_field: $('.login-form').fieldValue()[0],
		password_field: $.sha1($('.password-form').fieldValue()[0])
	},
	function(data){handleResponse(data);}, 'xml');
}

function sendPostRequest (url_address, tag, id) {
	$.post(url_address, {}, function(data){handleResponse(data);});
}  
  
function handleResponse (responseXML) {
    $('#errors_box').html($("errors", responseXML).text());
}
 
$(document).ready (function () {
	$('#request_login').click(function(){sendGetRequest("http://test1.ru/MO-centralized-server/handlers/handle_login.php?page_request");});
});