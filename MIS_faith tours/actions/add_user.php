<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../list_users.php';

	if (isset($_POST['username'], $_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Check if the username already exists
		$check = $conn->query("SELECT * FROM users WHERE username = '$username'");

		if ($check->num_rows > 0) {
			$restxt = "Error: Username already exists.";
			$toredirect = '../new_user.php';
		} else {
			// Insert new user record
			$thedate = date('y-m-d h:i:s');
			$insert = $conn->query("INSERT INTO users (username, password,date_added) VALUES ('$username', '$password','$thedate')");
			$opres = $insert == true;
			$restxt = ($opres) ? "User added successfully." : "Error: " . $conn->error;
		}
	} else {
		$restxt = "Error: Missing required values.";
	}

	// Close the database connection
	$conn->close();

	include '../elements/loader.php';
?>
