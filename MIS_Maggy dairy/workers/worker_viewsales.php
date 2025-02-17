<?php 
	if($curusertype != "admin"){
		$fid = $curuserid;
		$thequery = "SELECT * FROM sales WHERE farmerid=$fid";
	} else if(isset($_GET['farmerid'])){
		$fid = $_GET['farmerid'];
		$thequery = "SELECT * FROM sales WHERE farmerid=$fid";
	} else {
		$thequery = "SELECT * FROM sales WHERE 1";
	}
	$result = $conn->query($thequery);
	$reccount = $result->num_rows;
	$outxt = "";

	$hed = "
		<th>Id</th>
		<th>farmer name</th>
		<th>Transaction_code</th>
		<th>quantity</th>
		<th>Amount_paid</th>
		<th>Date_of_sale</th>
		<th>status</th>
		<th>actions</th>
	";
	
	while ($row = $result->fetch_assoc()) {
		$Id = $row['Id'];
		$farmerid = $row['farmerid'];
		$Transaction_code = $row['Transaction_code'];
		$quantity = $row['quantity'];
		$Amount_paid = number_format($row['Amount_paid']);
		$Date_of_sale = $row['Date_of_sale'];
		$status = $row['status'];

		$farmerres = $conn->query("select * from farmers where Id=$farmerid");
		$fcount = $farmerres->num_rows;
		$farmer_name = $fcount > 0 ? $farmerres->fetch_assoc()['farmer_name'] : '??';

		$actionUI = $curusertype == "admin" && $status == 'pending' ? "<div class=\"btn-group\">
			<button class=\"btn btn-primary verifybtn\" data-myid='$Id' data-myop=\"verified\"><i class=\"fa fa-check\"></i> verify</button>
			<button class=\"btn btn-danger verifybtn\" data-myid='$Id' data-myop=\"rejected\"><i class=\"fa fa-times\"></i> reject</button>
		</div>" : "--";

		$outxt .= "<tr>
			<td>$Id</td>
			<td>$farmer_name</td>
			<td>$Transaction_code</td>
			<td>$quantity</td>
			<td>$Amount_paid</td>
			<td>$Date_of_sale</td>
			<td>$status</td>
			<td>$actionUI</td>
		</tr>";
	}
?>