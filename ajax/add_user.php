<?php
    header('Content-type: text/html; charset=utf-8');
	session_start();
	//error_reporting(E_ALL);
	include('../include/db_connect.php');
	
    # Если переменные существуют, то добавляем в БД нового пользователя
    if((isset($_POST['t_fio'])) && (isset($_POST['t_email'])) && (isset($_POST['t_login'])) && (isset($_POST['t_password'])) && (isset($_POST['t_country'])) && (isset($_POST['t_phone'])) )
    {
		$t_fio = $_POST['t_fio'];
		$t_email = $_POST['t_email'];
        $t_login = $_POST['t_login'];
		$t_password = $_POST['t_password'];
		$t_country = $_POST['t_country'];
		$t_phone = $_POST['t_phone'];

        mysql_query("INSERT INTO `users` (
				fio,
				login,
				password,
				country,
				email,
				phone
			) VALUES(
				'".$t_fio."',
				'".$t_login."',
				'".$t_password."',
				'".$t_country."',
				'".$t_email."',
				'".$t_phone."'
			)");
    }
    else
    {
        
        print_r($err);
       
    }

?>