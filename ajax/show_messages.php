<?php 

include "../init.php";

$obj = new base_class;

if(isset($_GET['message'])){
	$user_id = $_SESSION['user_id'];
	if($obj->normal_query("SELECT clean_message_id FROM clean WHERE clean_user_id = ?", [$user_id])){
		$last_msg_row = $obj->single_result();
		$last_msg_id = $last_msg_row->clean_message_id;

		$obj->normal_query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1");
		$msg_row = $obj->single_result();
		$msg_table_id = $msg_row->msg_id;
		
		$obj->normal_query("SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id WHERE messages.msg_id BETWEEN $last_msg_id AND $msg_table_id ORDER BY messages.msg_id ASC");

		if($obj->count_rows() == 0){
			echo "Empieza la conversación!";
		}else{
			$messages_row = $obj->fetch_all();

			foreach($messages_row as $informations):

				$full_name 		= ucwords($informations->name);
				$user_image 	= $informations->image;
				$user_status 	= $informations->status;

				$message 	= $informations->message;
				$msg_type 	= $informations->msg_type;
				$db_user_id 	= $informations->user_id;
				$msg_time	= $informations->msg_time;

				if($user_status == 0){
					$user_online_status = '<span class="offline-icon"></span>';
				}else{
					$user_online_status = '<span class="online-icon"></span>';
				}

				if($user_id == $db_user_id){
					//mensaje del lado derecho
					
					if($msg_type == "text"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-msg">
									'.$message.'
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<img src="assets/img/'.$message.'" class="common-images">
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "PNG" || $msg_type == "png"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<img src="assets/img/'.$message.'" class="common-images">
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "zip" || $msg_type == "ZIP"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down files-common"></i>'.$message.'</a>
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "PDF" || $msg_type == "pdf"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-pdf files-common pdf"></i>'.$message.'</a>
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "emoji"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<img src="'.$message.'" class="animated-emoji">
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "docx"){
						
						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-word files-common word"></i>'.$message.'</a>
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}else if($msg_type == "xlsx"){

						echo '
						<div class="right-messages common-margin">
							<div class="right-msg-area">
								<span class="date-time right-time right-message-time">
									Hace 1 día
								</span><!-- fin date-time -->
								<div class="right-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-excel files-common excel"></i>'.$message.'</a>
								</div>
							</div><!-- fin right-msg-area -->
						</div><!-- fin right-messages -->
						';

					}

				}else{
					//mensaje del lado izquierdo
					
					if($msg_type == "text"){

						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-msg">
									<p>'.$message.'</p>
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg"){

						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<img src="assets/img/'.$message.'" class="common-images">
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "PNG" || $msg_type == "png"){
						
						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<img src="assets/img/'.$message.'" class="common-images">
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "zip" || $msg_type == "ZIP"){
						
						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down files-common"></i>'.$message.'</a>
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "PDF" || $msg_type == "pdf"){

						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-pdf files-common pdf"></i>'.$message.'</a>
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "emoji"){

						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<img src="'.$message.'" class="animated-emoji">
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "docx"){

						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="fas fa-file-word word files-common word"></i>'.$message.'</a>
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}else if($msg_type == "xlsx"){

						echo '
						<div class="left-message common-margin">
							<div class="sender-img-block">
								<img src="assets/img/'.$user_image.'" class="sender-img">
								'.$user_online_status.'
							</div><!-- fin sender-img-block -->
							<div class="left-msg-area">
								<div class="user-name-date">
									<span class="sender-name">
										'.$full_name.'
									</span><!-- fin sender-name -->
									<span class="date-time">
										Hace 1 día
									</span><!-- fin date-time -->
								</div><!-- fin user-name-date -->
								<div class="left-files">
									<a href="assets/img/'.$message.'" class="all-files"><i class="far fa-file-excel files-common excel"></i>'.$message.'</a>
								</div><!-- fin left-msg -->
							</div><!-- fin left-msg-area -->
						</div><!-- fin left-message -->
						';

					}
				}

			endforeach;		
		}

		

			
	}
}