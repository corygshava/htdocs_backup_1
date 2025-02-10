<?php
	// Database connection variables
	$servername = "localhost";
	$username = "root";
	$password = ""; // Replace with your actual password
	$dbname = "tours_mis_test";    // Replace with the desired database name

	// Create connection to MySQL (without specifying a database yet)
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->error);
	}

    // Check if the database exists
    $check_db_query = "SHOW DATABASES LIKE '$dbname'";
    $result = $conn->query($check_db_query);

    if ($result->num_rows == 0) {
	    // If the database doesn't exist, create it
	    $sql = "CREATE DATABASE $dbname";
	    if ($conn->query($sql) === TRUE) {
	        echo "Database '$dbname' created successfully.<br>";
	    } else {
	        echo "Error creating database: " . $conn->error . "<br>";
	    }
	} else {
	    // echo "Database '$dbname' already exists.<br>";
	}

	mysqli_select_db($conn,$dbname);

	include 'setuptables.php';
?>
