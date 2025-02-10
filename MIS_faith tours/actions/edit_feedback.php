<?php
	include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../list_feedback.php';

	if (isset($_POST['id'])) {
		$id = $_POST['id'];

		// Update feedback status to "read"
		$update = $conn->query("UPDATE feedback SET fbk_status = 'read' WHERE id = '$id'");

		$opres = $update == true;
		$restxt = ($opres) ? "Feedback status updated successfully." : "Error: " . $conn->error;
	} else {
		$restxt = "Error: Missing required values.";
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
