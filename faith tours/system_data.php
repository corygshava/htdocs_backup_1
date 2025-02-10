<?php
	include 'actions/checksession.php';
    include 'workers/worker_systemdata.php';
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

	<title>System data</title>

</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="naver w3-center">
			<p>Which data do you want to change</p>
			<br>
			<a href="#tables" onclick="switchtab('.tableguy',0,'.naver>a')" class="themehover w3-light-grey active">manage facilities</a>
			<a href="#tables" onclick="switchtab('.tableguy',1,'.naver>a')" class="themehover w3-light-grey">manage user types</a>
			<a href="#tables" onclick="switchtab('.tableguy',2,'.naver>a')" class="themehover w3-light-grey">manage tour types</a>
		</div>
		<div id="tables">	
			<div class="tableguy">
				<div class="tableholder">
					<div class="w3-center anc">
						<h2>all facilities</h2>
						<hr>
					</div>
					<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
						<thead>
							<tr>
								<th>Id</th>
				                <th>date_changed</th>
				                <th>date_added</th>
				                <th>facility name</th>
				                <th>reservation cost</th>
				                <th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								echo "$outxt1";
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tableguy">
				<div class="tableholder">
					<div class="w3-center anc">
						<h2>all user types</h2>
						<hr>
					</div>
					<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
						<thead>
							<tr>
								<th>Id</th>
				                <th>date_changed</th>
				                <th>date_added</th>
				                <th>type name</th>
				                <th>visit cost</th>
				                <th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								echo "$outxt2";
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="tableguy">
				<div class="tableholder">
					<div class="w3-center anc">
						<h2>all tour types</h2>
						<hr>
					</div>
					<table class="w3-table w3-bordered w3-striped w3-hoverable w3-card-4">
						<thead>
							<tr>
								<th>Id</th>
				                <th>date_changed</th>
				                <th>date_added</th>
				                <th>tour type</th>
				                <th>visit cost</th>
				                <th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								echo "$outxt3";
							?>
						</tbody>
					</table>
				</div>
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
				action: "edit_systemdata.php",
				labels: ["","","item value","item amount"],
				inputs: ["id|hidden|0","prefix|hidden|misc_","theval|text|","theamt|number|"]
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

		switchtab('.tableguy',0,'.naver>a');

		function setupbtns() {
			// setup edit buttons

			let editbtns = document.querySelectorAll('.editbtn');

			console.log(editbtns);

			editbtns.forEach(el => {
				el.addEventListener('click',e => {
					edititem(el.dataset.myid,el.dataset.myval,el.dataset.myamt,el.dataset.myprefix,el.dataset.myclass);
				})
			})

			// setup delete buttons
			let delbtns = document.querySelectorAll('.deleter');

			console.log(delbtns);

			delbtns.forEach(el => {
				el.addEventListener('click',e => {
					deleteitem(el.dataset.myid,el.dataset.myclass);
				})
			})

			// setup add buttons
			let addbtns = document.querySelectorAll('.addguy');

			addbtns.forEach(el => {
				el.addEventListener('click',e => {
					addnewitem(el.dataset.myprefix,el.dataset.myclass);
				})
			})
		}

		function edititem(id,val,amt,prefix,typ) {
			// for editing an item
			let pop = togglepops(0);
			let theform = pop.querySelector('#editform');
			let thehed = pop.querySelector('h2');

			thehed.innerHTML = `edit <b>${typ}</b>`;
			theform.id.value = id;
			theform.prefix.value = prefix;
			theform.theval.value = val;
			theform.theamt.value = amt;
		}

		function deleteitem(id,typ) {
			// for deleting a record
			let pop = togglepops(1);
			let theform = pop.querySelector('#delform');
			let hed = pop.querySelector('h2');

			hed.innerHTML = `delete <b>${typ}</b> record`;
			theform.id.value = id;
		}

		function addnewitem(prefix,typ) {
			// for adding a new record (facility or otherwise)
			let pop = togglepops(2);
			let theform = pop.querySelector('#editform');
			let thehed = pop.querySelector('h2');

			thehed.innerHTML = `add new <b>${typ}</b>`;
			theform.prefix.value = prefix;
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