<?php
    include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../view_sysdata.php';

    if (!isset($_POST['theid'], $_POST['name'], $_POST['upass'])) {
		$restxt = "Missing required fields.";
	} else {
		// Update user record
		$update = $conn->query("UPDATE systemdata SET 
								itemname = '{$_POST['name']}',
								itemvalue = '{$_POST['upass']}', 
								date_changed = NOW()
								WHERE id = '{$_POST['theid']}'");
		$opres = $update == true;
        $restxt = $update ? "System data updated successfully." : "Error: " . $conn->error;
	}

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>