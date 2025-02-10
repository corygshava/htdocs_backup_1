<?php
	// Include the database connection file
	include('actions/connect.php');

	// Query to fetch all records from the visitors table
	$result = $conn->query("SELECT * FROM feedback ORDER BY fbk_status ASC");
	$outxt = "";
	$hed = "
		<th>date</th>
		<th>review</th>
		<th>visitor name</th>
		<th>status</th>
		<th>actions</th>
	";
	$reccount = $result->num_rows;

	// Check if there are any records
	if ($result->num_rows > 0) {
		// Loop through each record and display the details
		while ($row = $result->fetch_assoc()) {
			$rid = $row['Id'];
			$fbk_date = $row['fbk_date'];
			$fbk_status = $row['fbk_status'];
			$fbk_text = $row['fbk_text'];
			$fbk_review = $row['fbk_review'];
			$visitor_id = $row['visitor_id'];

			$Name = "??";
			$nameres = $conn->query("SELECT visitor_name AS thename FROM visitors WHERE id='$visitor_id'");
			if($nameres){
				$Name = $nameres->fetch_assoc()['thename'];
			}


			$actionUI = "
				<button class=\"w3-grey themehover btn viewbtn\" data-myid='$rid' data-msg=\"$fbk_text\"><i class=\"fa fa-eye\"></i> read review</button>";
			$actionUI .= $fbk_status == "read" ? "" : "
				<button class=\"w3-grey themehover btn delbtn\" data-myid='$rid'><i class=\"fa fa-check\"></i> mark as read</button>";

			$stars = "";
			$cnt = 0;

			while($cnt < 5){
				$stars .= $cnt < $fbk_review ? "<i class=\"fa fa-star\"></i>" : "<i class=\"fa fa-star-o\"></i>";
				$cnt += 1;
			}

			$outxt .= "
				<tr>
					<td>$fbk_date</td>
					<td>$stars</td>
					<td>$Name</td>
					<td>$fbk_status</td>
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
