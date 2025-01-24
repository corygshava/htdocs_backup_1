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
	<nav class="w3-top norm">
		<a>
			<b class="pritxt">manage farmers</b>
		</a>
		<div>
			<div class="w3-dropdown-hover">
				<a href="#">farmer options <i class="fa fa-chevron-down"></i></a>
				<div class="w3-dropdown-content w3-card w3-animate-opacity">
					<a href="registerfarmer.html" class="navlink">new farmer</a>
					<a href="managefarmers.html" class="navlink">manage farmers</a>
				</div>
			</div>
			<div class="w3-dropdown-hover">
				<a href="#" class="">coffee options <i class="fa fa-chevron-down"></i></a>
				<div class="w3-dropdown-content w3-card w3-animate-opacity">
					<a href="intake.html" class="navlink">new intake</a>
					<a href="send_to_processing.html" class="navlink">send to processing</a>
					<a href="in_processing.html" class="navlink">processing queue</a>
					<a href="inventory.html" class="navlink">inventory</a>
				</div>
			</div>
			<div class="w3-dropdown-hover">
				<a href="#" class="">Finances options <i class="fa fa-chevron-down"></i></a>
				<div class="w3-dropdown-content w3-card w3-animate-opacity">
					<a href="deposit_funds.html" class="navlink">new deposit</a>
					<a href="sell_coffee.html" class="navlink">sell coffee</a>
				</div>
			</div>
			<a href="index.html" class="w3-right"><i class="fa fa-home"></i></a>
		</div>
	</nav>

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

	<?php
		include 'elements/footer.php';
	?>

</body>
</html>