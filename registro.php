<?php  

include "init.php";
$obj = new base_class();
if(isset($_POST['signup'])){
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$img_name = $_FILES['img']['name'];
	$img_temp = $_FILES['img']['tmp_name'];
$name_status = $email_status = $password_status = $photo_status = 1;

	if(empty($full_name)){
		$name_error = "El nombre es requerido";
		$name_status = "";
	}

	if(empty($email)){
		$email_error = "El email es requerido";
		$email_status = "";
	}else {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email_error = "El formato del email es invalido";
		}else{
			if($obj->normal_query("SELECT email FROM users WHERE email = ?", array($email))){
				if($obj->Count_Rows() == 0){
					//se registra
				}else{
					$email_error = "El email ya existe";
					$email_status = "";
				}
			}
		}
	}

	if(empty($password)){
		$password_error = "La contraseña es requerido";
		$password_status = "";
	}else if(strlen($password) < 5 ){
 		$password_error = "La contraseña es corta";
		$password_status = "";
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
	<div class="signup-container">
		
		<div class="account-left">
			<div class="account-text">
				<h1>Charlemos</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor temporibus fugiat incidunt at porro placeat sed nemo.</p>
			</div><!-- fin account-text -->
		</div><!-- fin account-left -->

		<div class="account-right">
			<?php include 'components/signup_form.php' ?>
		</div><!-- fin cuenta-derecha -->
	</div><!-- fin registro-container -->

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/file_label.js"></script>
</body>
</html>