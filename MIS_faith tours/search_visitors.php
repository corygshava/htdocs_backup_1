<?php
	include 'actions/checksession.php';

	$filter = "";
	$filtersent = false;
	$reccount = 0;

	if(isset($_POST['vst_info'])){
		$filtersent = true;
		$filter = $_POST['vst_info'];
	}

	include 'workers/worker_searchvisitors.php';
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
					<div class="searchform">
						<form action="#" method="post">
							<input type="text" name="vst_info" placeholder="enter visitor name, contact or id number">
							<button class="btn themehover"><i class="fa fa-search"></i> search</button>
						</form>
					</div>
					<hr>
					<?php
						if($filtersent){
					?>
						<span>showing <b><?php echo $reccount;?></b> visitors with the name, contact or id number <b><?php echo "$filter"?></b></span>
					<?php
						}
					?>
				</div>
				<?php
					if($reccount > 0){
				?>
				<div class="results">
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
						</tbody>
					</table>
				</div>

				<?php
					} else {
				?>
				<div>
					<div class="standin">
						<p>no results were found</p>
						<hr style="width: 30%;display: inline-block;"><br>
						<i style="font-size: 17px;">search for another name or contact</i>
					</div>
				</div>

				<?php
					}
				?>
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
				labels: ["","Visitor name","ID number","Contact"],
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