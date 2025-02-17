<?php
	include 'actions/checksession.php';
	require 'actions/connect.php';
	require 'workers/worker_newintake.php';

	if($users == ""){
		echo "<script>alert(`You must add farmers to bring in milk`)</script>";
		echo "redirecting in 2 seconds";
		header("refresh: 2;url =new_farmer.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Milk Record</title>
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
			<h3 class="text-center" style="color: var(--themecolor);">New Milk Intake</h3>
			<hr>
			<form action="actions/add_milkintake.php" method="POST" id="theform">
				<div class="mb-3">
					<label class="form-label">Farmer responsible</label>
					<select class="form-select" name="farmerid" required>
						<option value="" disabled selected>-- Select farmer --</option>
					</select>
				</div>
				<div class="mb-3">
					<label class="form-label">Quantity (in litres)</label>
					<input type="text" name="quantity" class="form-control" placeholder="enter Quantity here..." required>
				</div>
				<button type="submit" class="btn w-100" style="background: var(--themecolor); color: #fff;">Add Record</button>
			</form>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>

	
	<?php
		include 'elements/footer.php';
	?>

	<script>
		let userslist = [<?= $users?>];

		// elements
		let theform = document.querySelector('#theform');

		function setupinputs() {
			// setup list of farmers
			userslist.forEach(el => {
				theform.farmerid.innerHTML += `<option value="${el[0]}">${el[1]}</option>`;
			});
		}

		window.onload = () => {
			setupinputs();
		}
	</script>
</body>
</html>
