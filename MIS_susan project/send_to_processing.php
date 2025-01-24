<?php
	include 'actions/checksession.php';
?>

<?php 
    include 'actions/connect.php';

    // SQL query to get itemamt where itemname is "coffee_seeds"
    // in other words find out how many tea leaves we have
    $query = "SELECT itemamt FROM inventory WHERE itemname = 'tea leaves'";
    $result = $conn->query($query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $maxweight = $row['itemamt'];
    } else {
        echo "Error fetching data: " . mysqli_error($conn);
    }
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

	<title>send to processing</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>
	<div class="formholder">
		<div class="theform">
			<h1 class="w3-center">send to processing</h1>
			<div class="w3-center">
				<span>available amount</span><br>
				<b class="pritxt" id="avl_weight">23423 KG</b>
			</div>
			<form action="actions/sendtoprocessing.php" method="post">
				<div class="flexresponsive row">
					<div class="mobi">
						<div class="npt">
							<label for="to_send">How many tea leaves</label>
							<input type="number" min="1" name="to_send" id="to_send" placeholder="enter the weight in KG" required>
						</div>
					</div>
				</div>
				<div class="npt2 w3-center">
					<button class="themebtn">send to processing <i class="fa fa-send"></i></button>
				</div>
			</form>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script>
		var weightshow = document.querySelector('#avl_weight');
		var theform = document.forms[0];

		var amt = <?php echo $maxweight;?>;

		function initUI() {
			weightshow.innerHTML = `${amt.toLocaleString()} KG`;
			theform.p_amt.max = amt;
			theform.p_amt.placeholder += `(maximum is ${amt} KG)`;
		}

		initUI();
	</script>
</body>
</html>