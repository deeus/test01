<?php
	//Отображение нового сообщения (обработчик)
header('Content-type: text/html; charset=utf-8');
include('../include/db_connect.php');
//	$author_login = $_POST['author_login'];
	$author_fio = $_POST['author_fio'];
	$message = $_POST['msgtext'];
	$t_date = date("Y-m-d", time());
	$t_time = date("H:i:s", time());

?>
					<div class="row newmessage" >
							<div class="msg col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="panel panel-primary">
								<div class="panel-heading">
									<b>
										<label>
										<?php echo $author_fio; ?>
										</label>	
										<span class="label label-info">Новое</span>
									</b>
								</div>
								<div class="panel-body">
									<div class="row">
									<div class="author " id="postauthor">
										
									</div>
									</div>
									
									<div class="row">
									<div class="message pull-left col-lg-12 col-md-10 col-sm-8 col-xs-6" id="postmessage">
										<?php echo $message; ?>
									</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"></div>
										<div class="date pull-right " id="postdate" >
											<label class=""><?php echo $t_date.' '.$t_time; ?></label>
											<?php
												//echo $author;
											?>
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>