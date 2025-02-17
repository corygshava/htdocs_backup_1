<?php 
	$thequery = "SELECT * FROM systemdata WHERE 1";

	$result = $conn->query($thequery);
	$reccount = $result->num_rows;
	$outxt = "";

	$hed = "
		<th>item name</th>
		<th>item value</th>
		<th>Date added</th>
		<th>Date changed</th>
		<th>actions</th>
	";
	
	while ($row = $result->fetch_assoc()) {
		$Id = $row['Id'];
		$iname = $row['itemname'];
		$ival = $row['itemvalue'];
		$date_added = $row['date_added'];
		$date_changed = $row['date_changed'];

		$actionUI = "
			<button class=\"btn btn-primary editbtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editFarmerModal\" data-fname='$iname' data-pass='$ival' data-myid='$Id'><i class=\"fa fa-pencil\"></i> Edit data</button>";

		$outxt .= "<tr>
			<td>$iname</td>
			<td>$ival</td>
			<td>$date_added</td>
			<td>$date_changed</td>
			<td>$actionUI</td>
		</tr>";
	}
?>