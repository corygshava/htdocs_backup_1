<?php 
	$thequery = "SELECT * FROM users WHERE 1";

	$result = $conn->query($thequery);
	$reccount = $result->num_rows;
	$outxt = "";

	$hed = "
		<th>Username</th>
		<th>Date added</th>
		<th>actions</th>
	";
	
	while ($row = $result->fetch_assoc()) {
		$Id = $row['Id'];
		$username = $row['Username'];
		$password = $row['Password'];
		$date_added = $row['Date_added'];

		$actionUI = "
			<button class=\"btn btn-primary editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editFarmerModal\" data-fname='$username' data-pass='$password' data-myid='$Id'><i class=\"fa fa-pencil\"></i> Edit user</button>";

		$outxt .= "<tr>
			<td>$username</td>
			<td>$date_added</td>
			<td>$actionUI</td>
		</tr>";
	}
?>