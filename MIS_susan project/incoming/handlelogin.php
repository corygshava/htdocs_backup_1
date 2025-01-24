<?php
    // Include the database connection
    include 'connect.php';

    if ($_POST['uname'] != null && $_POST['upass'] != null) {
		// Get POST variables
		$uname = mysqli_real_escape_string($_POST['uname']);
		$upass = mysqli_real_escape_string($_POST['upass']);

		// Check if username exists
		$sql = "SELECT * FROM Users WHERE Username = $uname";
		$result = $conn->query($sql);

		// If username exists
		if ($result->num_rows > 0) {
		    $user = $result->fetch_assoc();

		    // Verify if password matches
		    if ($user['Password'] == $upass) {
		        // Set the curusername cookie
		        setcookie("curusername", $uname, time() + (86400 * 30), "/"); // Cookie valid for 30 days
		        echo "Login successful. Welcome, $uname!";
		    } else {
		        // Inform the user that the password is incorrect
		        echo "Incorrect password.";
		    }
		} else {
		    // Inform the user that the username doesn't exist
		    echo "Username does not exist.";
		}

		// close connection
		$conn->close();
	}
?>
