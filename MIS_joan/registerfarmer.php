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

	<title>Register new farmer</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="formholder">
		<div class="theform">
			<h1 class="w3-center">Add new farmer</h1>
			<form action="actions/addfarmer.php" method="post">
				<div class="flexresponsive row">
					<div class="mobi">
						<div class="npt">
							<label for="fname">Farmer name</label>
							<input type="text" name="fname" id="fname" placeholder="enter the name here" required>
						</div>
						<div class="npt">
							<label for="fcontact">Farmer phone number</label>
							<input type="text" name="fcontact" id="fcontact" placeholder="enter the phone number here" required>
						</div>
					</div>
					<div class="mobi">
						<div class="npt">
							<label for="femail">email</label>
							<input type="text" name="femail" id="femail" placeholder="enter the email here" required>
						</div>
						<div class="npt">
							<label for="flocation">location</label>
							<input type="text" name="flocation" id="flocation" placeholder="enter location here" required>
						</div>
					</div>
				</div>
				<div class="npt2 w3-center">
					<button class="themebtn">add farmer <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

</body>
</html>