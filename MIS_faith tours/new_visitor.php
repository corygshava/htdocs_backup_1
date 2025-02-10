<?php
	include 'actions/checksession.php';
	include 'workers/worker_newvisitor.php';
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

	<title>Register visitor</title>
</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="formguy">
			<form class="f1" method="post" action="actions/add_visitor.php">
				<h1 class="w3-center">Add new visitor</h1>
				<hr>
				<div class="w3-row">
					<div class="w3-col m6">
						<label for="v_name">your name</label>
						<input type="text" name="v_name" placeholder="enter your name here" required>
						<label for="v_id">your id / passport number</label>
						<input type="number" name="v_id" placeholder="enter your id / passport number here" required>
					</div>
					<div class="w3-col m6">
						<label for="v_type">user type</label>
						<select name="v_type" required>
							<option disabled="yes" selected value="">--choose user type--</option>
						</select>
						<label for="v_contact">your contact</label>
						<input type="text" name="v_contact" placeholder="enter your email or phone number" required>
					</div>
				</div>
				<div class="options">
					<button class="themebtn btn"><i class="fa fa-plus"></i> add new visitor</button>
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