<?php
    $dontredirect = "yes";
    $prefix="../";include 'checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/common.css">

    <title>Processing login</title>
</head>
<body>

<?php

	if($curuser == ""){
	    // Include the database connection file
	    include "connect.php";

	    $mymsg = "";

	    // Check if username, password, and usertype are set and not empty
	    if(isset($_POST['thename']) && !empty($_POST['thename']) && isset($_POST['thepassword']) && !empty($_POST['thepassword'])) {

	        // Sanitize input
	        $username = $conn->real_escape_string($_POST['thename']);
	        $password = $conn->real_escape_string($_POST['thepassword']);

	        echo "trying to log in as <b>$username</b><br>";
	        
	        // Initialize variables for current user and user type
	        $current_username = "";

	        // Check if the entered username and password exist in the users table
	        $sql = "SELECT * FROM users WHERE username='$username' AND userpassword='$password'";
	        $result = $conn->query($sql);

	        if($result){
	            if ($result->num_rows == 1) {
	                // Set cookies for current username and user type
	                $current_username = $username;
	                $current_usertype = "administrator";
	                setcookie("curusername", $current_username, time() + (86400 * 7), "/"); // 86400 = 1 day
	                echo '<script>alert("Login successful.");</script>';
	            } else {
		            $sql = "SELECT * FROM users WHERE username='$username'";
		            $result = $conn->query($sql);

		            if($result->num_rows != 0){
		                $mymsg = "wrong password";
		            } else {
		                $mymsg = "username not found";
		            }

		            echo '<script>alert("'.$mymsg.'");</script>
		            <br>an error occured <a href="../index.php" class="w3-text-blue">retry</a>';
		        }
		    }
	    } else {
	        echo '<script>alert("Error: Please provide username and password.");</script>';
	    }

	    // Close connection
	    $conn->close();
	} else {
		echo '<script>alert("Error: Please log out first.");</script>';
	}

    header('refresh: 2.1 ../index.php');
    echo "<br>redirecting in 2 seconds";/**/
?>

</body>
</html>