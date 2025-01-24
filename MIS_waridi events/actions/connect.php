<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "waridi";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("<br>Connection failed: " . $conn->connect_error);
    }

    // Check if database exists
    $db_selected = mysqli_select_db($conn, $dbname);

    if (!$db_selected) {
        // If database does not exist, create it
        $sql = "CREATE DATABASE $dbname";

        if ($conn->query($sql) === TRUE) {
            echo "<br>Database created successfully";
        } else {
            echo "<br>Error creating database: " . $conn->error;
        }
    } else {
        // echo "<br>Database already exists";
    }

    $conn->select_db($dbname);
    include 'setuptables.php';
?>
