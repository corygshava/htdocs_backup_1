<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../view_farmers.php';

	if (!isset($_POST['farmer_name'], $_POST['id_no'], $_POST['password'], $_POST['location'], $_POST['contact'])) {
		$restxt = "Missing required fields.";
	} else {
		$check = $conn->query("SELECT * FROM farmers WHERE id_no = '{$_POST['id_no']}'");

		if ($check->num_rows > 0) {
			$restxt = "Error: Id number already exists, use another one.";
			$toredirect = '../new_farmer.php';
		} else {
			// Insert new farmer record
			$insert = $conn->query("INSERT INTO Farmers (farmer_name, id_no, Password, date_added, location, contact) 
									VALUES ('{$_POST['farmer_name']}', '{$_POST['id_no']}', '{$_POST['password']}', NOW(), '{$_POST['location']}', '{$_POST['contact']}')");
			$opres = $insert == true;
			$restxt = $insert ? "Farmer registered successfully." : "Error: " . $conn->error;
		}
	}

	// Close the database connection
	$conn->close();

	include '../elements/loader.php';
?>
