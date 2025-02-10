<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../system_data.php';

	if (isset($_POST['id'], $_POST['prefix'], $_POST['theval'], $_POST['theamt'])) {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$prefix = mysqli_real_escape_string($conn, $_POST['prefix']);
		$theval = mysqli_real_escape_string($conn, $_POST['theval']);
		$theamt = mysqli_real_escape_string($conn, $_POST['theamt']);

		$itemname = $prefix . $theval;
		$check = $conn->query("SELECT 1 FROM SystemData WHERE Id = '$id'");

		if ($check && $check->num_rows > 0) {
			if ($conn->query("UPDATE SystemData SET date_changed = NOW(), itemname = '$itemname', itemvalue = '$theamt' WHERE Id = '$id'")) {
				$restxt = "Data updated successfully.";
				$opres = "true";
			} else {
				$restxt = "Error: " . $conn->error;
			}
		} else {
			$restxt = "No record found with the given ID.";
		}
	} else {
		$restxt = "Missing required data.";
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
