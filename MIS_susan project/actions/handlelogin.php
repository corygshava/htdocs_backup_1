<?php
    // Include the database connection
    include 'connect.php';

    $restxt = "the code didnt run";
    $toredirect = '../login.php';

    if ($_POST['uname'] != null && $_POST['upass'] != null) {
		// Get POST variables
		$uname = mysqli_real_escape_string($conn,$_POST['uname']);
		$upass = mysqli_real_escape_string($conn,$_POST['upass']);

		// Check if username exists
		$sql = "SELECT * FROM Users WHERE Username = '$uname'";
		$result = $conn->query($sql);

		// If username exists
		if($result){
			if ($result->num_rows > 0) {
			    $user = $result->fetch_assoc();

			    // Verify if password matches
			    if ($user['Password'] == $upass) {
			        // Set the curusername cookie
			        setcookie("curusername", $uname, time() + (86400 * 30), "/"); // Cookie valid for 30 days
			        $restxt = "Login successful. Welcome, $uname!";
    				$toredirect = '../index.php';

			        $opres = 'true';
			    } else {
			        // Inform the user that the password is incorrect
			        $restxt = "Incorrect password.";
			    }
			} else {
			    // Inform the user that the username doesn't exist
			    $restxt = "Username does not exist.";
			}
		} else {
			$restxt = "an error occured ({$conn->error})";
		}

		// close connection
		$conn->close();
	}

	include '../elements/loader.php';
?>
