<?php
	include 'actions/checksession.php';

	include 'workers/worker_listvisitors.php';
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

	<title>List all visitors</title>

</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="tableguy">
			<div class="tableholder">
				<div class="w3-center anc">
					<h2>all visitors</h2>
					<hr>
					<span>showing <b>7</b> visitors</span>
				</div>
				<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
					<thead>
						<tr>
							<th>Name</th>
							<th>ID</th>
							<th>Contact</th>
							<th>Type</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $outxt;?>
						<tr class="ender">
							<td colspan="5">
								<a class="btn w3-hover-blue" href="new_visitor.php"><i class="fa fa-plus"></i> add new</a>
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
				action: "edit_visitor.php",
				labels: ["","","item value","item amount"],
				inputs: ["id|hidden|0","myname|text|enter your name here","myid|number|enter your new ID number here","mycontact|text|enter your contact here"]
			},
			{
				// deleter popup
				action: "delete_systemdata.php",
				inputs: ["id|hidden|0"]
			},
			{
				// newitem popup
				action: "add_systemdata.php",
				labels: ["","","item value","item amount"],
				inputs: ["id|hidden|0","prefix|hidden|misc_","theval|text|enter the name here","theamt|number|enter amount here"]
			}
		];


		function setupbtns() {
			// setup edit buttons

			let editbtns = document.querySelectorAll('.editbtn');

			console.log(editbtns);

			editbtns.forEach(el => {
				el.addEventListener('click',e => {
					edititem(el.dataset.myid,el.dataset.myidno,el.dataset.mycontact,el.dataset.myname);
				})
			})

			// setup checkout buttons
			let checkbtns = document.querySelectorAll('.checkbtn');

			checkbtns.forEach(el => {
				el.addEventListener('click',e => {
					sendCheckout(el.dataset.myid);
				})
			})


			// setup visit buttons
			let visitbtns = document.querySelectorAll('.visitbtn');

			visitbtns.forEach(el => {
				el.addEventListener('click',e => {
					sendVisit(el.dataset.myid);
				})
			})
		}

		function edititem(id,idno,contact,daname) {
			// for editing an item
			let pop = togglepops(0);
			let theform = pop.querySelector('#editform');
			let thehed = pop.querySelector('h2');

			thehed.innerHTML = `edit Visitor information`;
			theform.id.value = id;
			theform.myid.value = idno;
			theform.mycontact.value = contact;
			theform.myname.value = daname;
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

		function sendCheckout(id) {
			let theloc = `checkout.php?vid=${id}`;
			window.location.assign(theloc);
		}

		function sendVisit(id) {
			let theloc = `new_visit.php?vid=${id}`;
			window.location.assign(theloc);
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