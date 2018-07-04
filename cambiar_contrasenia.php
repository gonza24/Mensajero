<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css"></link>
	<link rel="stylesheet" type="text/css" href="assets/css/estilos.css"></link>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,900" rel="stylesheet">
</head>
<body>
	<nav id="nav">
		NAV
	</nav>

	<div class="chat-container">
		<section id="sidebar">
			<ul class="left-ul">
				<li><a href="#"><span class="profile-img-span"><img src="assets/img/imgperfil.png" alt="Imagen de perfíl" class="profile-img"></span></a></li>
				<li><a href="#">Gonza Diber <span class="cool-hover"></span></a></li>
				<li><a href="#">Cambiar Nombre <span class="cool-hover"></span></a></li>
				<li><a href="#">Cambiar Contraseña <span class="cool-hover"></span></a></li>
				<li><a href="#">110 Usuarios en Linea <span class="cool-hover"></span></a></li>
			</ul>
		</section><!-- fin sidebar -->
		<section id="right-area">
			<div class="form-section">
				<div class="form-grid">
					<form method="POST" action="">
						<div class="group">
							<h2 class="form-heading">Cambiar Contraseña</h2>
						</div><!--fin group -->
						<div class="group">
							<input type="password" name="password_actual" class="control" placeholder="Contraseña Actual">
						</div><!-- fin group -->
						<div class="group">
							<input type="password" name="password_nueva" class="control" placeholder="Nueva Contraseña">
						</div><!-- fin group -->
						<div class="group">
							<input type="password" name="password_nueva_reescrita" class="control" placeholder="Reescribe la Contraseña">
						</div><!-- fin group -->
						
						<div class="group">
							<input type="submit" name="cambiar_contrasenia" class="btn account-btn" value="Guardar cambios">
						</div><!-- fin group -->
					</form>
				</div><!-- fin form-grid -->
			</div><!-- fin form-section -->
		</section><!-- fin right-area -->
	</div><!-- fin chat-container -->

</body>
</html>