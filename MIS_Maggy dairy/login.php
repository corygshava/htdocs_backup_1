<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/common.css">
	<style>
		body{
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			background: #f8f9fa;
		}
		.login-box {
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
	<div class="login-box">
		<h3 class="text-center" style="color: var(--themecolor);">Login</h3>
		<form action="actions/handlelogin.php" method="post">
			<div class="mb-3">
				<label class="form-label">Role</label>
				<select class="form-select" name="userrole" required>
					<option value="" disabled selected>-- Select Role --</option>
					<option value="admin">Admin</option>
					<option value="farmer">Farmer</option>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label" for="Username">Username / id number</label>
				<input type="text" class="form-control" name="Username" placeholder="enter Username or id number here ..." required>
			</div>
			<div class="mb-3">
				<label class="form-label" for="Password">Password</label>
				<input type="password" class="form-control" name="Password" placeholder="enter Password here ..." required>
			</div>
			<button type="submit" class="btn w-100 hoverfx1" style="background: var(--themecolor); color: #fff;">Login</button>
		</form>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>

	
	<?php
		include 'elements/footer.php';
	?>
</body>
</html>
