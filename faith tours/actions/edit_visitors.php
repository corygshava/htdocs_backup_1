<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../list_visitors.php';

	if (isset($_POST['id'], $_POST['myname'], $_POST['myid'], $_POST['mycontact'])) {
		$id = $_POST['id'];
		$myname = $_POST['myname'];
		$myid = $_POST['myid'];
		$mycontact = $_POST['mycontact'];

		// Check if a record with the given ID exists
		$check = $conn->query("SELECT Id FROM visitors WHERE Id = '$id'");
		
		if ($check->num_rows > 0) {
			// Update the record
			$update = $conn->query("UPDATE visitors SET visitor_name = '$myname', id_no = '$myid', contact = '$mycontact' WHERE Id = '$id'");
			
			$opres = $update == true;
			$restxt = $opres ? "Record updated successfully." : "Error: " . $conn->error;
		} else {
			$restxt = "No record found with the given ID.";
		}
	} else {
		$restxt = "Error: Missing required values.";
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
