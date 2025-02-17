<?php
	if($curusertype != "admin"){
		$fid = $curuserid;
		$thequery = "SELECT * FROM milk WHERE farmerid=$fid";
	} else if(isset($_GET['farmerid'])){
		$fid = $_GET['farmerid'];
		$thequery = "SELECT * FROM milk WHERE farmerid=$fid";
	} else {
		$thequery = "SELECT * FROM milk WHERE 1";
	}
	$result = $conn->query($thequery);
	$reccount = $result->num_rows;
	$outxt = "";

	$hed = "
		<th>Farmer responsible</th>
		<th>Quantity (litres)</th>
		<th>date brought</th>
	";
	
	while ($row = $result->fetch_assoc()) {
		$Id = $row['Id'];
		$farmerid = $row['farmerid'];
		$quantity = $row['quantity'];
		$date_brought = $row['date_brought'];

		$farmerres = $conn->query("select * from farmers where Id=$farmerid");
		$fcount = $farmerres->num_rows;
		$farmer_name = $fcount > 0 ? $farmerres->fetch_assoc()['farmer_name'] : '??';

		$outxt .= "<tr>
			<td>$farmer_name</td>
			<td>$quantity</td>
			<td>$date_brought</td>
		</tr>";
	}

	$greetxt = $curusertype == "admin" ? "All Milk intakes" : "Your milk intakes";
?>