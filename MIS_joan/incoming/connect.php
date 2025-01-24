<?php
	// Database connection variables
	$servername = "localhost";
	$username = "root";
	$password = ""; // Replace with your actual password
	$dbname = "joan_system_test";    // Replace with the desired database name

	// Create connection to MySQL (without specifying a database yet)
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->error);
	}
	echo "Connected successfully to MySQL.<br>";

	// Check if database exists
	$db_selected = mysqli_select_db($conn, $dbname);

	if (!$db_selected) {
	    // If the database doesn't exist, create it
	    $sql = "CREATE DATABASE $dbname";
	    if ($conn->query($sql) === TRUE) {
	        echo "Database '$dbname' created successfully.<br>";
	    } else {
	        echo "Error creating database: " . $conn->error . "<br>";
	    }
	} else {
	    echo "Database '$dbname' already exists.<br>";
	}

	// Close connection
	$conn->close();

	include 'setuptables.php';
?>
