<?php
	header('Content-type: text/html; charset=utf-8');
	session_start();
	//error_reporting(E_ALL);
	
	//$user_name = 'admin';
	include('../include/db_connect.php');
	
	if (isset($_POST['login']) && isset($_POST['password']))
	{
		$login = $_POST['login'];
		$password = $_POST['password'];

		// делаем запрос к БД
		// и ищем юзера с таким логином и паролем

		$query = "SELECT `id`, `login`, `password`, `fio`
				FROM `users`
				WHERE `login`='{$login}' AND `password`='{$password}'
				";
		$sql = mysql_query($query) or die(mysql_error());
		
		// если такой пользователь нашелся
		if (mysql_num_rows($sql) == 1) {
			// то мы ставим об этом метку в сессии (допустим мы будем ставить ID пользователя)

			$row = mysql_fetch_assoc($sql);
			
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_login'] = $row['login'];
			$_SESSION['user_fio'] = $row['fio'];
			print_r('1');
			//print_r($_SESSION['user_fio']);
		}
		else {
			print_r('err');

		}
	}

?>