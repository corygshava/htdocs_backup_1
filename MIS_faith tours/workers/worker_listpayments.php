<?php
	// Include the database connection file
	include('actions/connect.php');

	// Query to fetch all records from the table
	$result = $conn->query("SELECT * FROM payments");
	$outxt = "";
	$reccount = $result->num_rows;

	// Check if there are any records
	if ($reccount > 0) {
		// Loop through each record and display the details
		while ($row = $result->fetch_assoc()) {
			$pay_code = $row['pay_code'];
			$pay_amount = $row['pay_amount'];
			$pay_purpose = $row['pay_purpose'];
			$pay_date = $row['pay_date'];

			$outxt .= "
				<tr>
					<td>$pay_code</td>
					<td>$pay_amount</td>
					<td>$pay_purpose</td>
					<td>$pay_date</td>
				</tr>
			";
		}
	} else {
		$outxt .= "
			<tr class=\"ender\">
				<td colspan=\"4\">
					<p>no records found</p>
				</td>
			</tr>";
	}
?>
