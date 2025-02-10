<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../system_data.php';

	if (isset($_POST['prefix'], $_POST['theval'], $_POST['theamt'])) {
		$prefix = mysqli_real_escape_string($conn, $_POST['prefix']);
		$theval = mysqli_real_escape_string($conn, $_POST['theval']);
		$theamt = mysqli_real_escape_string($conn, $_POST['theamt']);

		$itemname = $prefix . $theval;

		if ($conn->query("INSERT INTO SystemData (date_changed, itemname, itemvalue) VALUES (NOW(), '$itemname', '$theamt')")) {
			$restxt = "Data added successfully.";
			$opres = "true";
		} else {
			$restxt = "Error: " . $conn->error;
		}
	} else {
		$restxt = "Missing required data.";
	}

	// Close the database connection
	$conn->close();

	include '../elements/loader.php';
?>
