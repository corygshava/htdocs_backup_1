<?php
	include 'actions/checksession.php';
?>

<?php 
    include 'actions/connect.php';

    // Initialize variables
    $deposits = $tsales = $tpaid = $available_balance = $coffee_seeds = $coffee_powder = 0;
    $coffee_lost = $coffee_complete = $coffee_processing = 0;
    $count_farmers = $count_deposits = $count_sales = $count_intakes = 0;
    $T_brought = $T_paid = 0;

    // Get the sum of depo_amt from deposits
    $query_deposits = "SELECT SUM(Depo_amt) as deposits FROM deposits";
    $result_deposits = mysqli_query($conn, $query_deposits);
    if ($row = mysqli_fetch_assoc($result_deposits)) {
        $deposits = $row['deposits'];
    }

    // Get the sum of amt_recieved from sales
    $query_tsales = "SELECT SUM(Amt_recieved) as tsales FROM sales";
    $result_tsales = mysqli_query($conn, $query_tsales);
    if ($row = mysqli_fetch_assoc($result_tsales)) {
        $tsales = $row['tsales'];
    }

    // Get the sum of amt_paid from intakes
    $query_tpaid = "SELECT SUM(Amt_paid) as tpaid FROM intakes";
    $result_tpaid = mysqli_query($conn, $query_tpaid);
    if ($row = mysqli_fetch_assoc($result_tpaid)) {
        $tpaid = $row['tpaid']; // total paid
    }

    // Calculate available balance
    $available_balance = ($deposits + $tsales) - $tpaid;

    // Get itemamt for "coffee_seeds" from inventory
    $query_coffee_seeds = "SELECT itemamt FROM inventory WHERE itemname = 'coffee_seeds'";
    $result_coffee_seeds = mysqli_query($conn, $query_coffee_seeds);
    if ($row = mysqli_fetch_assoc($result_coffee_seeds)) {
        $coffee_seeds = $row['itemamt'];
    }

    // Get itemamt for "coffee" from inventory
    $query_coffee_powder = "SELECT itemamt FROM inventory WHERE itemname = 'coffee'";
    $result_coffee_powder = mysqli_query($conn, $query_coffee_powder);
    if ($row = mysqli_fetch_assoc($result_coffee_powder)) {
        $coffee_powder = $row['itemamt'];
    }

    // Get sum of amount where status is "lost" in in_processing
    $query_coffee_lost = "SELECT SUM(Amount) as coffee_lost FROM inprocessing WHERE Status = 'lost'";
    $result_coffee_lost = mysqli_query($conn, $query_coffee_lost);
    if ($row = mysqli_fetch_assoc($result_coffee_lost)) {
        $coffee_lost = $row['coffee_lost'];
    }

    // Get sum of amount where status is "complete" in in_processing
    $query_coffee_complete = "SELECT SUM(Amount) as coffee_complete FROM inprocessing WHERE Status = 'complete'";
    $result_coffee_complete = mysqli_query($conn, $query_coffee_complete);
    if ($row = mysqli_fetch_assoc($result_coffee_complete)) {
        $coffee_complete = $row['coffee_complete'];
    }

    // Get sum of amount where status is "pending" in in_processing
    $query_coffee_processing = "SELECT SUM(Amount) as coffee_processing FROM inprocessing WHERE Status = 'pending'";
    $result_coffee_processing = mysqli_query($conn, $query_coffee_processing);
    if ($row = mysqli_fetch_assoc($result_coffee_processing)) {
        $coffee_processing = $row['coffee_processing'];
    }

    // Count the number of records in farmers
    $query_count_farmers = "SELECT COUNT(*) as count_farmers FROM farmers";
    $result_count_farmers = mysqli_query($conn, $query_count_farmers);
    if ($row = mysqli_fetch_assoc($result_count_farmers)) {
        $count_farmers = $row['count_farmers'];
    }

    // Count the number of records in deposits
    $query_count_deposits = "SELECT COUNT(*) as count_deposits FROM deposits";
    $result_count_deposits = mysqli_query($conn, $query_count_deposits);
    if ($row = mysqli_fetch_assoc($result_count_deposits)) {
        $count_deposits = $row['count_deposits'];
    }

    // Count the number of records in sales
    $query_count_sales = "SELECT COUNT(*) as count_sales FROM sales";
    $result_count_sales = mysqli_query($conn, $query_count_sales);
    if ($row = mysqli_fetch_assoc($result_count_sales)) {
        $count_sales = $row['count_sales'];
    }

    // Count the number of records in intakes
    $query_count_intakes = "SELECT COUNT(*) as count_intakes FROM intakes";
    $result_count_intakes = mysqli_query($conn, $query_count_intakes);
    if ($row = mysqli_fetch_assoc($result_count_intakes)) {
        $count_intakes = $row['count_intakes'];
    }

    // Get the sum of amt_brought and amt_paid in intakes
    $query_sum_intakes = "SELECT SUM(Amt_brought) as T_brought, SUM(Amt_paid) as T_paid FROM intakes";
    $result_sum_intakes = mysqli_query($conn, $query_sum_intakes);
    if ($row = mysqli_fetch_assoc($result_sum_intakes)) {
        $T_brought = $row['T_brought']; // kgs brought
        $T_paid = $row['T_paid'];	// amt paid to farmers
    }

    $opres = 'true';  // Operation result flag for success
    $restxt = "Admin summary calculated successfully.";
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

	<title>Dashboard</title>
