<?php

    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "brenda_microfinance"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the database exists
    $check_db_query = "SHOW DATABASES LIKE '$dbname'";
    $result = $conn->query($check_db_query);

    if ($result->num_rows == 0) {
        // Database doesn't exist, create it
        $create_db_query = "CREATE DATABASE $dbname";
        if ($conn->query($create_db_query)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }
    }

    mysqli_select_db($conn, $dbname);
    include "setuptables.php";

?>
