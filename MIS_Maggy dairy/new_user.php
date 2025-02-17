<?php
	$redirectto = "index.php";
	$restricted = "true";
	include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>New User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/styles.css">

	<script src="js/bootstrap.bundle.min.js"></script>
	<style>
		.form-container {
			width: 100%;
			max-width: 400px;
			background: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
	</style>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>
	
	<div class="center-container">
		<div class="form-container">
			<h3 class="text-center" style="color: var(--themecolor);">New User</h3>
			<hr>
			<form action="actions/add_user.php" method="POST">
				<div class="mb-3">
					<label class="form-label">Username</label>
					<input type="text" name="username" class="form-control" placeholder="enter Username here..." required>
				</div>
				<div class="mb-3">
					<label class="form-label">Password</label>
					<input type="password" name="password" class="form-control" placeholder="enter Password here..." required>
				</div>
				<button type="submit" class="btn w-100" style="background: var(--themecolor); color: #fff;">Add User</button>
			</form>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
	<?php
		include 'elements/footer.php';
	?>
</body>
</html>
