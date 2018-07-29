<?php 
	include 'init.php';
?>

<?php if(!isset($_SESSION['user_id'])): ?>
	<?php header("location:login.php") ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Home</title>
	<?php include 'components/css.php'; ?>
</head>
<body>
	
	<?php if(isset($_SESSION['loader'])): ?>
		<div class="loader-area">
			<div class="loader">
				<div class="loader-item">
				
				</div><!-- fin loader-item -->
			</div><!-- fin loader -->
		</div><!-- fin loader-area -->
	<?php endif; ?>
	<?php unset($_SESSION['loader']); ?>

<!-------------MENSAJE FLASH CAMBIO DE CONTRASEÑA------------>
	<?php if(isset($_SESSION['password_updated'])): ?>
		<div class="flash success-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Exito: Tu lo has hecho!</h3>
			</div><!-- fin flash-heading -->
			<div class="flash-body">
				<p><?php echo $_SESSION['password_updated']; ?></p>
			</div><!-- fin flash-body -->
		</div><!-- fin flash -->
	<?php endif; ?>
	<?php unset($_SESSION['password_updated']); ?>

	
<!--------------MENSAJE FLASH CAMBIO DE NOMBRE--------------->
	<?php if(isset($_SESSION['name_updated'])): ?>
		<div class="flash success-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Exito: Tu lo has hecho!</h3>
			</div><!-- fin flash-heading -->
			<div class="flash-body">
				<p><?php echo $_SESSION['name_updated']; ?></p>
			</div><!-- fin flash-body -->
		</div><!-- fin flash -->
	<?php endif; ?>
	<?php unset($_SESSION['name_updated']); ?>

<!--------------MENSAJE FLASH CAMBIO DE FOTO------------>
	<?php if(isset($_SESSION['image_updated'])): ?>
		<div class="flash success-flash">
			<span class="remove">&times;</span>
			<div class="flash-heading">
				<h3><span class="checked">&#10004;</span>Éxito!</h3>
			</div><!-- fin flash-heading -->
			<div class="flash-body">
				<p><?php echo $_SESSION['image_updated']; ?></p>
			</div><!-- fin flash-body -->
		</div><!-- fin flash -->
	<?php endif; ?>
	<?php unset($_SESSION['image_updated']); ?>

	<?php include 'components/nav.php'; ?>

	<div class="chat-container">
		<?php include 'components/sidebar.php'; ?>
		<section id="right-area">
			<?php include 'components/messages.php'; ?>

			<?php include 'components/chat_form.php'; ?>

			<?php include 'components/emoji.php'; ?>
		</section><!-- fin right-area -->
	</div><!-- fin chat-container -->

<?php include 'components/js.php'; ?>
<script>
	$(document).ready(function(){
		$(".loader-area").show();
		setTimeout(function(){
			$(".loader-area").hide();
		},2000)
	})
</script>
</body>
</html>