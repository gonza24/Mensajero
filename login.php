<?php include "init.php"; ?>

<?php 
	$obj = new base_class();

	if (isset($_POST['login'])) {
		$email = $obj->security($_POST['email']);
		$password = $obj->security($_POST['password']);
		
		$email_status = $password_status = 1;

		if(empty($email)){
			$email_error = "El Email es requerido";
			$email_status = "";
		}

		if(empty($password)){
			$password_error = "La contraseña es requerida";
			$password_status = "";
		}

		if(!empty($email_status) && !empty($password_status)){
			if($obj->normal_query("SELECT * FROM users WHERE email = ?", [$email])){
				if($obj->count_rows() == 0){
					$email_error = "El Email ingresado es incorrecto";
				}else{
					$row = $obj->single_result();
					$db_email = $row->email;
					$db_password = $row->password;
					$user_id = $row->id;
					$user_name = $row->name;
					$user_image = $row->image;
					$clean_status = $row->clean_status;

					if(password_verify($password, $db_password)){
						$status = 1;
						$obj->normal_query("UPDATE users SET status = ? WHERE id = ?", [$status,$user_id]);

						if($clean_status == 0){
							if($obj->normal_query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1")){
								$last_row = $obj->single_result();
								$last_msg_id = $last_row->msg_id + 1;

								if($obj->normal_query("INSERT INTO clean (clean_message_id, clean_user_id) VALUES (?,?)", [$last_msg_id, $user_id])){
									$update_clean_status = 1;
									$obj->normal_query("UPDATE users SET clean_status = ?  WHERE id = ?", [$update_clean_status, $user_id]);

									$obj->create_session("user_name", $user_name);
									$obj->create_session("user_id", $user_id);
									$obj->create_session("user_image", $user_image);
									header("location:index.php");
								}
							}
						}else{
							$obj->create_session("user_name", $user_name);
							$obj->create_session("user_id", $user_id);
							$obj->create_session("user_image", $user_image);
							header("location:index.php");
						}


						
					}else{
						$password_error = "Ingresa la contraseña correcta";
					}
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
	<title>Crea una nueva cuenta</title>
	<?php include 'components/css.php'; ?>
</head>
<body>
	<?php if(isset($_SESSION['security'])): ?>

		<div class="flash error-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				 <h3><span class="cross">&#x2715;</span>Error! Se ha productido un error!</h3>
			</div>
			<div class="flash-body">
				<p><?php echo $_SESSION['security']; ?></p>
			</div>
		</div>
	<?php endif; ?>
	<?php unset($_SESSION['security']); ?>
	<div class="signup-container">
		
		<div class="account-left">
			<div class="account-text">
				<h1>Charlemos</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor temporibus fugiat incidunt at porro placeat sed nemo.</p>
			</div><!-- fin account-text -->
		</div><!-- fin account-left -->
		
		<div class="account-right">
			<?php include 'components/login_form.php'; ?>
		</div><!-- fin account-right -->

	</div><!-- fin registro-container -->


	<?php include 'components/js.php' ?>
</body>
</html>