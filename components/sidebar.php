<section id="sidebar">
	<ul class="left-ul">
		<li><a href="javascript:void(0);"><span class="profile-img-span"><img src="assets/img/<?php echo $_SESSION['user_image']; ?>" alt="Imagen de perfíl" class="profile-img"></span></a></li>
		<li><a href="index.php"><?php echo ucwords($_SESSION["user_name"]); ?> <span class="cool-hover"></span></a></li>
		<li><a href="change_name.php">Cambiar Nombre <span class="cool-hover"></span></a></li>
		<li><a href="change_password.php">Cambiar Contraseña <span class="cool-hover"></span></a></li>
		<li><a href="change_image.php">Cambiar Foto <span class="cool-hover"></span></a></li>
		<li><a href="#">En linea: <span class="online_users"></span> usuarios<span class="cool-hover"></span></a></li>
		<li><a href="javascript:void(0);" class="clean">Borrar historial<span class="cool-hover"></span></a></li>
		<li><a href="logout.php">Salir<span class="cool-hover"></span></a></li>
	</ul>
</section><!-- fin sidebar -->