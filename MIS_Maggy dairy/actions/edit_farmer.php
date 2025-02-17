<?php
    include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../view_farmers.php';

    if (!isset($_POST['theid'], $_POST['name'], $_POST['upass'], $_POST['id_no'], $_POST['location'], $_POST['contact'])) {
		$restxt = "Missing required fields.";
	} else {
		// Update farmer record
		$update = $conn->query("UPDATE Farmers SET 
								farmer_name = '{$_POST['name']}', 
								id_no = '{$_POST['id_no']}', 
								Password = '{$_POST['upass']}', 
								location = '{$_POST['location']}', 
								contact = '{$_POST['contact']}' 
								WHERE id = '{$_POST['theid']}'");
		$opres = $update == true;
        $restxt = $update ? "Farmer details updated successfully." : "Error: " . $conn->error;
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>