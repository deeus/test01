<?php
    header('Content-type: text/html; charset=utf-8');
	session_start();
	//error_reporting(E_ALL);
	include('../include/db_connect.php');
	
    # проверям уникальность полей
	switch ($_POST['action'])  {
		case "login";
		# проверяем, не сущестует ли пользователя с таким логином
		$query = mysql_query("SELECT COUNT(id) FROM `users` WHERE `login`='".mysql_real_escape_string ($_POST['login'])."'");
		$row = mysql_fetch_array($query);
		if($row['COUNT(id)'] > 0){
			echo "on";
		}else{
			echo "off";
		}
		break;
		
		case "email";		
		# проверяем, не сущестует ли пользователя с таким email
		$query = mysql_query("SELECT COUNT(id) FROM `users` WHERE `email`='".mysql_real_escape_string ($_POST['email'])."'");
		$row = mysql_fetch_array($query);
		if($row['COUNT(id)'] > 0){
			echo "on";
		}else{
			echo "off";
		}
		break;
	}

?>