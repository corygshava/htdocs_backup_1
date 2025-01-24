<?php
	include 'actions/checksession.php';
?>

<?php 
	include 'actions/connect.php';

	// Retrieve the record for 'tea leaves' from the inventory table
	$query_leaves = "SELECT itemamt FROM inventory WHERE itemname = 'tea leaves'";
	$result_leaves = mysqli_query($conn, $query_leaves);
	$row_leaves = mysqli_fetch_assoc($result_leaves);
	$tea_leaves = $row_leaves['itemamt'];

	// Retrieve the record for 'tea' from the inventory table
	$query_tea = "SELECT itemamt FROM inventory WHERE itemname = 'tea'";
	$result_tea = mysqli_query($conn, $query_tea);
	$row_tea = mysqli_fetch_assoc($result_tea);
	$tea = $row_tea['itemamt'];

	// Sum the amounts for 'lost' status
	$query_lost = "SELECT SUM(amount) AS total_lost FROM inprocessing WHERE status = 'lost'";
	$result_lost = mysqli_query($conn, $query_lost);
	$row_lost = mysqli_fetch_assoc($result_lost);
	$tea_lost = $row_lost['total_lost'];

	// Sum the amounts for 'complete' status
	$query_complete = "SELECT SUM(amount) AS total_complete FROM inprocessing WHERE status = 'complete'";
	$result_complete = mysqli_query($conn, $query_complete);
	$row_complete = mysqli_fetch_assoc($result_complete);
	$tea_complete = $row_complete['total_complete'];

	// Sum the amounts for 'pending' status
	$query_pending = "SELECT SUM(amount) AS total_pending FROM inprocessing WHERE status = 'pending'";
	$result_pending = mysqli_query($conn, $query_pending);
	$row_pending = mysqli_fetch_assoc($result_pending);
	$tea_processing = $row_pending['total_pending'];

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
				<img src="images/tea seeds.jpg" alt="tea seeds image">
				<h4>tea in processing</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
		-->
        <div class="items">
			<div class="item">
				<img src="images/tea seeds.jpg" alt="tea seeds image">
				<h4>tea leaves</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			
			<div class="item">
				<img src="images/tea seeds.jpg" alt="tea powder image">
				<h4>processed Tea</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			<div class="item">
				<img src="images/tea seeds.jpg" alt="factory image">
				<h4>in processing</h4>
				<div class="report">
					<b>240KG</b>
				</div>
			</div>
			<div class="item">
				<img src="images/tea seeds.jpg" alt="factory image">
				<h4>Tea leaves lost</h4>
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
		var tea_leaves = <?php if($tea_leaves == ''){echo "0";}else{echo $tea_leaves;}?>;
		var tea = <?php if($tea == ''){echo "0";}else{echo $tea;}?>;
		var tea_lost = <?php if($tea_lost == ''){echo "0";}else{echo $tea_lost;}?>;
		var tea_complete = <?php if($tea_complete == ''){echo "0";}else{echo $tea_complete;}?>;
		var tea_processing = <?php if($tea_processing == ''){echo "0";}else{echo $tea_processing;}?>;

		var amounts = [tea_leaves, tea, tea_lost, tea_complete, tea_processing]
		var items = ["tea leaves", "tea", "tea lost", "tea processed", "pending processing"]

		let itemsholder = document.querySelector('.items');

		function initUI() {
			/*
				<div class="item">
					<img src="images/tea leaves.jpg" alt="tea seeds image">
					<h4>tea in processing</h4>
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
				<img src="images/${item}.jpg" alt="${item} image">
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