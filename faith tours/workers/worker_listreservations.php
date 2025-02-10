<?php
	// Include the database connection file
	include('actions/connect.php');

	// Query to fetch all records from the visitors table
	$result = $conn->query("SELECT * FROM event_reservations ORDER BY rsv_date ASC");
	$outxt = "";
	$hed = "
		<th>reservation date</th>
		<th>reservation serial</th>
		<th>reservation status</th>
		<th>facility</th>
		<th>event name</th>
		<th>event date</th>
		<th>event type</th>
		<th>payment_code</th>
		<th>actions</th>
	";
	$reccount = $result->num_rows;

	// Check if there are any records
	if ($result->num_rows > 0) {
		// Loop through each record and display the details
		while ($row = $result->fetch_assoc()) {
			$rid = $row['Id'];
			$rsv_date = $row['rsv_date'];
			$rsv_serial = $row['rsv_serial'];
			$rsv_status = $row['rsv_status'];
			$facility = $row['facility'];
			$event_name = $row['event_name'];
			$event_date = $row['event_date'];
			$event_type = $row['event_type'];
			$event_description = $row['event_description'];
			$pay_code = $row['pay_code'];

			$actionUI = "
				<button class=\"w3-grey themehover btn viewbtn\" data-myid='$rid' data-msg=\"$event_description\"><i class=\"fa fa-eye\"></i> read description</button>
				<button class=\"w3-grey themehover btn delbtn\" data-myid='$rid'><i class=\"fa fa-trash\"></i> delete</button>";

			$outxt .= "
				<tr>
					<td>$rsv_date</td>
					<td>$rsv_serial</td>
					<td>$rsv_status</td>
					<td>$facility</td>
					<td>$event_name</td>
					<td>$event_date</td>
					<td>$event_type</td>
					<td>$pay_code</td>
					<td>
						$actionUI
					</td>
				</tr>
			";
		}
	} else {
		$outxt .= "
			<tr class=\"ender\">
				<td colspan=\"9\">
					<p>no records found</p>
				</td>
			</tr>";
	}
?>
