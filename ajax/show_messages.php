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

		$messages_row = $obj->fetch_all();

		foreach($messages_row as $informations):

			echo $informations->message,"</br>";

		endforeach;			
	}
}