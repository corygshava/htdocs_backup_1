<?php
	include 'actions/checksession.php';
	include 'workers/summary.php';
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

	<title>Admin dashboard</title>
</head>
<body>
	<div class="standin">
		<h1>Welcome <b><?php echo $curuser;?></b></h1>
		<hr>
	</div>
	<div class="content dash">
		<div class="pagesect summary" id="summ">
			<h1>System Information</h1>
			<div class="w3-row infoguy">
			</div>
		</div>
		<hr>
		<div class="pagesect summary">
			<h1>earnings</h1>
			<div class="w3-row earnings w3-center">
			</div>
		</div>
		<hr>
		<div class="pagesect actions">
			<h1>Actions</h1>

			<div class="w3-row">
				<div class="w3-col m4">
					<h2>Visitors</h2>
					<div class="w3-bar-block linkbox">
						<a href="new_visitor.php" class="w3-bar-item">new visitor</a>
						<a href="list_visitors.php" class="w3-bar-item">list visitors</a>
						<a href="search_visitors.php" class="w3-bar-item">search visitors</a>
					</div>
					<h2>Visits</h2>
					<div class="w3-bar-block linkbox">
						<a href="new_visit.php" class="w3-bar-item">new visit</a>
						<a href="list_visits.php" class="w3-bar-item">view visits</a>
					</div>
				</div>
				<div class="w3-col m4">
					<h2>Reservations</h2>
					<div class="w3-bar-block linkbox">
						<a href="new_reservation.php" class="w3-bar-item">new reservation</a>
						<a href="list_reservations.php?req=events" class="w3-bar-item">event reservations</a>
					</div>
					<h2>Admin</h2>
					<div class="w3-bar-block linkbox">
						<a href="list_feedback.php" class="w3-bar-item	">view reviews and feedback</a>
						<a href="list_payments.php" class="w3-bar-item">view payments</a>
						<a href="system_data.php" class="w3-bar-item" title="facilities and prices">edit system data</a>
					</div>
				</div>
				<div class="w3-col m4">
					<h2>User options</h2>
					<div class="w3-bar-block linkbox">
						<a href="#summ" class="w3-bar-item">view summary</a>
						<a href="new_user.php" class="w3-bar-item">add new user</a>
						<a href="list_users.php" class="w3-bar-item">view users</a>
						<a href="logout.php" class="w3-bar-item">logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<script>
		let thedata = `<?php echo $summ;?>`;
		let thecash = [];

		let cashguy = document.querySelector('.earnings');

		document.addEventListener("DOMContentLoaded", function () {
			let data = JSON.parse(thedata); // Assuming JSON is injected into an element with id="jsonData"
			let container = document.querySelector(".infoguy");

			let conguy = '<div class="w3-col m3">';
			let id = 0,finpay = "",stop = false;

			if (!container) return;

			Object.entries(data).forEach(([key, value]) => {
				let payld = "";

				if(!stop){
					if(key.includes("break|")){
						stop = key.includes("break|cash");

						if(!stop){
							if(id == 0){
								payld += `${conguy}<h3>${key.split("|")[1]}</h3>`;
							} else {
								payld += `</div>${conguy}<h3>${key.split("|")[1]}</h3>`;
							}
						}
					} else {
						payld += `
							<div class="w3-row items">
								<div class="count">
									<span>${value}</span>
								</div>
								<div class="caption">
									${key.replace(/_/g, " ")}
								</div>
							</div>
						`;
					}

					finpay += payld;
					id += 1;
				} else {
					thecash.push([`${key}`,`${value}`])
				}
			});

			container.innerHTML = finpay;

			setupCash();
		});

		function setupCash() {
			thecash.forEach(el => {
				let amt = Number(el[1]);
				let acc = el[0].replaceAll("_"," ");

				cashguy.innerHTML += `
					<div class="w3-col m${Math.floor(12 / thecash.length)} earn_income">
						<div class="amount">${amt.toLocaleString()}</div>
						<div class="amt_text">${acc}</div>
					</div>
				`;
			})
		}
	</script>
</body>
</html>