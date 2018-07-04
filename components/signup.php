
<div class="form-area">
	<form method="POST" action="">
		<div class="group">
			<h2 class="form-heading">Crea una cuenta</h2>
		</div><!--fin group -->
		<div class="group">
			<input type="text" name="full_name" class="control" placeholder="Ingresa Nombre Completo">
		</div><!-- fin group -->
		<div class="group">
			<input type="email" name="email" class="control" placeholder="Ingresa Email">
		</div><!-- fin group -->
		<div class="group">
			<input type="password" name="password" class="control" placeholder="Crea una contraseña">
		</div><!-- fin group -->
		<div class="group">
			<label for="file" id="file-label">
				<i class="fas fa-cloud-upload-alt upload-icon"></i> 
				Elegí una imagen
			</label>
			<input type="file" name="img" class="file" id="file">
		</div><!-- fin group -->
		<div class="group">
			<input type="submit" name="signup" class="btn account-btn" value="Crear Cuenta">
		</div><!-- fin group -->
		<div class="group">
			<a href="login.php" class="link">Ya tienes una cuenta?</a>
		</div><!-- fin group -->
	</form>
</div><!-- fin formulario -->

