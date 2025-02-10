<?php
	include 'actions/checksession.php';
	include 'workers/worker_newreservation.php';
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

	<title>New reservation</title>

	<style type="text/css">
		.formguy{
			min-height: 80vh !important;
		}
	</style>
</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content">
		<div class="naver w3-center">
			<div class="w3-hide">
			<h1>Reserve event</h1>
				<p>What do you want to reserve</p>
				<br>
				<a href="#forms" onclick="switchtab(0)" class="themehover w3-light-grey active">reserve event</a>
				<a href="#forms" onclick="switchtab(1)" class="themehover w3-light-grey w3-hide">reserve a visit</a>
			</div>
		</div>
		<div id="forms">
			<div class="formguy panel">
				<form class="f1 w3-animate-opacity" action="actions/reserve_event.php" id="reserve_event" method="post">
					<h1 class="w3-center">Reserve event</h1>
					<hr>
					<div class="w3-row">
						<div class="w3-col m6">
							<label for="event_name">event name</label>
							<input type="text" name="event_name" placeholder="enter the event name here" required>
							<label for="event_date">event date</label>
							<input type="date" name="event_date" placeholder="when will it happen" required>
						</div>
						<div class="w3-col m6">
							<label for="event_type">event type</label>
							<select name="event_type" required>
								<option disabled="yes" selected value="">--choose event type--</option>
								<option value="Fundraising">Fundraising</option>
								<option value="Cultural">Cultural</option>
								<option value="Photography">Photography</option>
								<option value="conference">conference</option>
								<option value="Social">Social (wedding, Funeral, Birthday)</option>
								<option value="misc">Other (include in description)</option>
							</select>
							<label for="facid">required facility</label>
							<select name="facid" required onchange="calculate_price()">
								<option disabled="yes" selected value="">--choose a facility--</option>
							</select>
						</div>
						<div class="w3-col m12">
							<label for="event_desc">Description</label>
							<textarea name="event_desc" rows="5" required placeholder="enter a short description here"></textarea>
							<label>price</label>
							<input type="number" name="payamt" readonly value="" placeholder="price appears here">
							<input type="hidden" name="chosen_facility" value="">
							<input type="hidden" name="payment_verified" value="">
							<input type="hidden" name="payment_code" value="">
						</div>
					</div>
					<div class="options">
						<a class="themebtn btn w3-light-grey standin checkbtn"><i class="fa fa-calendar"></i> check availability</a>
						<a class="themebtn btn w3-light-grey standin w3-hide paybtn" onclick="payup()"><i class="fa fa-credit-card"></i> confirm payment</a>
							<button class="themebtn btn w3-hide submitter"><i class="fa fa-plus"></i> reserve event</button>
					</div>
				</form>
			</div>
			<div class="formguy panel">
				<form class="f1 w3-animate-opacity" action="actions/reserve_visit.php" id="reserve_visit">
					<h1 class="w3-center">Reserve new visit</h1>
					<hr>
					<div class="w3-row">
						<div class="w3-col m6">
							<label for="v_name">Visitor name</label>
							<select name="v_id" required>
								<!-- value is the user id caption is the visitor name -->
								<option disabled="yes" selected value="">--choose visitor--</option>
							</select>
						</div>
						<div class="w3-col m6">
							<label for="v_date">visit date</label>
							<input type="date" name="v_date" placeholder="when will it happen" required>
						</div>
					</div>
					<div class="options">
						<button class="themebtn btn"><i class="fa fa-book"></i> reserve visit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="mymodal" id="paymodal" data-shown="0">
		<div class="">
			<div class="formguy" style="display: flex;">
				<form action="#" class="w3-white f1" id="payform">
					<a class="w3-right w3-btn btn w3-hover-text-red" onclick="toggleShowB('#paymodal','flex','none')"><i class="fa fa-times"></i></a>
					<div class="hld">
						<h3 class="payshow">Amount to pay <b>35,000</b></h3>
						<label>verification code</label>
						<input type="text" name="v_code" placeholder="enter verification code here..." required>
						<label>Amount to be paid</label>
						<input type="text" name="amount_paid" id="theamt" placeholder="enter Amount paid here..." disabled>
						<input type="hidden" name="amount_to_pay" value="0">
						<input type="hidden" name="pay_purpose" value="reserve_visit">
						<button class="btn themebtn"><i class="fa fa-check"></i> Confirm payment</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<?php
		include 'elements/footer.php';
	?>

	<script>
		tabSwitch(0,'.panel','none','flex')

		function switchtab(n){
			tabSwitch(n,'.panel','none','flex');
			let naver = document.querySelector('.naver');
			let links = naver.querySelectorAll('a');

			links.forEach(el => {
				el.classList.remove('active');
			})

			links[n].classList.add('active');
		}
	</script>

	<script>
		let facilities = [<?php echo $facslist;?>];
		let fac_prices = [<?php echo $thefacs;?>];
		let users = [<?php echo $vlist;?>]

		// elemnents
		let eventform = document.querySelector('#reserve_event');
		let vstform = document.querySelector('#reserve_visit');
		let payform = document.querySelector('#payform');

		let conbtn = eventform.querySelector('.standin.checkbtn');

		let price = 0;


		payform.addEventListener("submit", e => {
			e.preventDefault();
			let payamt = payform.querySelector('input#theamt').value.replaceAll(',',"");
			let paycode = payform.v_code.value;
			payform.querySelector('button').style.scale = '0';

			if(Number(payamt) >= Number(payform.amount_to_pay.value)){
				let xhr = new XMLHttpRequest();
				let formData = new FormData(payform);

				xhr.open("POST", "actions/add_payment.php", true);

				xhr.onreadystatechange = function() {
					if (xhr.readyState === 4 && xhr.status === 200) {
						let resdata = xhr.responseText.split("|");

						alert(resdata[0]);
						if(resdata[1] == "true"){
							verifyPayment(paycode);
						}
					} else if (xhr.status.toString().includes("40")){
						alert(`connection failed! status(${xhr.status})`);
						payform.querySelector('button').style.scale = '1';
					}
				};
				xhr.send(formData);

			} else {
				alert('Amount paid must be exact!')
			}
		});

		conbtn.addEventListener('click',e => {
			let xhr = new XMLHttpRequest();
			let formData = new FormData(eventform);

			conbtn.style.scale = "0";

			// data
			let facname = eventform.chosen_facility.value;
			let thedate = eventform.event_date.value;

			if(facname != "" && thedate != ""){

				const params = new URLSearchParams({ date: thedate, fac: facname });

				fetch(`actions/checkeventdate.php?${params}`)
				    .then(response => response.text())
				    .then(data => {
				        if (data.includes('true')) {
				            alert(`${data.split("|")[0]}`);
				            checkavailable();
				        } else {
				            alert(`${data.split("|")[0]}`);
				            conbtn.style.scale = "1";
				        }
				    })
				    .catch(error => {
				        console.error('Error:', error);
				        conbtn.style.scale = "1";
				    });

			} else {
				alert("pick a date and facility first");
				conbtn.style.scale = "1";
			}

		})

		// setup inputs
		function setupinputs() {
			// reserve events
			let fac_sel = eventform.facid;

			facilities.forEach((el,id) => {
				let b = document.createElement('option');

				b.innerHTML = el;
				b.dataset.price = fac_prices[id][1];
				b.dataset.index = id;
				b.value = id;

				fac_sel.appendChild(b);
			});
		}

		// calculate price
		function calculate_price() {
			let facid = eventform.facid.value;

			// initial markup and payment setup
			let facname = 0;
			let finalprice = 500;

			finalprice += fac_prices[Number(facid)][1];
			facname = fac_prices[Number(facid)][0];
			price = finalprice;

			eventform.payamt.value = finalprice;
			eventform.chosen_facility.value = facname;
		}

		// pay modal
		function payup() {
			let payamt = price;

			if(eventform.payamt.value != ""){
				payform.querySelector('.payshow').innerHTML = `Amount to pay <b>${payamt.toLocaleString()}</b>`;
				payform.amount_to_pay.value = payamt;
				payform.amount_paid.value = payamt;
				toggleShowB('#paymodal','flex','none');
			} else {
				alert("enter the required information first");
			}
		}

		function checkavailable() {
			eventform.querySelector('.standin.checkbtn').style.display = 'none';
			eventform.querySelector('.standin.paybtn').classList.remove('w3-hide');
		}

		function verifyPayment(code) {
			eventform.querySelector('.standin.paybtn').style.display = 'none';
			eventform.querySelector('.submitter').classList.remove('w3-hide');

			eventform.payment_verified.value = "yes";
			eventform.payment_code.value = code;

			toggleShowB('#paymodal','flex','none');
		}

		window.onload = e => {
			setupinputs();
		}
	</script>
</body>
</html>