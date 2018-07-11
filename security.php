<?php if(!isset($_SESSION["user_id"])): ?>
	
	<?php 
		$obj = new base_class;
		$obj->create_session("security", "Primero tienes que loguearte!");

	?>

	<?php header("location:login.php"); ?>
<?php endif; ?>