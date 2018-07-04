<?php  

include "init.php";
if(isset($_POST['signup'])){
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$img_name = $_FILES['img']['name'];
	$img_temp = $_FILES['img']['tmp_name'];

	if(empty($full_name)){
		$name_error = "El nombre es requerido";
		$name_status = "";
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
			<?php include 'components/signup.php' ?>
		</div><!-- fin cuenta-derecha -->
	</div><!-- fin registro-container -->

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/file_label.js"></script>
</body>
</html>