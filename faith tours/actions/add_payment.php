<?php
	// Include the database connection file
	include('connect.php');

	// Check if all required POST values are set
	if (isset($_POST['v_code'], $_POST['amount_to_pay'], $_POST['pay_purpose'])) {
		$v_code = $_POST['v_code'];
		$amount_to_pay = $_POST['amount_to_pay'];
		$pay_purpose = $_POST['pay_purpose'];

		// echo "$pay_purpose : $amount_to_pay";
		// exit()	;

		// Check if the pay_code already exists
		$check = $conn->query("SELECT pay_code FROM payments WHERE pay_code = '$v_code'");
		
		if ($check->num_rows > 0) {
			echo "Error: Payment code already exists.|false";
		} else {
			// Insert query to add the payment record
			$query = "INSERT INTO payments (pay_code, pay_amount, pay_purpose) 
					  VALUES ('$v_code', '$amount_to_pay', '$pay_purpose')";
			
			// Execute the query and check if successful
			echo ($conn->query($query)) ? "Payment added successfully.|true" : "Error: " . $conn->error."|false";
		}
	} else {
		echo "Error: Missing required values.|false";
	}
?>
