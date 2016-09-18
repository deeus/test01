	function resetForm(){ //Очистка формы
		if ($('.form-group').hasClass("has-error")){
			$('.form-group').removeClass("has-error"); //Сброс если ошибка валидации
		};
		if ($('.form-group').hasClass("has-success")){
			$('.form-group').removeClass("has-success"); //Сброс если успех валидации
		};	
		$('#addPost').removeAttr( 'disabled');
		$('.form-horisontal').data('bootstrapValidator').resetForm(); //Сброс валидации
		$('.alert').hide(); //Скрытие активных уведомлений
		$("#responseLoginSpan").empty();
		$("#responseEmailSpan").empty();
	};
	function responseLogin(){ //Проверка на уникальность логина
        var reglogin = document.registerForm.reglogin.value;
		var pattern = /^[a-zA-Z0-9_]{3,16}$/;
		if ( (reglogin.length >= 3)&&(pattern.test(reglogin)) ){
			$.ajax({
				type: "POST",
				url: "./ajax/response.php",
				data: { action: 'login', login: reglogin },
				cache: false,
				success: function(response){	
						if((response == 'on')){
							$("#responseLoginSpan").text("Логин занят").css("color","#A94442");
							$("#reglogin").addClass('has-error');
						}else{
							$("#responseLoginSpan").text("Логин свободен").css("color","#3C763D");
							$("#reglogin").addClass('has-success');
						};	
				}
			});
		}else{
			$("#responseLoginSpan").text("");
		};
    };
    
    function responseEmail(){ //Проверка на уникальность email
        var regemail = document.registerForm.regemail.value;
		var pattern = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
		if (pattern.test(regemail)){		
			$.ajax({
				type: "POST",
				url: "./ajax/response.php",
				data: { action: 'email', email: regemail },
				cache: false,
				success: function(response){
						if((response == 'on')){
							$("#responseEmailSpan").text("E-mail занят").css("color","#A94442");
							$("#regemail").addClass('has-error');
						}else{
							
							$("#responseEmailSpan").text("E-mail свободен").css("color","#3C763D");
							$("#regemail").addClass('has-success');
						};
				}
			});
		}else{
			$("#responseEmailSpan").text("");
		};
    }; 
$( document ).ready(function() {
	//

	$( "#regcountry" ).autocomplete({ //Опережающий ввод с клавиатуры
		source: "/include/search.php",
		minLength: 2
    });

///////////////////REG VALIDATOR
	var RegValidator = $("#registerForm").bootstrapValidator({
		framework: 'bootstrap',
        err: {
            container: 'tooltip',
        },
		icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times ',
            validating: 'fa fa-refresh'
        },
		fields : {
			////FIO////
			regfio : {
			//	message : "Поле ФИО является обязательным!",
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле ФИО",
					}
				}
			},
			////EMAIL////
			regemail : {
			//	message : "Поле E-mail является обязательным!",
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле E-mail",
					},
					regexp: {
                        regexp: /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/,
                        message: 'Не корректный e-mail',
                    },
					emailAddress: {
                        message: ' ',
                    }
				}
			},
			////LOGIN////
			reglogin : {
			//	message : "Поле Логин является обязательным!",
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле Логин",
					},
					regexp: {
                        regexp: /^[a-zA-Z0-9_]{3,16}$/,
                        message: 'Не корректный логин',
                    }
					
				}
			},
			////PASSWORD////
			regpass : {
			//	message : "Поле Пароль является обязательным!",
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле Пароль",
					}
				}
			},
			////COUNTRY////
			regcountry : {
			//	message : "Поле Страна является обязательным!",
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле Страна",
					}
				}
			},
			////PHONE////
			regphone : {
				//message : "Поле Телефон является обязательным!",
				validators: {
                    notEmpty : {
						message : "Пожалуйста, заполните поле Телефон",
					},
					regexp: {
                        regexp: /^\+?[0-9]{11}$/,
                        message: 'Введен не корретный номер телефона',
                    }
                }
				
				
			},
		}
	});
	
///////////////////AUTH VALIDATOR	
	var AuthValidator = $("#authForm").bootstrapValidator({
		fields : {
			////LOGIN////
			login : {
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле Логин",
					}
				}
			},
			////PASS////
			pass : {
				validators : {
					notEmpty : {
						message : "Пожалуйста, заполните поле Пароль",
					}
				}
			},
		}
	});

