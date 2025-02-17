<?php
	// Include the database connection file
	include('actions/connect.php');

	// Query to fetch all records from the visitors table
	$result = $conn->query("SELECT * FROM visitors ORDER BY status ASC");
	$outxt = "";
	$reccount = $result->num_rows;

	// Check if there are any records
	if ($result->num_rows > 0) {
		// Loop through each record and display the details
		while ($row = $result->fetch_assoc()) {
			$rid = $row['Id'];
			$Name = $row['visitor_name'];
			$ID = $row['id_no'];
			$Type = $row['user_type'];
			$Contact = $row['contact'];
			$Status = $row['status'];

			$actionUI = "<button class=\"w3-grey themehover btn editbtn\" data-myid='$rid' data-myidno=\"$ID\" data-mycontact='$Contact' data-myname='$Name'><i class=\"fa fa-pencil\"></i> edit</button>";

			if($Status == "visiting"){
				$vsres = $conn->query("SELECT Id FROM visits WHERE visitorid = '$rid' and status = 'pending'");

				if($vsres){
					if($vsres->num_rows > 0){
						$vsid = $vsres->fetch_assoc()['Id'];
						$actionUI .= "<button class=\"w3-black themehover btn checkbtn\" data-myid='$vsid'><i class=\"fa fa-arrow-right\"></i> checkout</button>";
					}
				}
			} else {
				$actionUI .= "<button class=\"w3-grey themehover btn visitbtn\" data-myid='$rid'><i class=\"fa fa-book\"></i> new visit</button>";
			}

			$outxt .= "
				<tr>
					<td>$Name</td>
					<td>$ID</td>
					<td>$Contact</td>
					<td>$Type</td>
					<td>
						$actionUI
					</td>
				</tr>
			";
		}
	} else {
		$outxt .= "
			<tr class=\"ender\">
				<td colspan=\"5\">
					<p>no records found</p>
				</td>
			</tr>";
	}
?>
