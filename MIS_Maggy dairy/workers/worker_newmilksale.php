<?php
	if($curusertype != "admin"){
		$fid = $curuserid;
		$thequery = "SELECT * FROM farmers WHERE id=$fid";
	} else if(isset($_GET['farmerid'])){
		$fid = $_GET['farmerid'];
		$thequery = "SELECT * FROM farmers WHERE id=$fid";
	} else {
		$thequery = "SELECT * FROM farmers WHERE 1";
	}

	$pricereq = $conn->query("SELECT itemvalue FROM systemdata WHERE itemname = 'price_per_litre'");
	$theprice = $pricereq->fetch_assoc()['itemvalue'];

	$userreq = $conn->query($thequery);
	$users = "";
	$reccount = $userreq->num_rows;

	if($userreq->num_rows > 0){
		while($row = $userreq->fetch_assoc()){
			$theid = $row['Id'];

			$quanreq = $conn->query("SELECT SUM(quantity) as amt FROM milk WHERE farmerid='$theid'");
			$quanamt = $quanreq->num_rows > 0 ? $quanreq->fetch_assoc()['amt'] : 0;
			$quanamt = $quanamt == "" ? 0 : $quanamt;

			$soldreq = $conn->query("SELECT SUM(quantity) as amt FROM sales WHERE farmerid='$theid' and (status = 'verified' or status='pending')");
			$soldamt = $soldreq->num_rows > 0 ? $soldreq->fetch_assoc()['amt'] : 0;
			$soldamt = $soldamt == "" ? 0 : $soldamt;

			$myquan = ($quanamt - $soldamt);
			$users .= "[\"{$theid}\",\"{$row['farmer_name']}\",$myquan],";

		}
	}
?>