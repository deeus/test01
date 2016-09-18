<?php
	session_start(); 
	//Выход и уничтожение сессии
	unset($_SESSION['user_id'], $_SESSION['user_role'], $_SESSION['user_fio']); 
	session_destroy();
?>