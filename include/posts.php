<?php

	require_once 'db_connect.php';

	$qstring = "SELECT `id`, `author_login`, `author_fio`, `message`, `t_date`, `t_time`   FROM `posts` ORDER BY `id` DESC";

	$result = mysql_query($qstring);
	if(mysql_num_rows($result) > 0){ //Если резулбтат запроса не пустой, выводим все
		while($row = mysql_fetch_array($result,MYSQL_ASSOC)){	?> 
				<div class="row">
					<div class="msg col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<b>
									<label>
											<?php echo $row['author_fio'] ;?> <!-- ФИО автора поста -->
									</label>	 
								</b>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="author " id="postauthor">
												
									</div>
								</div>
											
								<div class="row">
									<div class="message pull-left col-lg-12 col-md-10 col-sm-8 col-xs-6" id="postmessage">
											<?php echo $row['message'] ;?> <!-- Содержимое (текст) поста -->
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									</div>
									<div class="date pull-right " id="postdate" >
										<label class=""> <?php echo $row['t_date'].' '.$row['t_time']; ?></label> <!-- Дата время поста -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
				<?php				
		}
	}else{ //Сообщение при отсуствии записей
		?>
		<div class="row">
					<div class="msg col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span id="nocomments"><center><h2><b>Комментарии отсутствуют</b><h2></center></span>
					</div>
				</div>
		<?php
	}		
?>