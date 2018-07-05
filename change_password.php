<?php include 'init.php'; ?>

<?php 

$obj = new base_class;

if(isset($_POST['change_password'])){
	$password_actual = $obj->security($_POST["password_actual"]);
	$password_nueva = $obj->security($_POST["password_nueva"]);
	$password_reescrita = $obj->security($_POST["password_reescrita"]);

	$actual_status = $nueva_status = $reescrita_status = 1;

	if(empty($password_actual)){
		$error_password_actual = "La contraseña actual es requerida";
		$actual_status = "";
	}

	if(empty($password_nueva)){
		$error_password_nueva = "La contraseña nueva es requerida";
		$actual_status = "";
	}elseif (strlen($password_nueva) < 5) {
		$error_password_nueva = "La contraseña es corta";
		$actual_status = "";
	}

	if(empty($password_reescrita)){
		$error_password_reescrita = "La contraseña nueva es requerida";
		$reescrita_status = "";
	}else if($password_nueva != $password_reescrita){
		$error_password_reescrita = "No coincide la contraseña nueva";
		$reescrita_status = "";
	}

	if(!empty($actual_status) && !empty($nueva_status) && !empty($reescrita_status)){

		$user_id = $_SESSION["user_id"];
		if($obj->normal_query("SELECT password FROM users WHERE id = ?",[$user_id])){
			$row = $obj->single_result();
			$db_password = $row->password;

			if(password_verify($password_actual, $db_password)){
				if($obj->normal_query("UPDATE users SET password = ? WHERE id = ?", [password_hash($password_nueva, PASSWORD_DEFAULT),$user_id])){
					
					$obj->create_session("password_updated", "Tu contraseña se actualizó con exito!");
					header("location:index.php");				}
			}else{
				$error_password_actual = "Ingresa la contraseña correcta";
				$actual_status = "";
			}
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
			<?php include 'components/change_password_form.php'; ?>
		</section><!-- fin right-area -->
	</div><!-- fin chat-container -->

	<?php include 'components/js.php'; ?>
</body>
</html>