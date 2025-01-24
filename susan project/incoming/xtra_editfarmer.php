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
	<?php include 'elements/navbar.php';?>

	<div class="formholder">
		<div class="theform">
			<h1 class="w3-center">Update farmer Information</h1>
			<form action="actions/updatefarmer.php" method="post">
				<div class="flexresponsive row">
					<div class="mobi">
						<div class="npt">
							<label for="fname">Farmer name</label>
							<input type="text" name="fname" id="fname" placeholder="enter the name here">
						</div>
						<div class="npt">
							<label for="fname">Farmer phone number</label>
							<input type="text" name="fphone" id="fphone" placeholder="enter the phone number here">
						</div>
					</div>
					<div class="mobi">
						<div class="npt">
							<label for="femail">email</label>
							<input type="text" name="femail" id="femail" placeholder="enter the email here">
						</div>
						<div class="npt">
							<label for="flocation">location</label>
							<input type="text" name="flocation" id="flocation" placeholder="enter location here">
						</div>
					</div>
				</div>
				<div class="npt2 w3-center">
					<button class="themebtn">update information <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

	<footer class="w3-black w3-bottom">
		<span>&copy; Coffee management system</span>
	</footer>
</body>
</html>