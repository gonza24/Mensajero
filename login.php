<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Crea una nueva cuenta</title>
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css"></link>
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css"></link>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,900" rel="stylesheet">
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
			<div class="form-area">
				<form method="POST" action="">
					<div class="group">
						<h2 class="form-heading">Login</h2>
					</div><!--fin group -->
					<div class="group">
						<input type="email" name="email" class="control" placeholder="Ingresa Email">
					</div><!-- fin group -->
					<div class="group">
						<input type="password" name="password" class="control" placeholder="Crea una contraseña">
					</div><!-- fin group -->
					<div class="group">
						<input type="submit" name="login" class="btn account-btn" value="Ingresar">
					</div><!-- fin group -->
					<div class="group">
						<a href="registro.php" class="link">Crear una nueva cuenta?</a>
					</div><!-- fin group -->
				</form>
			</div><!-- fin formulario -->
		</div><!-- fin cuenta-derecha -->

	</div><!-- fin registro-container -->


	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/file_label.js"></script>
</body>
</html>