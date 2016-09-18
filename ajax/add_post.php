<?php
    header('Content-type: text/html; charset=utf-8');
	session_start();
	//error_reporting(E_ALL);
	include('../include/db_connect.php');
	
//Добавление комментария(поста)
    if ( (isset($_POST['author_login'])) && (isset($_POST['author_fio'])) && (isset($_POST['msgtext'])) ) //Проверка на существование переменных
    {
		$author_login = $_POST['author_login']; 
		$author_fio = $_POST['author_fio'];
		$message = $_POST['msgtext'];
		$t_date = date("Y-m-d", time());
		$t_time = date("H:i:s", time());

        mysql_query("INSERT INTO `posts` (
				`author_login`,
				`author_fio`,
				`message`,
				`t_date`,
				`t_time`
			) VALUES(
				'".$author_login."',
				'".$author_fio."',
				'".$message."',
				'".$t_date."',
				'".$t_time."'
			)");

    }
    else
    {
        
            print $err;
       
    }

?>