</head>

<body>
	<nav class="w3-top norm">
		<a>
			<b class="pritxt"><i class="fa fa-dashboard"></i> Dashboard</b>
		</a>
		<div class="w3-dropdown-hover" class="w3-right">
			<a href="#"><i class="fa fa-user"></i> user options</a>
			<div class="w3-dropdown-content w3-card">
				<a href="newuser.php" class="navlink">register user</a>
				<a href="userslist.php" class="navlink">view users</a>
				<a href="actions/logout.php" class="navlink">logout</a>
			</div>
		</div>
	</nav>

	<div class="content">
		<div class="summary">
			<div class="w3-center">
				<h2>System summary</h2>
			</div>
			<section class="w3-center">
				<h3 class="">Finances</h3>
				<div class="item">
					<div class="thing">
						<h5>available balance</h5>
						<span class="num show_balance pritxt">35,434,365</span>
					</div>
					<div class="thing">
						<h5>total deposits</h5>
						<span class="num show_deposits">35,434,365</span>
					</div>
					<div class="thing">
						<h5>total sales</h5>
						<span class="num show_sales pritxt">1,434,365</span>
					</div>
					<div class="thing">
						<h5>total paid to farmers</h5>
						<span class="num show_paid">1,434,365</span>
					</div>
				</div>
			</section>

			<hr class="w3-text-black" style="border: 1px solid;width: 80%;margin: 30px auto;opacity: 0.2;">

			<section class="w3-row">
				<section class="w3-col m6">
					<h3 class="">Inventory data</h3>
					<div class="info">
						<div class="item2">
							<b class="tag coffee_brought">450kg</b>
							<span>Total Coffee brought</span>
						</div>
						<div class="item2">
							<b class="tag cofee_seeds">4500kg</b>
							<span>Coffee seeds</span>
						</div>
						<div class="item2">
							<b class="tag cofee_powder">17kg</b>
							<span>coffee available</span>
						</div>
						<div class="item2">
							<b class="tag coffee_lost">0kg</b>
							<span>seeds spoilt in processing</span>
						</div>
						<div class="item2">
							<b class="tag coffee_complete">450kg</b>
							<span>seeds processed successfully</span>
						</div>
						<div class="item2">
							<b class="tag coffee_processing">450kg</b>
							<span>Coffee in processing</span>
						</div>
					</div>
				</section>
				<section class="w3-col m6">
					<h3 class="">misc data</h3>
					<div class="info">
						<div class="item2">
							<b class="tag count_farmers">35</b>
							<span>Farmers registered</span>
						</div>
						<div class="item2">
							<b class="tag count_deposits">20</b>
							<span>total deposits</span>
						</div>
						<div class="info">
						<div class="item2">
							<b class="tag count_sales">302</b>
							<span>Coffee powder sales</span>
						</div>
						<div class="item2">
							<b class="tag T_brought">302</b>
							<span>Coffee intakes</span>
						</div>
					</div>
				</section>
			</section>
		</div>

		<div class="ops" style="margin-bottom: 220px;">
			<div class="w3-center">
				<h1>welcome <b><?php echo $curuser;?></b></h1>
				<hr>
			</div>
			<div class="w3-center">
				<h2>Operations</h2>
			</div>
			<div class="w3-row">
				<div class="w3-col m4">
					<h3 class="pritxt">Farmer operations</h3>
					<div class="opslist">
						<a href="registerfarmer.php">new farmer</a>
						<a href="managefarmers.php">manage farmers</a>
					</div>

					<!-- <hr> -->

					<h3 class="pritxt">Admin tools</h3>
					<div class="opslist">
						<a href="systemdata.php">edit system data</a>
					</div>
				</div>
				<div class="w3-col m4">
					<h3 class="pritxt">Coffee Operations</h3>
					<div class="opslist">
						<a href="intake.php">new intake</a>
						<a href="intakes.php" class="navlink">intakes</a>
						<a href="send_to_processing.php">send to processing</a>
						<a href="in_processing.php">processing queue</a>
						<a href="inventory.php">inventory</a>
					</div>
				</div>
				<div class="w3-col m4">
					<h3 class="pritxt">Finances</h3>
					<div class="opslist">
						<a href="deposit_funds.php">new deposit</a>
						<a href="deposits.php">deposits</a>
						<a href="sell_coffee.php">sell coffee</a>
						<a href="sales_coffee.php">sales records</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script src="js/app.js"></script>
	<script src="js/SuperScript.js"></script>
	<script src="js/w3.js"></script>
	<script>
		/*
			$available_balance
			$deposits
			$tsales
			$tpaid
			$T_paid

			$coffee_seeds
			$coffee_powder
			$coffee_lost
			$coffee_complete
			$coffee_processing

			$count_farmers
			$count_deposits
			$count_sales
			$count_intakes
			$T_brought
		*/
		// values (taken from the database)
		var balance = <?php if($available_balance == ''){echo 0;}else{echo $available_balance;};?>;
		var deposits = <?php if($deposits == ''){echo 0;}else{echo $deposits;};?>;
		var sales = <?php if($tsales == ''){echo 0;}else{echo $tsales;};?>;
		var paid = <?php if($tpaid == ''){echo 0;}else{echo $tpaid;};?>;

		var cofee_seeds = <?php if($coffee_seeds == ''){echo 0;}else{echo $coffee_seeds;};?>;
		var cofee_powder = <?php if($coffee_powder == ''){echo 0;}else{echo $coffee_powder;};?>;
		var coffee_lost = <?php if($coffee_lost == ''){echo 0;}else{echo $coffee_lost;};?>;
		var coffee_complete = <?php if($coffee_complete == ''){echo 0;}else{echo $coffee_complete;};?>;
		var coffee_processing = <?php if($coffee_processing == ''){echo 0;}else{echo $coffee_processing;};?>;
		var coffee_brought = <?php if($T_brought == ''){echo 0;}else{echo$T_brought; };?>

		var count_farmers = <?php if($count_farmers == ''){echo 0;}else{echo $count_farmers;};?>;
		var count_deposits = <?php if($count_deposits == ''){echo 0;}else{echo $count_deposits;};?>;
		var count_sales = <?php if($count_sales == ''){echo 0;}else{echo $count_sales;};?>;
		var intakes = <?php if($count_intakes == ''){echo 0;}else{echo $count_intakes;};?>;
		
		// UI elements
		var show_balance = document.querySelector('.show_balance');
		var show_deposits = document.querySelector('.show_deposits');
		var show_sales = document.querySelector('.show_sales');
		var show_paid = document.querySelector('.show_paid');

		var show_cofee_seeds = document.querySelector('.cofee_seeds');
		var show_cofee_powder = document.querySelector('.cofee_powder');
		var show_coffee_lost = document.querySelector('.coffee_lost');
		var show_coffee_complete = document.querySelector('.coffee_complete');
		var show_coffee_processing = document.querySelector('.coffee_processing');
		var show_coffee_brought = document.querySelector('.coffee_brought');

		var show_count_farmers = document.querySelector('.count_farmers');
		var show_count_deposits = document.querySelector('.count_deposits');
		var show_count_sales = document.querySelector('.count_sales');
		var show_T_brought = document.querySelector('.T_brought');

		function initUI() {

			show_balance.innerHTML = `${balance.toLocaleString()}`;
			show_deposits.innerHTML = `${deposits.toLocaleString()}`;
			show_sales.innerHTML = `${sales.toLocaleString()}`;
			show_paid.innerHTML = `${paid.toLocaleString()}`;

			show_cofee_seeds.innerHTML = `${cofee_seeds.toLocaleString()} KG`;
			show_cofee_powder.innerHTML = `${cofee_powder.toLocaleString()} KG`;
			show_coffee_lost.innerHTML = `${coffee_lost.toLocaleString()} KG`;
			show_coffee_complete.innerHTML = `${coffee_complete.toLocaleString()} KG`;
			show_coffee_processing.innerHTML = `${coffee_processing.toLocaleString()} KG`;
			show_coffee_brought.innerHTML = `${coffee_brought.toLocaleString()} KG`;

			show_count_farmers.innerHTML = `${count_farmers.toLocaleString()}`;
			show_count_deposits.innerHTML = `${count_deposits.toLocaleString()}`;
			show_count_sales.innerHTML = `${count_sales.toLocaleString()}`;
			show_T_brought.innerHTML = `${intakes.toLocaleString()}`;
		}

		initUI();
	</script>
</body>
</html>