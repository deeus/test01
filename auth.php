<?php
	header('Content-type: text/html; charset=utf-8');
	session_start();
	//error_reporting(E_ALL);
	include('include/db_connect.php');//подкл к БД
	
	if (isset($_GET['action'])){
		if($_GET['action'] == "logout"){
				
				session_unset();
				session_destroy(); // разрушаем сессию 

			}
		};
	if (!isset($_SESSION['user_login'])) {	 //Проверка на доступ к странице
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Стена сообщений - Вход</title>
		
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="bootstrapValidator.min.css">
		
		<link rel="stylesheet" href="mystyles.css">
	</head>
	<body>
	<!-- подкл Меню сайта -->
	<?php
		require_once 'include/head.php';
	?>

		<div class="container">
			<!-- main div -->
			<div class="row">
				<div class="container">
					<div class="container">
					<!-- Место для заголовка страницы -->	
					</div>
				</div>
				
					<div class="container">
						<div class="row ">
							<div class="col-lg-3 col-md-3 col-sm-2 hidden-xs">
							</div>
							<div class="col-lg-6 col-md-6 col-sm-8 col-sx-12">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4><b>Авторизация</b></h4>
									</div>
									<div class="panel-body">
										<!-- Сообщение об ошибке -->
										<div class="alert alert-danger alert-dismissible collapse"  role="alert" id="authMessage">
											<button class="close" type="button" onclick="$('.alert').hide()">
												<span  >&times;</span>
											</button>
											<strong>Ошибка!</strong> Вход в систему с указанными данными невозможен.
										</div>
										<!-- Форма авторизации -->
										<form class="form-horisontal" id="authForm" method="POST" onSubmit="return false;">
										<div class="form-group ">
											<label class=" control-label" for="login">Логин</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
												<input name="login" id="login" class="form-control " type="text" placeholder="Логин" value="">
											</div>	
										</div>
										<div class="form-group ">	
											<label class=" control-label" for="pass">Пароль</label>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
												<input name="pass" id="pass" class="form-control " type="password" placeholder="Пароль" value="">
											</div>
										</div>								
										<button type="submit"   id="login_button" class="btn btn-primary">
											<i class="fa fa-sign-in"></i> ВОЙТИ
										</button>
										<button class="btn btn-default " type="reset" onClick="resetForm();">
													<i class="fa fa-times"></i> Очистить
										</button>
									</form>
									</div>
								</div>	
							</div>
							<div class="col-lg-3 col-md-3 col-sm-2 hidden-xs">
							</div>
						</div>
					</div>	
					<hr>		
			</div>
			<!-- main block -->	
		</div>
	
		<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<script src="js/maskedinput.min.js"></script>
		
		<script src="js/bootstrapValidator.min.js"></script>
		
		<script src="js/main.js"></script>
	</body>
</html>
<?php
	}
	else{
		die(header("Location: index.php")); //Редирект на главную, если нет доступа
	};
?>