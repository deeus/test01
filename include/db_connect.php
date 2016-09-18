<?php
//error_reporting(E_ALL);
//Подключение к БД
$host="localhost";/*Имя сервера*/
$user="qwe_a";/*Имя пользователя*/
$password="2517";/*Пароль пользователя*/
$db="qwe";/*Имя базы данных*/
mysql_connect($host, $user, $password); /*Подключение к серверу*/
mysql_select_db($db); /*Подключение к базе данных на сервере*/
mysql_query ("set_client='utf8'");
mysql_query ("set character_set_results='utf8'");
mysql_query ("set collation_connection='utf8_general_ci'");
mysql_query ("SET NAMES utf8");
?>