<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../view_milkintakes.php';

	if (!isset($_POST['farmerid'], $_POST['quantity'])) {
		$restxt = "Missing required fields.";
	} else {
		// Insert new milk intake record
		$insert = $conn->query("INSERT INTO Milk (farmerid, quantity, date_brought) 
								VALUES ('{$_POST['farmerid']}', '{$_POST['quantity']}', NOW())");
		$opres = $insert == true;
		$restxt = $insert ? "Milk intake recorded successfully." : "Error: " . $conn->error;
	}

	// Close the database connection
	$conn->close();

	include '../elements/loader.php';
?>