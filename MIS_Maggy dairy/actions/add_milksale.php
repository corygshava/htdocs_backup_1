<?php
    include "connect.php";

    $restxt = "the code didnt run";
    $toredirect = '../view_milksales.php';

    if (!isset($_POST['farmerid'], $_POST['Transaction_code'], $_POST['quantity_sold'], $_POST['Amount_to_pay'])) {
		$restxt = "Missing required fields.";
	} else {
		$cando = $conn->query("SELECT * from sales where Transaction_code = '{$_POST['Transaction_code']}' and status = 'verified'");
		if($cando->num_rows == 0){
			// Insert new milk sale record
			$insert = $conn->query("INSERT INTO Sales (farmerid, Transaction_code, quantity, Amount_paid, status) 
									VALUES ('{$_POST['farmerid']}', '{$_POST['Transaction_code']}', '{$_POST['quantity_sold']}', '{$_POST['Amount_to_pay']}', 'pending')");
			$opres = $insert == true;
			$restxt = $insert ? "Milk sale recorded successfully." : "Error: " . $conn->error;
		} else {
			$restxt = "Transaction_code already exists, use a different one";
    		$toredirect = '../new_milksale.php';
		}
	}

	// Close the database connection
	$conn->close();

	include '../elements/loader.php';
?>