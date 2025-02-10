<?php
	// Include the database connection file
	include('actions/connect.php');
	include('workers/functions.php');

	if(isset($_GET['vid'])){
		$theid = $_GET['vid'];
		$idpassed = true;
	} else {
		$idpassed = false;
		$theid = 0;
	}

	// Query to fetch itemvalue where itemname contains 'utype_'
	$result = $conn->query("SELECT * FROM systemdata WHERE itemname LIKE 'utype_%' or itemname like 'tour_%'");
	$theres = "";

	$thetypes = "";
	$thetours = "";
	$tourlist = "";

	// echo "<br>getting system data";

	// Check if there are any records
	if ($result->num_rows > 0) {
		// Loop through each record and display the itemvalue
		while ($row = $result->fetch_assoc()) {
			$thename = $row['itemname'];
			$thecat = processcat($row['itemname']);
			$theamt = $row['itemvalue'];

			if(strpos($thename, "utype_") === 0){
				$thetypes .= "\"{$thecat}\" : $theamt,";
			} else {
				$thetours .= "\"{$thecat}\" : $theamt,";
				$tourlist .= "'$thecat',";
			}
		}
	} else {
		echo "No matching records found.";
	}

	// echo "$tourlist";
	// echo "<br>getting visitors data";

	if($idpassed){
		$visitors = $conn->query("SELECT * FROM visitors WHERE id=$theid and status <> 'visiting'");
	} else {
		$visitors = $conn->query("SELECT * FROM visitors WHERE status <> 'visiting'");
	}

	$vlist = "";
	$vcount = $visitors->num_rows;
	// echo "<br>found {$vcount} visitors";

	if($vcount > 0){
		// echo "<br>showing visitor info";

		while($row = $visitors->fetch_assoc()){
			$id = $row['Id'];
			$uname = $row['visitor_name'];
			$utype = $row['user_type'];

			$vlist .= "[\"$uname\",'$utype','$id'],";
		}
	} else {
		$users = "nada";
	}
?>
