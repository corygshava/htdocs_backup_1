<?php
	include 'actions/checksession.php';

	include 'workers/worker_listpayments.php';
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

	<title>All payments</title>

</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="tableguy">
			<div class="tableholder">
				<div class="w3-center anc">
					<h2>all payments</h2>
					<hr>
					<span>showing <b><?php echo $reccount;?></b> payments</span>
				</div>
				<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
					<thead>
						<tr>
							<th>Verification code</th>
							<th>payment amount</th>
							<th>payment purpose</th>
							<th>payment date</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $outxt;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	
	<?php
		include 'elements/footer.php';
	?>
</body>
</html>