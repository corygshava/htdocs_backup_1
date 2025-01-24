<?php

$servername = "localhost"; // Change this if your database server is different
$username = "your_username"; // Change this to your database username
$password = "your_password"; // Change this to your database password

try {
    $conn = new PDO("mysql:host=$servername;", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Check if the database exists
    $dbname = "your_database_name";
    $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname'";
    $stmt = $conn->query($query);
    $exists = $stmt->fetchColumn();

    if (!$exists) {
        // Create the database if it doesn't exist
        $sql = "CREATE DATABASE $dbname";
        $conn->exec($sql);
        echo "Database created successfully";
    } else {
        echo "Database already exists";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null; // Close the connection
?>
