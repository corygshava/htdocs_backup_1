<?php
	include 'actions/checksession.php';
?>

<?php
	// Include the database connection
	require_once 'actions/connect.php';

	// Fetch all records from the Farmers table
	$sql = "SELECT * FROM Farmers";
	$result = $conn->query($sql);

	// Start the HTML table
	$res = '';
	$res .= "<tr>
	        <th>ID</th>
	        <th>Name</th>
	        <th>Phone Contact</th>
	        <th>Email</th>
	        <th>Location</th>
	        <th>Date Added</th>
	        <th>intakes</th>
	        <th>actions</th>
	    </tr>";

	// Check if there are any records in the table
	if ($result->num_rows > 0) {
	    // Output data for each row
	    $roundcount = 0;

	    while ($row = $result->fetch_assoc()) {
	    	$nq = "SELECT COUNT(*) as res FROM intakes WHERE farmer_id = '{$row['Id']}'";
	    	$reslt = $conn->query($nq);
	    	$intakes = $reslt ? $reslt->fetch_assoc()['res'] : '0';

	        $res .="<tr>
	                <td>{$row['Id']}</td>
	                <td>{$row['Name']}</td>
	                <td>{$row['Phone_contact']}</td>
	                <td>{$row['email']}</td>
	                <td>{$row['location']}</td>
	                <td>{$row['date_added']}</td>
	                <td>$intakes</td>
	                <td>
						<button class=\"optbtn\" onclick=\"editrec({$roundcount})\"><i class=\"fa fa-pencil\"></i> edit</button>
						<button class=\"optbtn\" onclick=\"handleDelete({$row['Id']})\"><i class=\"fa fa-trash\"></i> delete</button>
					</td>
	              </tr>";
	    	$roundcount += 1;
	    }
	} else {
	    $res .="<tr><td colspan='8' style='text-align:center;'>No farmers found</td></tr>";
	}

	// Add the final row with "that's all"
	$res .="<tr><td colspan='8' style='text-align:center;'>That's all</td></tr>";

	// Close the database connection
	$conn->close();
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
	<title>Manage farmers</title>
</head>
<body>
	<?php
		include 'elements/navbar.php';
	?>
	<div class="contenter">
		<div class="tableholder">
			<div class="title">
				<h2 class="w3-center">Registered farmers</h2>
			</div>
			<table class="w3-table matable">
				<?php echo "$res";?>
			</table>

			<div class="container">
				<a href="registerfarmer.php" class="themebtn">add new</a>
			</div>
		</div>
	</div>

	<?php
		include 'elements/footer.php';
	?>

	<div class="w3-modal themodal" data-shown="0" style="padding: 0;">
		<div class="modalform">
			<div class="theform w3-animate-zoom">
				<form action="actions/editfarmer.php" method="post" id="maform">
					<div>
						<button class="w3-right w3-btn" type="reset" onclick="toggleShow('.themodal')"><i class="fa fa-close"></i></button>
					</div>
					<h3>edit farmer information</h3>
					<div class="flexresponsive row">
						<div class="mobi">
							<div class="npt">
								<label for="fname">Farmer name</label>
								<input type="text" name="fname" id="fname" placeholder="enter the name here">
								<input type="hidden" name="f_id" id="f_id" value="0">
							</div>
							<div class="npt">
								<label for="fcontact">Farmer phone number</label>
								<input type="text" name="fcontact" id="fcontact" placeholder="enter the phone number here">
							</div>
						</div>
						<div class="mobi">
							<div class="npt">
								<label for="femail">email</label>
								<input type="text" name="femail" id="femail" placeholder="enter the email here">
							</div>
							<div class="npt">
								<label for="flocation">location</label>
								<input type="text" name="flocation" id="flocation" placeholder="enter location here">
							</div>
						</div>
					</div>
					<div class="w3-center">
						<button class="themebtn">update <i class="fa fa-send"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="w3-modal delmodal" data-shown="0" style="padding: 0;">
		<div class="modalform">
			<div class="theform w3-animate-zoom">
				<form action="actions/delfarmer.php" method="post" id="delform">
					<div>
						<button class="w3-right w3-btn" type="reset" onclick="toggleShow('.delmodal')"><i class="fa fa-close"></i></button>
					</div>
					<h3 class="w3-center">delete farmer's record</b></h3>
					<input type="hidden" name="f_id" value="nada">
					<div class="w3-center">
						<!-- <button class="themebtn" type="reset">cancel <i class="fa fa-close"></i></button> -->
						<button class="themebtn" type="submit">delete <i class="fa fa-trash"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="js/superscript.js"></script>

	<script>
		var delform = document.querySelector('#delform');
		var editform = document.querySelector('#maform');

		// edits the value of theid in the modal form
		function editrec(n) {
			// open modal
			toggleShow('.themodal');
			// find the row to use
			let tbl = document.querySelector('table');
			let trow = tbl.querySelectorAll('tr')[n + 1];
			let tcells = trow.querySelectorAll('td');

			// find the data from the row
			/*
				<th>Name</th>
				<th>Phone number</th>
				<th>Email</th>
				<th>intakes</th>
				<th>seeds brought (KG)</th>
				<th>location</th>
			*/
			let f_name = tcells[1].innerHTML;
			let f_id = tcells[0].innerHTML;
			let f_contact = tcells[2].innerHTML;
			let f_email = tcells[3].innerHTML;
			let f_location = tcells[4].innerHTML;

			// update the items in the modal
			let daform = editform;
			let npt_id = daform.f_id;
			let npt_name = daform.fname;
			let npt_contact = daform.fcontact;
			let npt_email = daform.femail;
			let npt_location = daform.flocation;

			npt_id.value = f_id;
			npt_name.value = f_name;
			npt_contact.value = f_contact;
			npt_email.value = f_email;
			npt_location.value = f_location;
		}

		function handleDelete(recid) {
			toggleShow('.delmodal');

			delform.f_id.value = recid;
		}
	</script>
</body>
</html>