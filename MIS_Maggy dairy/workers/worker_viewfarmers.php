<?php 
	if(isset($_GET['farmerid'])){
		$fid = $_GET['farmerid'];
		$thequery = "SELECT * FROM farmers WHERE Id=$fid";
	} else {
		$thequery = "SELECT * FROM farmers WHERE 1";
	}
	$result = $conn->query($thequery);
	$reccount = $result->num_rows;
	$outxt = "";

	$hed = "
		<th>Name</th>
		<th>ID No</th>
		<th>Location</th>
		<th>Contact</th>
		<th>Date Added</th>
		<th>intakes</th>
		<th>Milk brought</th>
		<th>Milk sold</th>
		<th>earnings</th>
		<th>Actions</th>
	";
	
	while ($row = $result->fetch_assoc()) {
		$Id = $row['Id'];
		$farmer_name = $row['farmer_name'];
		$pass = $row['Password'];
		$id_no = $row['id_no'];
		$location = $row['location'];
		$contact = $row['contact'];
		$date_added = $row['date_added'];

		$milkres = $conn->query("SELECT COUNT(*) as intakes FROM milk WHERE farmerid = $Id");
		$milkintakes = $milkres->fetch_assoc()['intakes'];

		$amtres = $conn->query("SELECT SUM(quantity) as amt FROM milk WHERE farmerid = $Id");
		$milkamt = $amtres->fetch_assoc()['amt'];
		$milkamt = $milkamt == "" ? 0 : $milkamt;

		$amtres = $conn->query("SELECT SUM(quantity) as amt FROM sales WHERE farmerid = $Id and status='verified'");
		$milksold = $amtres->fetch_assoc()['amt'];
		$milksold = $milksold == "" ? 0 : $milksold;

		$amtres = $conn->query("SELECT SUM(amount_paid) as amt FROM sales WHERE farmerid = $Id and status='verified'");
		$earned = $amtres->fetch_assoc()['amt'];
		$earned = $earned == "" ? 0 : number_format($earned);

		$actionUI = "<div class=\"btn-group\">
			<a class=\"btn btn-primary\" href='view_milkintakes.php?farmerid=$Id'><i class=\"fa fa-list\"></i> intakes</a>
			<a class=\"btn btn-primary\" href='view_milksales.php?farmerid=$Id'><i class=\"fa fa-credit-card\"></i> sales</a>
		";
		$actionUI .= $curusertype == "admin" ? "<button class=\"btn btn-primary editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editFarmerModal\" data-fname='$farmer_name' data-pass='$pass' data-idno='$id_no' data-loc='$location' data-contact='$contact' data-myid='$Id'><i class=\"fa fa-edit\"></i> Edit</button>" : "<button class=\"btn btn-primary editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editFarmerModal\" data-fname='$farmer_name' data-pass='$pass' data-idno='$id_no' data-loc='$location' data-contact='$contact' data-myid='$Id'><i class=\"fa fa-pencil\"></i> Edit</button>";
		$actionUI .= "</div>";

		$outxt .= "<tr>
			<td>$farmer_name</td>
			<td>$id_no</td>
			<td>$location</td>
			<td>$contact</td>
			<td>$date_added</td>
			<td>$milkintakes</td>
			<td>$milkamt litres</td>
			<td>$milksold litres</td>
			<td>{$earned} ksh</td>
			<td>$actionUI</td>
		</tr>";
	}

	$greetxt = $curusertype == "admin" ? "All farmers" : "Your information";
?>