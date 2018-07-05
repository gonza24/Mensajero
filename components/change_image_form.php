<div class="form-section">
	<div class="form-grid">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="group">
				<h2 class="form-heading">Cambiar Foto</h2>
			</div><!--fin group -->
			<div class="group">
				<label for="change-image" id="change-image-label"></label>
				<input type="file" name="change_img" id="change-image" class="change-img">
				<div class="name-error error">
					<?php if(isset($error_img_name)): ?>
						<?php echo $error_img_name; ?>
					<?php endif; ?>
				</div>
			</div><!-- fin group -->

			<div class="group">
				<input type="submit" name="change-img" class="btn account-btn" value="Guardar cambios">
			</div><!-- fin group -->
		</form>
	</div><!-- fin form-grid -->
</div><!-- fin form-section -->