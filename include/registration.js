	$(function() {
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var firstname = $( "#firstname" ),
			secondname = $( "#secondname" ),
			surname = $( "#surname" ),
			login = $( "#login" ),
			email = $( "#email" ),
			password = $( "#password" ),
			passwordacc = $( "#passwordacc" );
			allFields = $( [] ).add( firstname ).add( secondname ).add( surname ).add( login ).add( email ).add( password ).add( passwordacc ),
			tips = $( ".validateTips" ),
			allok = false;

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Длина содержимого поля \"" + n + "\" должна быть не менее " +
					min + " и не более " + max + " символов." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		function regResponse (data) {
			alert ("Hello!");
			if (!$("errors", responseXML).text()) allok = true;
		}
		
		function checkIdentity (o1, o2, n) {
			if (o1.val() != o2.val()) {
				o2.addClass( "ui-state-error" );
				updateTips ( n );
				return false;
			}
			else {
				return true;
			}
		}
		
		$( "#registration-form" ).dialog({
			draggable: false,
			resizable: false,
			autoOpen: false,
			height: 435,
			width: 570,
			modal: true,
			buttons: {
				"Создать аккаунт": function() {
					var Valid = true;
					allFields.removeClass( "ui-state-error" );

					Valid = Valid && checkLength( login, "Логин", 3, 40 );
					Valid = Valid && checkLength( firstname, "Имя", 1, 40 );
					Valid = Valid && checkLength( surname, "Фамилия", 1, 40 );
					Valid = Valid && checkLength( email, "Email", 6, 80 );
					Valid = Valid && checkLength( password, "Пароль", 5, 40 );

					Valid = Valid && checkRegexp( login, /^[a-zA-Zа-яА-Я]([0-9А-Яа-яA-Za-z_])+$/i, "Имя пользователя может содержать только цифры, знак подчеркивания, или символы латинского или русского алфавитов, и не может начинаться с цифры." );
					
					Valid = Valid && checkRegexp( email, /\b[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}\b/, "пример: user@tsu.ru" );
					Valid = Valid && checkRegexp( firstname, /^([^0-9])+$/, "Поле \"Имя\" не дожно содержать цифр.");
					Valid = Valid && checkRegexp( surname, /^([^0-9])+$/, "Поле \"Фамилия\" не дожно содержать цифр.");
					Valid = Valid && checkRegexp( secondname, /^([^0-9])+$/, "Поле \"Отчество\" не дожно содержать цифр.");
					Valid = Valid && checkIdentity (password, passwordacc, "Содержимое полей \"Пароль\" и \"Подтверждение пароля\" должно совпадать.");

					if ( Valid ) {
						$.post("./handlers/handle_registration.php", {
							rlogin: login.val(),
							rfirstname: firstname.val(),
							rsecondname: secondname.val(),
							rsurname: surname.val(),
							remail: email.val(),
							rpassword: $.sha1(password.val())},
						function(data){regResponse(data);}, 'xml');
						// доделать чекинг
						$( this ).dialog( "close" );
					}
				},
				'Отмена': function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});

		$( "#register" )
			.click(function() {
				$( "#registration-form" ).dialog( "open" );
			});
	});