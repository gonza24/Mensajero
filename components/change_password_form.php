<div class="form-section">
	<div class="form-grid">
		
		<form method="POST" action="">
			<div class="group">
				<h2 class="form-heading">Cambiar Contraseña</h2>
			</div><!--fin group -->
			<div class="group">
				<input type="password" name="password_actual" class="control" placeholder="Contraseña Actual">
				<div class="name-error error">
					<?php if(isset($error_password_actual)): ?>
						<?php echo $error_password_actual; ?>
					<?php endif; ?>
				</div>
			</div><!-- fin group -->
			<div class="group">
				<input type="password" name="password_nueva" class="control" placeholder="Nueva Contraseña">
				<div class="name-error error">
					<?php if(isset($error_password_nueva)): ?>
						<?php echo $error_password_nueva; ?>
					<?php endif; ?>
				</div>
			</div><!-- fin group -->
			<div class="group">
				<input type="password" name="password_reescrita" class="control" placeholder="Reescribe la Contraseña">
				<div class="name-error error">
					<?php if(isset($error_password_reescrita)): ?>
						<?php echo $error_password_reescrita; ?>
					<?php endif; ?>
				</div>
			</div><!-- fin group -->

			<div class="group">
				<input type="submit" name="change_password" class="btn account-btn" value="Guardar cambios">
			</div><!-- fin group -->
		</form>
	</div><!-- fin form-grid -->
</div><!-- fin form-section -->