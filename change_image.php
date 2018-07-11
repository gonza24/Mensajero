<?php include 'init.php' ?>

<?php include 'security.php'; ?>

<?php 
	$obj = new base_class;

	if(isset($_POST['change-img'])){
		$img_name = $_FILES['change_img']['name'];
		$img_tmp = $_FILES['change_img']['tmp_name'];
		$img_path = "assets/img/";
		$extensions = ['png','jpg','jpeg'];
		$img_ext = explode('.', $img_name);
		$img_extension = end($img_ext);

		if(empty($img_name)){
			$error_img_name = "Por favor, elige tu imagen";
		}else if(!in_array($img_extension, $extensions)){
			$error_img_name= "Por favor, elige una extención válida";
		}else{
			$user_id = $_SESSION['user_id'];
			move_uploaded_file($img_tmp, "$img_path"."/"."$img_name");
			if($obj->normal_query("UPDATE users SET image = ? WHERE id = ?",[$img_name, $user_id])){
				$obj->create_session("image_updated", "Tu foto se actualizó exitosamente!");
				$obj->create_session("user_image", $img_name);
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
			<?php include 'components/change_image_form.php'; ?>
		</section><!-- fin right-area -->
	</div><!-- fin chat-container -->

	<?php include 'components/js.php'; ?>

</body>
</html>