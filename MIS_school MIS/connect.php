<?php
    $servername = "localhost"; // Replace with your server name
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "school_mis"; // Replace with your database name
    
    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo "connection success<br>";
    }
?>