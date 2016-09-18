<?php
	header('Content-type: text/html; charset=utf-8');
	session_start();
	//error_reporting(E_ALL);
	include('include/db_connect.php');
	
	if (isset($_GET['action'])){
		if($_GET['action'] == "logout"){
				
				session_unset();
				session_destroy(); // разрушаем сессию 

			}
		};
	if (isset($_SESSION['user_id'])) {
		$user_login=$_SESSION['user_login'];
		$user_fio=$_SESSION['user_fio'];
	}

?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Стена сообщений - Главная</title>
		
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

		<link rel="stylesheet" href="bootstrapValidator.min.css">
		
		<link rel="stylesheet" href="mystyles.css">
	</head>
	<body>
		
		
	<?php
		require_once 'include/head.php';
	?>

		<!-- main div -->
		<div class="container">
			<!-- main blocks -->
			<div class="row">	
				<div class="container">
					<div class="container">
						
					</div>
				</div>
				
				<!-- user block up -->
	<?php
		if (isset($_SESSION['user_login'])) {
	?>				
					<div class="container ">
						<div class="row">
							<div class="hidden-lg hidden-md hidden-sm  col-xs-12">
								<div class="panel panel-default" >
									<div class="panel-heading">
										<b>Учетная запись</b>
									</div>
									<div class="panel-body">
									
											<div class="username " id="username">
												<label>
												<?php
													echo $user_fio;
												?>
												</label>
											</div>	
											<div class="row">
											</br>
											</div>
											<div class="exitbutton " id="exitbutton">
												<a class="btn btn-primary " href="?action=logout">
														<i class="fa fa-sign-out "></i> Выйти
												</a>
											</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>	
	<?php
		}
	?>				
				<!-- user block up -->

				<!-- up form block -->
					<div class="container ">
	<?php
		if (isset($_SESSION['user_login'])) {
	?>						
						<div class="row">
				
							<div class="msg col-lg-8 col-md-8 col-sm-8 col-xs-12">
								<div class="panel panel-default">
								<div class="panel-heading">
									<b>Сообшение</b>
								</div>
								<div class="panel-body">
									<!-- Сообщение об успешной  отправке -->
									<div class="alert alert-success alert-dismissible collapse" role="success" id="authMessage">
										<button class="close" type="button" onclick="$('.alert').hide();">
											<span>&times;</span>
										</button>
										<strong>Сообщение отправлено!</strong>
									</div>
									<form class="form-horisontal " id="messageForm" method="POST" onSubmit="return false;">
										
										<div class="form-group ">	
											<textarea id="msgtext" name="msgtext" class="textmsg form-control" rows="3"></textarea>
											<input type="hidden" name="author_fio" value="<?php echo $user_fio; ?>">
											<input type="hidden" name="author_login" value="<?php echo $user_login; ?>">
										</div>
										<div class="row">
										</div>
										<div class="sendbutton " id="sendbutton">
											
											<button id="addPost" name="addPost" class="btn btn-primary " type="submit" >
												<i class="fa fa-check"></i> Отправить
											</button>
											<button class="btn btn-default " type="reset" onClick="resetForm();">
												<i class="fa fa-times"></i> Очистить
											</button>
										</div>
										
									</form>
								</div>
								</div>
							</div>
							
							<div class="usr col-lg-4 col-md-4 col-sm-4 hidden-xs">
							<!--  -->	
								<div class="panel panel-default" >
									<div class="panel-heading">
										<b>Учетная запись</b>
									</div>
									<div class="panel-body">
									
											<div class="username " id="username">
												<label>
												<?php
													 echo $user_fio;
												?>
												</label>
											</div>	
											<div class="row">
												</br>
											</div>
											<div class="exitbutton " id="exitbutton">
												<a class="btn btn-primary " href="?action=logout">
														<i class="fa fa-sign-out"></i> Выйти
												</a>
											</div>
										
									</div>
								</div>
							</div>
						</div>
						<hr>
	<?php
		}
	?>						
						
						<!-- Вывод постов -->
						<div class="newMessageDiv">
							
						</div>
						<?php	require_once 'include/posts.php'; ?>
						
						
					</div>
			<!-- main block -->	
			<hr>
			
			</div>
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
/*
		}
else {
    //die(header("Location: auth.php"));
	//header("Location: auth.php");
	
	}
	*/
?>