<?php
	include 'actions/checksession.php';
?>

<?php 
	include 'actions/connect.php';

	// Retrieve the record for 'coffee_seeds' from the inventory table
	$query_seeds = "SELECT itemamt FROM inventory WHERE itemname = 'coffee_seeds'";
	$result_seeds = mysqli_query($conn, $query_seeds);
	$row_seeds = mysqli_fetch_assoc($result_seeds);
	$coffee_seeds = $row_seeds['itemamt'];

	// Retrieve the record for 'coffee' from the inventory table
	$query_coffee = "SELECT itemamt FROM inventory WHERE itemname = 'coffee'";
	$result_coffee = mysqli_query($conn, $query_coffee);
	$row_coffee = mysqli_fetch_assoc($result_coffee);
	$coffee = $row_coffee['itemamt'];

	// Sum the amounts for 'lost' status
	$query_lost = "SELECT SUM(amount) AS total_lost FROM inprocessing WHERE status = 'lost'";
	$result_lost = mysqli_query($conn, $query_lost);
	$row_lost = mysqli_fetch_assoc($result_lost);
	$coffee_lost = $row_lost['total_lost'];

	// Sum the amounts for 'complete' status
	$query_complete = "SELECT SUM(amount) AS total_complete FROM inprocessing WHERE status = 'complete'";
	$result_complete = mysqli_query($conn, $query_complete);
	$row_complete = mysqli_fetch_assoc($result_complete);
	$coffee_complete = $row_complete['total_complete'];

	// Sum the amounts for 'pending' status
	$query_pending = "SELECT SUM(amount) AS total_pending FROM inprocessing WHERE status = 'pending'";
	$result_pending = mysqli_query($conn, $query_pending);
	$row_pending = mysqli_fetch_assoc($result_pending);
	$coffee_processing = $row_pending['total_pending'];

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

    <title>Inventory</title>
</head>

<body>
	<?php
		include 'elements/navbar.php';
	?>

    <div class="itemsholder">
		<h2 class="w3-center"><i class="fa fa-truck"></i> Inventory</h2>

		<!-- 
		template

			<div class="item">
				<img src="images/coffee seeds.jpg" alt="coffee seeds image">
				<h4>Coffee in processing</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
		-->
        <div class="items">
			<div class="item">
				<img src="images/coffee seeds.jpg" alt="coffee seeds image">
				<h4>Coffee seeds</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			
			<div class="item">
				<img src="images/coffee seeds.jpg" alt="coffee powder image">
				<h4>Coffee</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			<div class="item">
				<img src="images/coffee seeds.jpg" alt="factory image">
				<h4>in processing</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			<div class="item">
				<img src="images/coffee seeds.jpg" alt="factory image">
				<h4>Coffee lost in processing sdf</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			<div class="item"></div>
		</div>
    </div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/SuperScript.js"></script>
	<script>
		var coffee_seeds = <?php if($coffee_seeds == ''){echo "0";}else{echo $coffee_seeds;}?>;
		var coffee = <?php if($coffee == ''){echo "0";}else{echo $coffee;}?>;
		var coffee_lost = <?php if($coffee_lost == ''){echo "0";}else{echo $coffee_lost;}?>;
		var coffee_complete = <?php if($coffee_complete == ''){echo "0";}else{echo $coffee_complete;}?>;
		var coffee_processing = <?php if($coffee_processing == ''){echo "0";}else{echo $coffee_processing;}?>;

		var amounts = [coffee_seeds, coffee, coffee_lost, coffee_complete, coffee_processing]
		var items = ["coffee seeds", "coffee powder", "coffee lost", "coffee processed", "coffee in processing"]

		let itemsholder = document.querySelector('.items');

		function initUI() {
			/*
				<div class="item">
					<img src="images/coffee seeds.jpg" alt="coffee seeds image">
					<h4>Coffee in processing</h4>
					<div class="report">
						<b>240KG</b>
					</div>
				</div>
			*/;

			itemsholder.innerHTML = '';

			amounts.forEach((el,id) => {
				makeitem(el,id,"");
			})

			makeitem(0,0,"trans");
		}

		function makeitem(el,id,xclass) {
			let item = items[id],amt = el;

			let mm = document.createElement('div');
			mm.className = "item " + xclass;
			mm.innerHTML = `
				<img src="images/${item}.jpg" alt="coffee seeds image">
				<h4>${item}</h4>
				<div class="report">
					<b>${amt.toLocaleString()} KG</b>
				</div>
			`;

			itemsholder.appendChild(mm);
		}

		initUI();
	</script>
</body>
</html>