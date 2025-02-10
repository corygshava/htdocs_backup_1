<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">

	<title>User login</title>
</head>
<body>
	<div class="content">
		<div class="formguy">
			<form class="f1" action="actions/handlelogin.php" method="post">
				<h2 class="w3-center">Login</h2>
				<div class="w3-col">
					<label>Username</label>
					<input name="uname" type="text" class="w3-input w3-border" placeholder="enter Username here..." required>
					<label>Password</label>
					<input name="upass" type="password" class="w3-input w3-border" placeholder="enter Password here..." required>
					<div class="w3-center">
						<button class="themehover w3-black btn w3-margin-top" style="width: 30%;">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	
	<?php
		include 'elements/footer.php';
	?>
</body>
</html>
