<?php
	// Include the database connection file
	include('actions/connect.php');

	// Query to fetch all records from the visitors table
	$result = $conn->query("SELECT * FROM users");
	$outxt = "";
	$hed = "
		<th>date added</th>
		<th>username</th>
		<th>actions</th>
	";
	$reccount = $result->num_rows;

	// Check if there are any records
	if ($result->num_rows > 0) {
		// Loop through each record and display the details
		while ($row = $result->fetch_assoc()) {
			$rid = $row['Id'];
			$Username = $row['Username'];
			$Password = $row['Password'];
			$Date_added = $row['Date_added'];

			$actionUI = "
				<button class=\"w3-grey themehover btn viewbtn\" data-myid='$rid' data-msg=\"$Password\"><i class=\"fa fa-eye\"></i> view password</button>";

			$outxt .= "
				<tr>
					<td>$Date_added</td>
					<td>$Username</td>
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
