<?php include 'init.php' ?>
<?php 
	$obj = new base_class;

	if(isset($_POST['change_name'])){
		$user_name = $obj->security($_POST['user_name']);
		$user_id = $_SESSION['user_id'];
		if(empty($user_name)){
			$error_user_name = "El nombre es requerido";
		}
		else{
			if($obj->normal_query("UPDATE users SET name = ? WHERE id = ?", [$user_name, $user_id])){
				$obj->create_session("user_name", $user_name);
				$obj->create_session("name_updated", "Tu nombre se actualizó exitosamente!");
				header("location:index.php");
			}
		}
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>
	<?php include 'components/css.php'; ?>
</head>
<body>
	<?php include 'components/nav.php'; ?>

	<div class="chat-container">
		<?php include 'components/sidebar.php'; ?>
		<section id="right-area">
			<?php include 'components/change_name_form.php'; ?>
		</section><!-- fin right-area -->
	</div><!-- fin chat-container -->

	<?php include 'components/js.php'; ?>

</body>
</html>