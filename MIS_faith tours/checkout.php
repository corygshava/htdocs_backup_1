<?php
	include 'actions/checksession.php';
	include 'workers/worker_checkout.php';
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

	<script src="js/SuperScript.js"></script>
	<script src="js/toappend.js"></script>
	<script src="js/app.js"></script>

	<title>Checkout</title>
</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="formguy">
			<form class="f1" method="post" action="actions/handlecheckout.php">
				<h1 class="w3-center">Checkout</h1>
				<hr>
				<p class="w3-center">Kindly leave a review before you go</p>
				<div class="w3-row">
					<div class="w3-col m12">
						<input type="hidden" name="visit_id" value="<?php echo "$vst_id";?>">
						<input type="hidden" name="visitor_id" value="<?php echo "$vst_guy";?>">

						<label for="review_score">Rating</label>
						<select name="review_score" required>
							<option disabled="yes" selected="" value="">--rate our services--</option>
							<option value="1">1 / 5</option>
							<option value="2">2 / 5</option>
							<option value="3">3 / 5</option>
							<option value="4">4 / 5</option>
							<option value="5">5 / 5</option>
						</select>
						<label for="feedback_txt">Visitor feedback</label>
						<textarea placeholder="What do you think of our services" name="feedback_txt" required></textarea>
					</div>
				</div>
				<div class="options">
					<button class="themebtn btn"><i class="fa fa-arrow-right"></i> checkout</button>
				</div>
			</form>
		</div>
	</div>

	
	<?php
		include 'elements/footer.php';
	?>

	<script>
		let data = [<?php echo "$theres";?>];

		function setupinputs() {
			let theform = document.forms[0];
			let sel = theform.v_type;

			data.forEach(el => {
				let b = document.createElement("option");
				b.value = el;
				b.innerHTML = el;

				sel.appendChild(b);
			})
		}

		setupinputs();
	</script>
</body>
</html>