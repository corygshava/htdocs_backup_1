<?php
	$redirectto = "index.php";
	$restricted = "true";
	include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Farmer</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/styles.css">

	<script src="js/bootstrap.bundle.min.js"></script>
	<style>
		.form-container {
			width: 90%;
			max-width: 500px;
			margin: 150px auto;
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
	
	<div class="form-container">
		<h3 class="text-center" style="color: var(--themecolor);">Add New Farmer</h3>
		<hr>
		<form action="actions/add_farmer.php" method="POST">
			<div class="mb-3">
				<label class="form-label">Farmer Name</label>
				<input type="text" name="farmer_name" class="form-control" required placeholder="enter Farmer Name here...">
			</div>
			<div class="mb-3">
				<label class="form-label">ID Number</label>
				<input type="number" name="id_no" class="form-control" required placeholder="enter ID Number here...">
			</div>
			<div class="mb-3">
				<label class="form-label">Password</label>
				<input type="password" name="password" maxlength="28" class="form-control" required placeholder="enter Password here...">
			</div>
			<div class="mb-3">
				<label class="form-label">Location</label>
				<input type="text" name="location" class="form-control" required placeholder="enter Location here...">
			</div>
			<div class="mb-3">
				<label class="form-label">Contact</label>
				<input type="text" name="contact" class="form-control" required placeholder="enter Contact here...">
			</div>
			<button type="submit" class="btn w-100" style="background: var(--themecolor); color: #fff;">Add Farmer</button>
		</form>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>

	
	<?php
		include 'elements/footer.php';
	?>
</body>
</html>
