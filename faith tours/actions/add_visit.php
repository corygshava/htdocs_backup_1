<?php
	include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../list_visits.php';

	if (isset($_POST['visitor_id'], $_POST['visit_type'], $_POST['visit_price'], $_POST['payment_verified'], $_POST['payment_code'], $_POST['visitor_type'])) {
		$visitor_id = $_POST['visitor_id'];
		$visit_type = $_POST['visit_type'];
		$payment_verified = $_POST['payment_verified'];
		$payment_code = $_POST['payment_code'];
		$date_started = date("Y-m-d H:i:s"); // Get current date and time

		// Update visitor status to "visiting"
		$updateVisitor = $conn->query("UPDATE visitors SET status = 'visiting' WHERE id = '$visitor_id'");

		// echo "$visitor_id";
		// exit();

		if ($updateVisitor) {
			// Insert new visit record
			$insertVisit = $conn->query("INSERT INTO visits (visitorid, tour_type, date_started, payment_code) 
										 VALUES ('$visitor_id', '$visit_type', '$date_started', '$payment_code')");

			if($insertVisit){
				$restxt = "Visit recorded successfully.";
				$opres = true;
			} else {
				$restxt = "Error: " . $conn->error;
			}
		} else {
			$restxt = "Error updating visitor status.";
		}
	} else {
		$restxt = "Error: Missing required values.";
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>