<?php
	include 'actions/checksession.php';
	include 'workers/worker_listreservations.php';	
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

	<title>Showing reservations</title>

</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="tableguy">
			<div class="tableholder">
				<div class="w3-center anc">
					<h2>all event reservations</h2>
					<hr>
					<span>showing <b><?php echo $reccount;?></b> event reservations</span>
				</div>
				<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
					<thead>
						<tr>
							<?php echo $hed;?>
						</tr>
					</thead>
					<tbody>
						<?php echo $outxt;?>
						<tr class="ender">
							<td colspan="9">
								<a href="new_reservation.php" class="btn w3-hover-blue"><i class="fa fa-plus"></i> add new reservation</a>
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
		let dataobj = [
			{
				// editor popup
				action: "edit_reservation.php",
				labels: ["","","item value","item amount"],
				inputs: ["id|hidden|0","myname|text|enter your name here","myid|number|enter your new ID number here","mycontact|text|enter your contact here"]
			},
			{
				// deleter popup
				action: "delete_reservation.php",
				inputs: ["id|hidden|0"]
			},
			{
				// newitem popup
				action: "add_reservation.php",
				labels: ["","","item value","item amount"],
				inputs: ["id|hidden|0","prefix|hidden|misc_","theval|text|enter the name here","theamt|number|enter amount here"]
			}
		];

		function setupbtns() {
			let viws = document.querySelectorAll('.viewbtn');
			let dels = document.querySelectorAll('.delbtn');

			viws.forEach(el => {
				el.addEventListener('click',e => {
					readDesc(`${el.dataset.msg}`);
				})
			})

			dels.forEach(el => {
				el.addEventListener('click',e => {
					deleteRsv(`${el.dataset.myid}`);
				})
			})
		}

		function deleteRsv(n) {
			let pop = togglepops(1);

			pop.querySelector('form').id.value = n;
		}

		function readDesc(m) {
			alert(m);
		}

		function togglepops(n) {
			toggleShowB('.popups.p1','flex','none');
			let popholder = document.querySelector('.popups.p1');
			let pops = popholder.querySelectorAll('.popup');

			pops.forEach(el => {
				el.style.display = "none"
			})

			pops[n].style.display = "block"

			return pops[n];
		}

		window.onload = () => {
			initPopups(dataobj);

			setTimeout(() => {
				setupbtns();
			},500)
		}
	</script>
</body>
</html>