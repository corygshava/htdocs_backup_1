<?php
	include 'actions/checksession.php';
	require 'actions/connect.php';
	require 'workers/worker_newmilksale.php';

	if($users == ""){
		echo "<script>alert(`You must add farmers to sell milk`)</script>";
		echo "redirecting in 2 seconds";
		header("refresh: 2;url =new_farmer.php");
		exit();
	} else if($curusertype != "admin" && $myquan == 0){
		echo "<script>alert(`You dont have any milk to sell, make an intake first`)</script>";
		echo "redirecting in 2 seconds";
		header("refresh: 2;url =new_farmer.php");
		exit();
	}

	$ftext = $curusertype == "admin" ? "Farmer to buy from" : "farmer selling";
?>

<!DOCTYPE html>
<html>
<head>
	<title>New Milk Sale</title>
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
			<h3 class="text-center" style="color: var(--themecolor);">New Milk Sale</h3>
			<hr>
			<form action="actions/add_milksale.php" method="POST" id="theform">
				<div class="farmerselect w3-animate-right">
					<div class="mb-3">
						<label class="form-label"><?= $ftext?></label>
						<select class="form-select" name="farmerid" required>
							<option value="" disabled selected>-- Select farmer --</option>
						</select>
					</div>
					<a class="btn w-100" style="background: var(--themecolor); color: #fff;" onclick="checkfarmer()">Add Sale</a>
					<!-- <hr> -->
				</div>
				<div class="forminfo w3-hide w3-animate-right">
					<div class="mb-3">
						<label class="form-label">Transaction Code</label>
						<input type="text" name="Transaction_code" class="form-control" required placeholder="enter Transaction Code here" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Milk Sold (litres)</label>
						<input type="number" name="quantity_sold" class="form-control" required placeholder="enter Amount Sold here" min="0" max="200" oninput="updateprice();" required>
					</div>
					<div class="mb-3">
						<label class="form-label">Amount To be Paid</label>
						<input type="text" name="Amount_to_pay" class="form-control" required placeholder="enter Amount Paid here" readonly>
					</div>
					<button type="submit" class="btn w-100" style="background: var(--themecolor); color: #fff;">Add Sale</button>
				</div>
			</form>
		</div>
	</div>
	<script src="js/bootstrap.bundle.min.js"></script>
	<?php
		include 'elements/footer.php';
	?>

	<script>
		let userslist = [<?= $users?>];
		let theprice = <?= $theprice?>;

		// elements
		let theform = document.querySelector('#theform');

		function setupinputs() {
			// setup list of farmers
			userslist.forEach((el,id) => {
				theform.farmerid.innerHTML += `<option value="${el[0]}" data-myid="${id}">${el[1]} (${el[2]} litres)</option>`;
			});
		}

		function checkfarmer() {
			let fid = theform.farmerid.value;
			let thequan = 0;

			userslist.forEach(el => {
				if(el[0] == fid){thequan = el[2]};
			});

			if(thequan == 0){
				alert("this farmer has no milk, pick someone else")
			} else {
				theform.quantity_sold.max = thequan;
				theform.quantity_sold.placeholder = `Maximum is ${thequan}`;
				showrest();
			}
		}

		function showrest() {
			let m1 = document.querySelector('.farmerselect');
			let m2 = document.querySelector('.forminfo');

			m1.classList.add("w3-hide");
			m2.classList.remove("w3-hide");
		}

		function updateprice() {
			theform.Amount_to_pay.value = Number(theform.quantity_sold.value) * theprice;
		}

		window.onload = () => {
			setupinputs();
		}
	</script>
</body>
</html>
