<?php
	include 'actions/checksession.php';
	include 'workers/worker_newvisit.php';
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

	<style>
		nav{position: fixed !important;}
		footer:hover{opacity: 0.2 !important;}
		.maparea:hover{z-index: 500;}
	</style>

	<title>New visit</title>
</head>
<body>
	<?php
		include 'elements/navguy.php';
	?>

	<div class="content newvisit">
		<div class="w3-row" style="height: 100vh;overflow: hidden;">
			<div class="w3-col m5" style="overflow-y: auto;">
				<div class="formguy">
					<form action="actions/add_visit.php" id="newvisitform" method="post">
						<h1 class="w3-center">Add new visit</h1>
						<hr>
						<div class="hld">
							<!-- if a userid is already passed show a disabled input with the name and a hidden input for the id named v_id -->
							<label for="visitor_id">Visitor name</label>
							<select name="visitor_id" required="" readonly="" onchange="calculate_price()">
								<option disabled="yes" selected="" value="">--choose visitor--</option>
							</select>

							<label for="visit_type">Tour type</label>
							<select name="visit_type" required="" readonly="" onchange="calculate_price()">
								<option disabled="yes" selected="" value="">--choose visit type--</option>
							</select>

							<div>
								amount to pay: <br>
								<input type="text" readonly value="45,000" name="visit_price">
							</div>

							<input type="hidden" name="payment_verified" value="no">
							<input type="hidden" name="payment_code" value="0">
							<input type="hidden" name="visitor_type" value="unset">
						</div>
						<div class="options">
							<a href="#" class="themebtn btn w3-light-grey standin" onclick="payup()"><i class="fa fa-credit-card"></i> confirm payment</a>
							<button class="themebtn btn w3-hide submitter"><i class="fa fa-building"></i> add new visit</button>
						</div>
					</form>
				</div>
			</div>
			<div class="w3-col m7">
				<div class="w3-blue maparea" data-curitem="unmarked area" data-tek-point="left:1px;top:504px;" data-coords="1,504">
					<img src="images/map.jpg">
					<div class="coverme l3">
						<div class="pointer" style="left: 1px; top: 504px;">unmarked area</div>
					</div>
					<div class="w3-display-topright over l1">
						<h3>Our map</h3>
						<span>Hover to show which area is which</span>
					</div>
					<div class="coverme over l5 points"></div>
				</div>
			</div>

			<div class="mymodal" id="paymodal" data-shown="0">
				<div class="w3-whiter">
					<div class="formguy">
						<form action="#" class="w3-white" id="payform">
							<a class="w3-right w3-btn btn w3-hover-text-red" onclick="toggleShowB('#paymodal','flex','none')"><i class="fa fa-times"></i></a>
							<div class="hld">
								<h3 class="payshow">Amount to pay <b>35,000</b></h3>
								<label>verification code</label>
								<input type="text" name="v_code" placeholder="enter verification code here..." required>
								<label>Amount to be paid</label>
								<input type="text" name="amount_paid" id="theamt" placeholder="enter Amount paid here..." disabled>
								<input type="hidden" name="amount_to_pay" value="0">
								<input type="hidden" name="pay_purpose" value="new_visit">
								<button class="btn themebtn"><i class="fa fa-check"></i> Confirm payment</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<?php
		include 'elements/footer.php';
	?>

	<!-- code for the interactive map (yes all these lines) -->
	<script>
		let mapguy = document.querySelector('.maparea');
		let pnter = mapguy.querySelector('.pointer');

		let pointsguy = document.querySelector('.points');
		let points = pointsguy.querySelectorAll('.point');
		let thepoint = points[0];

		let mapoints = [],pointsData = [];

		mapguy.addEventListener('mousemove',e => {
			// update the position of the map pointer
			let x = e.clientX - mapguy.offsetLeft;
			let y = e.clientY;
			mapguy.dataset.tekPoint = `left:${x}px;top:${y}px;`;
			mapguy.dataset.coords = `${x},${y}`;
			pnter.style.left = `${x}px`;
			pnter.style.top = `${y}px`;

			mapguy.dataset.curitem = checkLocation(x,y);
			pnter.innerHTML = mapguy.dataset.curitem;
		});

		mapguy.addEventListener('mouseleave',e => {
			checkLocation(0,0);
		})

		// for setting up the points (disable later)
		/*
			let curarea = "area name";
			mapguy.addEventListener('click',e => {
				setspotter();
			})

			// for mapping the boxes
			document.addEventListener('keydown',e => {
				if(e.key.toLowerCase() == "m"){
					let payload = `\`{${thepoint.dataset.posdata},width:${thepoint.offsetWidth},height:${thepoint.offsetHeight},area: "${curarea}"}\`,`;
					copytext1(payload);
					alert("cpoied map data")
				}

				if(e.key.toLowerCase() == "s"){
					setspotter()
				}
			})

			function setspotter() {
				let coords = mapguy.dataset.coords.split(',');
				thepoint.style.left = `${coords[0]}px`;
				thepoint.style.top = `${coords[1]}px`;
				thepoint.dataset.posdata = `left:${coords[0]},top:${coords[1]}`;

				console.log('pos set')
			}
		// */

		function checkLocation(x,y) {
			let found = false,theid = 0;

			pointsData.forEach((el,id) => {
				if(!found){
					found = isInsideBox(x,y,el);
					theid = found ? id : 0;
				}
			})

			points.forEach(el => {
				el.classList.remove("current");
			})

			points[theid].classList.add("current");

			return pointsData[theid].area;
		}

		function isInsideBox(x, y, box) {
			return x >= box.left && x <= box.left + box.width &&
				y >= box.top && y <= box.top + box.height;
		}

		// mek points on the map
		function mekpoints() {
			let newpoints = { left: 300, top: 200, width: 120, height: 25 };

			mapoints.push(newpoints);

			pointsData = [
				{left:0,top:0,width:2,height:2,area: "unmarked area"},
				{left:108,top:284,width:171,height:157,area: "main complex"},
				{left:268,top:332,width:151,height:157,area: "main complex"},
				{left:0,top:0,width:311,height:177,area: "game park"},
				{left:0,top:175,width:215,height:137,area: "game park"},
				{left:209,top:177,width:131,height:157,area: "traditional homestead"},
				{left:309,top:0,width:131,height:97,area: "game park"},
				{left:312,top:99,width:151,height:177,area: "animal orphanage"},
				{left:336,top:276,width:131,height:77,area: "animal orphanage"},
				{left:439,top:41,width:131,height:157,area: "animal orphanage"},
				{left:571,top:72,width:131,height:157,area: "animal orphanage"},
				{left:460,top:192,width:131,height:157,area: "the lake"},
				{left:592,top:230,width:131,height:77,area: "river mouth"},
				{left:562,top:299,width:211,height:137,area: "girrafe habitat"},
				{left:419,top:355,width:131,height:87,area: "hippo pools viewpoint"},
				{left:443,top:438,width:231,height:117,area: "hippo pools"},
				{left:324,top:530,width:231,height:117,area: "black rhino sanctuary"},
				{left:558,top:557,width:211,height:87,area: "exterior river"},
				{left:152,top:490,width:191,height:157,area: "parking area"},
				{left:3,top:486,width:151,height:157,area: "Exit Highway"},
				{left:0,top:417,width:111,height:77,area: "exit highway"},
				{left:109,top:423,width:171,height:67,area: "main entrance"},
				{left:676,top:439,width:131,height:157,area: "forest area <br>(KEEP OUT!)"},
				{left:3,top:313,width:131,height:157,area: "forest area <br>(KEEP OUT!)"}
			];

			pointsData.forEach((s,id) => {
				let styles = JSON.stringify(s).replaceAll("\"",'').split('area:')[0].substr(1).replaceAll(',','px;');
				let htm = `<div class="point w3-blue" id="point${id}" data-area="main building" style="${styles}"></div>`;

				pointsguy.innerHTML += htm;
			})

			points = pointsguy.querySelectorAll('.point');
			thepoint = points[0];
		}

		mekpoints();
	</script>

	<!-- database data retreival -->
	<script>
		let userslist = [<?php echo $vlist;?>];
		let tourslist = [<?php echo $tourlist;?>];
		let pricedata_users = {<?php echo $thetypes;?>};
		let pricedata_tours = {<?php echo $thetours;?>};
	</script>

	<!-- data based runtime ops -->
	<script>
		let payform = document.querySelector('#payform');
		let vstform = document.querySelector('#newvisitform');

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
					} else if (xhr.status.includes("40")){
						alert(`connection failed! status(${xhr.status})`);
						payform.querySelector('button').style.scale = '1';
					}
				};
				xhr.send(formData);

			} else {
				alert('Amount paid must be exact!')
			}
		});

		// setup user select and other inputs
		function setupInputs() {
			// user select
			let thesel = vstform.visitor_id;

			userslist.forEach(el => {
				let b = document.createElement('option');
				let v_name = el[0];
				let v_type = el[1];
				let v_id = el[2];

				b.value = v_id;
				b.dataset.utype = v_type;
				b.innerHTML = v_name;

				thesel.appendChild(b);
			})

			thesel = vstform.visit_type;

			tourslist.forEach(el => {
				let b = document.createElement('option');
				let t_name = el;
				let t_val = el;

				b.value = t_val;
				b.innerHTML = t_name;

				thesel.appendChild(b);
			})
		}

		// calculate the price to pay
		function calculate_price() {
			let visitorId = vstform.visitor_id.value;
			let visitType = vstform.visit_type.value;

			let options = vstform.visitor_id.querySelectorAll('option');
			let utype_price = 0,utype="nada";
			let vtype_price = 0;

			// initial markup and payment setup
			let finprice = 0;
			let finalprice = 500;

			options.forEach((el,id) => {
				if(el.value == visitorId){
					utype = el.dataset.utype;
				}
			});

			utype_price = (utype != "") ? pricedata_users[utype] : 0;

			// alert(`${visitType} -> ${pricedata_tours[visitType]}`)
			console.log(visitType,pricedata_tours)
			vtype_price = (visitType != "") ? pricedata_tours[visitType] : 0;

			finalprice = utype_price + vtype_price;
			finprice = finalprice.toString() == "NaN" ? "--" : finalprice.toLocaleString();

			vstform.visit_price.value = finprice;
			// alert(`pricedata_tours['tour_${visitType}']`);
			// alert(`${finprice}`);
		}

		// whether or not to show the payment modal
		function payup() {
			let visitorId = vstform.visitor_id.value;
			let visitType = vstform.visit_type.value;
			let payamt = vstform.visit_price.value;

			if(visitorId != "" && visitType != ""){
				payform.querySelector('.payshow').innerHTML = `Amount to pay <b>${payamt}</b>`;
				payform.amount_to_pay.value = payamt.replaceAll(",",'');
				payform.amount_paid.value = payamt;
				toggleShowB('#paymodal','flex','none');
			} else {
				alert("enter the required information first");
			}
		}

		function verifyPayment(code) {
			vstform.querySelector('.standin').style.display = 'none';
			vstform.querySelector('.submitter').classList.remove('w3-hide');

			vstform.payment_verified = "yes";
			vstform.payment_code.value = code;

			toggleShowB('#paymodal','flex','none');
		}

		window.onload = () => {
			setupInputs();
		}
	</script>
</body>
</html>