<?php
	include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">

	<script src="js/SuperScript.js"></script>
	<script src="js/toappend.js"></script>
	<script src="js/app.js"></script>

	<title>Add new user</title>
</head>
<body>

	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="formguy">
			<form class="f1" method="post" action="actions/add_user.php">
				<h2 class="w3-center">Add new user</h2>
				<div class="w3-col">
					<label>Username</label>
					<input type="text" class="w3-input w3-border" placeholder="enter Username here..." name="username" required>
					<label>Password</label>
					<input type="password" class="w3-input w3-border" placeholder="enter Password here..." name="password" required>
					<div class="w3-center">
						<button class="themehover w3-black btn w3-margin-top" style="width: 30%;"><i class="fa fa-plus"></i> add user</button>
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
