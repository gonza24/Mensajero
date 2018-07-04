<div class="form-area">

	<?php if(isset($_SESSION["account_success"])): ?>
			<div class="alert alert-success">
				 <?php echo $_SESSION["account_success"]; ?>
			</div><!-- fin alert-success -->
		<?php endif; ?>
		<?php unset($_SESSION["account_success"]); ?>

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