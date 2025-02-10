<?php
	include('actions/connect.php');
	include 'workers/functions.php';

	// Query to fetch itemvalue where itemname contains 'utype_'
	$result = $conn->query("SELECT * FROM systemdata WHERE itemname like 'fac_%'");
	$theres = "";

	$thefacs = "";
	$facslist = "";
	$userlist = "";

	if ($result->num_rows > 0) {
		// Loop through each record and display the itemvalue
		while ($row = $result->fetch_assoc()) {
			$thename = $row['itemname'];
			$thecat = processcat($row['itemname']);
			$theamt = $row['itemvalue'];
			$thefacs .= "[\"{$thecat}\" , $theamt],";
			$facslist .= "\"{$thecat}\", ";
		}
	} else {
		echo "No facilities found. Add them to enable reserving events";
		exit();
	}

	$visitors = $conn->query("SELECT * FROM visitors WHERE status <> 'visiting'");

	$vlist = "";
	$vcount = $visitors->num_rows;
	// echo "<br>found {$vcount} visitors";

	if($vcount > 0){
		while($row = $visitors->fetch_assoc()){
			$id = $row['Id'];
			$uname = $row['visitor_name'];

			$vlist .= "[\"$uname\",$id],";
		}
	} else {
		$users = "nada";
	}
?>