<?php 
include "../init.php";

$obj = new base_class;

$user_id = $_SESSION['user_id'];
if(isset($_POST['clean'])){
	if($obj->normal_query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1")){
			$last_row = $obj->single_result();
			$last_msg_id = $last_row->msg_id + 1;

			if($obj->normal_query("UPDATE clean SET clean_message_id = ? WHERE clean_user_id = ?", [$last_msg_id, $user_id])){

				echo json_encode(array("status" => 'clean'));
			}
	}
}