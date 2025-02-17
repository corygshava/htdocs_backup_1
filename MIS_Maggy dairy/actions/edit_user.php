<?php
    include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../view_users.php';

    if (!isset($_POST['theid'], $_POST['name'], $_POST['upass'])) {
		$restxt = "Missing required fields.";
	} else {
		// Update user record
		$update = $conn->query("UPDATE users SET 
								username = '{$_POST['name']}',
								Password = '{$_POST['upass']}' 
								WHERE id = '{$_POST['theid']}'");
		$opres = $update == true;
        $restxt = $update ? "user details updated successfully." : "Error: " . $conn->error;
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>