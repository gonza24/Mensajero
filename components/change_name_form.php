<div class="form-section">
	<div class="form-grid">
		<form method="POST" action="">
			<div class="group">
				<h2 class="form-heading">Cambiar Nombre</h2>
			</div><!--fin group -->
			<div class="group">
				<input type="text" name="user_name" class="control" placeholder="Nombre" value="<?php 	echo $_SESSION['user_name'] ?>">
			</div><!-- fin group -->

			<div class="group">
				<input type="submit" name="change_name" class="btn account-btn" value="Guardar cambios">
			</div><!-- fin group -->
		</form>
	</div><!-- fin form-grid -->
</div><!-- fin form-section -->