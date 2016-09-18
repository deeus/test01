<?php
	//error_reporting(E_ALL);

?>
<!-- navigation -->
		<div class="container">
			<div class="row nav-ul-div   col-lg col-md col-sm col-xs">
				<div class="navbar navbar-default">			
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav_menu">
								<span class="sr-only">МЕНЮ</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php"><i class="fa fa-comments-o  fa-lg"></i>СТЕНА СООБЩЕНИЙ</a>
						</div>
							
						<div class="collapse navbar-collapse" id="nav_menu">
							<ul class="nav navbar-nav nav-pills">
								<li>
									<a href="index.php">Главная</a>
								</li>
								<?php
									if (!isset($_SESSION['user_login'])) {
								?>
								<li><a href="/auth.php">Авторизация</a></li>
								<li><a href="/reg.php">Регистрация</a></li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
				</div>
				
			</div>
		
		</div>
<!-- navigation -->