<?php
	include 'actions/checksession.php';
	include 'workers/worker_listvisits.php';
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

	<title>List all visits</title>
</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="tableguy">
			<div class="tableholder">
				<div class="w3-center anc">
					<h2>all visits</h2>
					<hr>
					<span>showing <b><?php echo $reccount;?></b> visits</span>
				</div>
				<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
					<thead>
						<tr>
							<?php echo $hed;?>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $outxt;?>

						<tr class="ender">
							<td colspan="8">
								<a class="btn w3-hover-blue" href="new_visit.php"><i class="fa fa-plus"></i> add new</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	
	<?php
		include 'elements/footer.php';
	?>

	<script>
		window.onload = () => {
			setupbtns();
		}

		function setupbtns() {
			// setup checkout buttons
			let checkbtns = document.querySelectorAll('.checkbtn');

			checkbtns.forEach(el => {
				el.addEventListener('click',e => {
					sendCheckout(el.dataset.myid);
				})
			})
		}

		function sendCheckout(id) {
			let theloc = `checkout.php?vid=${id}`;
			window.location.assign(theloc);
		}
	</script>
</body>
</html>