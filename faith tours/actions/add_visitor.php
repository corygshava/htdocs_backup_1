<?php
	include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../list_visitors.php';

	if (isset($_POST['v_name'], $_POST['v_id'], $_POST['v_type'], $_POST['v_contact'])) {
		// Get values from POST
		$v_name = $_POST['v_name'];
		$v_id = $_POST['v_id'];
		$v_type = $_POST['v_type'];
		$v_contact = $_POST['v_contact'];

		// Insert query to add the record
		$query = "INSERT INTO visitors (visitor_name, id_no, user_type, contact, status) 
				  VALUES ('$v_name', '$v_id', '$v_type', '$v_contact', 'released')";

		// Execute the query and check if successful
		if ($conn->query($query) === TRUE) {
			$restxt = "Record added successfully.";
			$opres = "true";
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
