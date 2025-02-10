<?php
	// Include the database connection file
	include('actions/connect.php');

	// Query to fetch all records from the visitors table
	$result = $conn->query("SELECT * FROM visits");
	$outxt = "";
	$hed = "
		<th>Id</th>
		<th>visitor name</th>
		<th>tour_type</th>
		<th>date_started</th>
		<th>date_ended</th>
		<th>payment_code</th>
		<th>status</th>
	";
	$reccount = $result->num_rows;

	// Check if there are any records
	if ($reccount > 0) {
		// Loop through each record and display the details
		while ($row = $result->fetch_assoc()) {
			$rid = $row['Id'];
			$vid = $row['visitorid'];
			$Name = "??";

			$nameres = $conn->query("SELECT visitor_name AS thename FROM visitors WHERE id='$vid'");
			if($nameres){
				$Name = $nameres->fetch_assoc()['thename'];
			}

			$Id = $row['Id'];
			$visitorid = $row['visitorid'];
			$tour_type = $row['tour_type'];
			$date_started = $row['date_started'];
			$date_ended = $row['date_ended'];
			$payment_code = $row['payment_code'];
			$status = $row['status'];

			$actionUI = "";
			$actionUI .= $status == "pending" ? "
						<button class=\"w3-black themehover btn checkbtn\" data-myid='$Id'><i class=\"fa fa-arrow-right\"></i> checkout</button>" :
						"--";

			$outxt .= "
				<tr>
					<td>$Id</td>
					<td>$Name</td>
					<td>$tour_type</td>
					<td>$date_started</td>
					<td>$date_ended</td>
					<td>$payment_code</td>
					<td>$status</td>
					<td>
						$actionUI
					</td>
				</tr>
			";
		}
	} else {
		$outxt .= "
			<tr class=\"ender\">
				<td colspan=\"8\">
					<p>no records found</p>
				</td>
			</tr>";
	}
?>