///////////////////MESSAGE VALIDATOR	
	var MessageValidator = $("#messageForm").bootstrapValidator({
		fields : {
			////TEXT////
			msgtext : {
				message : "Сообщение не может быть пустым!",
				validators : {
					notEmpty : {
						message : "Сообщение не может быть пустым!",
					}
				}
			},
		}
	});	
	
	
////////////////////////////////BUTTONS CLICK///////////////////////////////////	

////////////////////AUTH BUTTON///////////////
	$('#login_button').on('click', function(e){
		var self = this;
			var login = $(this).closest('body').find('input[name="login"]').val();
				pass = $(this).closest('body').find('input[name="pass"]').val();
				login = $.trim(login);
				pass = $.trim(pass);
				if ((login == "") || (pass == "")){
					$('#authForm').data('bootstrapValidator').validate();
				}
				else{			
						$.ajax({
							type:"POST",
							url: '../ajax/login.php' ,
							cache: false, //отключение кэширование страниц
							data: 'login=' + login + '&password=' + pass,
							success: function (data) {											
									jQuery('#response').html(data);
									if (data != 'err'){
										window.location.href = '/index.php'; //редирект на главную
									}
									else{
										$('.alert-danger').fadeIn(500); //сообщение об ошибке
									} 

								}
							});
								
				};	
	//	}
	});
	
////////////////////REG BUTTON///////////////
	$('#add_user_button').on('click', function(e){
			var t_fio = $(this).closest('div').find('input[name="regfio"]').val();
				t_email = $(this).closest('div').find('input[name="regemail"]').val();
				t_login = $(this).closest('div').find('input[name="reglogin"]').val();
				t_password = $(this).closest('div').find('input[name="regpass"]').val();
				t_country = $(this).closest('div').find('input[name="regcountry"]').val();
				t_phone = $(this).closest('div').find('input[name="regphone"]').val();
				t_fio = $.trim(t_fio);
				t_email = $.trim(t_email);
				t_login = $.trim(t_login);
				t_password = $.trim(t_password);
				t_country = $.trim(t_country);
				t_phone = $.trim(t_phone);
				if ((t_fio == "") || (t_login == "") || (t_password == "") || (t_email == "")|| (t_country == "")|| (t_phone == "")){				
					$('.alert-danger').fadeIn(500);//сообщение об ошибке
				}
				else{			
						$.ajax({
							type:"POST",
							url: '../ajax/add_user.php' ,
							cache: false, //отключение кэширование страниц
							data: 't_fio=' + t_fio + '&t_login=' + t_login + '&t_password=' + t_password + '&t_email=' + t_email + '&t_country=' + t_country + '&t_phone=' + t_phone ,
							success: function (data) {
									$('.alert-success').fadeIn(500); //сообщение об успешной регистрации
									$('#add_user_button').removeAttr( 'disabled'); //разблокировка кнопки
									$('#registerForm').data('bootstrapValidator').resetForm();//сброс валидации
									$('#registerForm').trigger( 'reset' );//сброс формы
									$("#responseLoginSpan").empty();
									$("#responseEmailSpan").empty();
								}
							});								
				};	
	});

/////////////ADD POST BUTTON///////////////////
	$('#addPost').on('click', function(e){
	function show_messages(message, author) //Отображение нового сообщения
		{
			$.ajax({
				type:"POST",
				url: "./ajax/show.php",
				cache: false,
				data: 'msgtext=' + message + '&author_fio=' + author,
				success: function(html){
					$(html).prependTo('.newMessageDiv').fadeIn("slow");
					
				}
			});
		}
			var msgtext = $(this).closest('body').find('textarea[name="msgtext"]').val();
				author_login = $(this).closest('body').find('input[name="author_login"]').val();
				author_fio = $(this).closest('body').find('input[name="author_fio"]').val();
				msgtext = $.trim(msgtext);
				if (msgtext == "") {				
					$('#messageForm').data('bootstrapValidator').validate();
					$('#addPost').attr( 'disabled','disabled');
				}
				else{									
						$.ajax({
							type:"POST",
							url: '../ajax/add_post.php' ,
							cache: false, //отключение кэширование страниц
							data: 'msgtext=' + msgtext + '&author_login=' + author_login + '&author_fio=' + author_fio ,
							success: function (data) {
									$('.alert-success').fadeIn(500);
									$('#addPost').removeAttr( 'disabled');
									$('#messageForm').data('bootstrapValidator').resetForm();
									$('#messageForm').trigger( 'reset' );
									show_messages(msgtext, author_fio);
								}
							});			
				};	
	});
});