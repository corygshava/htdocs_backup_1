<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../list_visits.php';

	if (isset($_POST['visit_id'], $_POST['visitor_id'], $_POST['review_score'], $_POST['feedback_txt'])) {
		$visit_id = $_POST['visit_id'];
		$visitor_id = $_POST['visitor_id'];
		$review_score = $_POST['review_score'];
		$feedback_txt = $_POST['feedback_txt'];
		$date_ended = date("Y-m-d H:i:s"); // Get current date and time

		// Update visits table to set date_ended and status to "checked out"
		$updateVisit = $conn->query("UPDATE visits SET date_ended = '$date_ended', status = 'checked out' WHERE id = '$visit_id'");

		// Update visitors table to set status to "released"
		$updateVisitor = $conn->query("UPDATE visitors SET status = 'released' WHERE id = '$visitor_id'");

		// Insert feedback record
		$insertFeedback = $conn->query("INSERT INTO feedback (visitor_id, fbk_text, fbk_review) 
										VALUES ('$visitor_id', '$feedback_txt', '$review_score')");

		// Check if all operations were successful
		if ($updateVisit && $updateVisitor && $insertFeedback) {
			$restxt = "Checkout completed successfully.";
			$opres = true;
		} else {
			$restxt = "Error: " . $conn->error;
		}
	} else {
		$restxt = "Error: Missing required values.";
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
