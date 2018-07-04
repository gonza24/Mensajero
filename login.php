<?php include 'init.php'; ?>

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
			<?php include 'components/login_form.php'; ?>
		</div><!-- fin account-right -->

	</div><!-- fin registro-container -->


	<?php include 'components/js.php' ?>
</body>
</html>