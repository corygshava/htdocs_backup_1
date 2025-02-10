<?php
	include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../list_reservations.php?req=events';

	if (isset($_POST['event_name'], $_POST['event_date'], $_POST['event_type'], $_POST['event_desc'], $_POST['chosen_facility'], $_POST['payment_code'])) {
		$event_name = $_POST['event_name'];
		$event_date = $_POST['event_date'];
		$event_type = $_POST['event_type'];
		$event_desc = $_POST['event_desc'];
		$chosen_facility = $_POST['chosen_facility'];
		$payment_code = $_POST['payment_code'];

		// Generate a random 5-letter string for rsv_serial
		$rsv_serial = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);

		// Insert the event reservation
		$query = "INSERT INTO event_reservations (rsv_serial, rsv_status, facility, event_name, event_date, event_type, event_description, pay_code) 
				  VALUES ('$rsv_serial', 'pending', '$chosen_facility', '$event_name', '$event_date', '$event_type', '$event_desc', '$payment_code')";

		// Execute query and check if successful
		$opres = $conn->query($query) == true;
		$restxt = ($opres) ? "Event reservation added successfully." : "Error: " . $conn->error;
	} else {
		$restxt = "Error: Missing required values.";
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
