<?php
	include 'actions/checksession.php';
?>

<?php
	include 'actions/connect.php';

    // Query to get the price per kilo from the sysdata table
    $price_query = "SELECT itemvalue FROM sysdata WHERE itemname = 'price_per_kilo'";
    $result_price = $conn->query($price_query);
    $price = ($result_price && $result_price->num_rows > 0) ? $result_price->fetch_assoc()['itemvalue'] : 0;

    // Query to get the total sums from the deposits, sales, and intakes tables
    $total_depos_query = "SELECT SUM(depo_amt) AS total FROM deposits";
    $result_depos = $conn->query($total_depos_query);
    $T_depos = ($result_depos && $result_depos->num_rows > 0) ? $result_depos->fetch_assoc()['total'] : 0;

    $total_sales_query = "SELECT SUM(amt_recieved) AS total FROM sales";
    $result_sales = $conn->query($total_sales_query);
    $T_sales = ($result_sales && $result_sales->num_rows > 0) ? $result_sales->fetch_assoc()['total'] : 0;

    $total_intakes_query = "SELECT SUM(amt_paid) AS total FROM intakes";
    $result_intakes = $conn->query($total_intakes_query);
    $T_paid = ($result_intakes && $result_intakes->num_rows > 0) ? $result_intakes->fetch_assoc()['total'] : 0;

    // Calculate available balance
    $available_balance = ($T_depos + $T_sales) - $T_paid;

    // Query to get all farmers' id and name
    $farmers_query = "SELECT id, Name FROM farmers";
    $result_farmers = $conn->query($farmers_query);
    $farmers_ids = [];
    $farmers_names = [];

    if ($result_farmers && $result_farmers->num_rows > 0) {
        while ($row = $result_farmers->fetch_assoc()) {
            $farmers_ids[] = $row['id'];
            $farmers_names[] = $row['Name'];
        }
    } else {
    	echo "<script>alert('you need to register at least 1 farmer to make an intake');</script>";
    	header('refresh: 1.2; url= registerfarmer.php');
    	exit();
    }

    // Convert arrays to comma-separated strings
    $farmers_ids_string = implode(',', $farmers_ids);
    $farmers_names_string = implode(',', $farmers_names);
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

	<title>New intake</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>

	<div class="formholder">
		<div class="theform">
			<h1 class="w3-center">New intake</h1>
			<form action="actions/newintake.php" method="post">
				<div class="w3-center">
					<span>Available balance</span><br>
					<b class="pritxt thebalance">45,454,545</b>
				</div>
				<div class="flexresponsive row">
					<div class="mobi">
						<div class="npt">
							<label for="f_id">Farmer name</label>
							<select name="f_id" required>
							</select>
						</div>
						<div class="npt">
							<label for="in_amt">How many tea leaves (KG)</label>
							<input type="number" min="1" name="in_amt" id="in_amt" placeholder="enter the weight in KG" oninput="updatepay()" required>
						</div>
						<div class="npt">
							<label>To pay</label>
							<div class="standin payreport">
								<b class="pritxt">24,354.00</b> (<b>250</b> per KG)
							</div>
						</div>
					</div>
				</div>
				<div class="npt2 w3-center">
					<button class="themebtn">register intake <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script>
		var payrpt = document.querySelector('.payreport');
		var amtnpt = document.forms[0].in_amt;
		var thebalance = document.querySelector('.thebalance');
		var theselect = document.forms[0].f_id;

		// fetched from the database
		var price_per_kilo = <?php echo $price;?>;
		var balance = <?php echo $available_balance;?>;
		var fdata = [
			`<?php echo "$farmers_ids_string";?>`,
			`<?php echo "$farmers_names_string";?>`
		];

		function updatepay() {
			// update the payreport
			theprice = Math.floor(Number(amtnpt.value) * price_per_kilo);

			payrpt.innerHTML = `
				<b class="pritxt">${theprice.toLocaleString()}</b> (<b>${price_per_kilo}</b> per KG)
			`;
		}

		function initUI() {
			thebalance.innerHTML = `Ksh ${balance.toLocaleString()}`;
			amtnpt.max = Math.floor(balance / price_per_kilo);
			amtnpt.placeholder += ` (maximum is ${amtnpt.max})`;

			// sets up the options
			let ids = fdata[0].split(',');
			let names = fdata[1].split(',');

			ids.forEach((el,id) => {
				let mm = document.createElement('option');
				mm.value = el;
				mm.innerHTML = `[${el}] ${names[id]}`;
				theselect.appendChild(mm);
			})
		}

		initUI();
		updatepay();
	</script>
</body>
</html>