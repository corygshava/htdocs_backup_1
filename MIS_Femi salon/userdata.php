<?php
    $tablename = "users"; // Replace with your table name
    include('connect.php');

    // Check if the desired username is already set, if not, set it
    if (!isset($desiredUsername)) {
        $desiredUsername = "john_doe"; // Replace with the desired username to check
    }
    
    // Declare the variables before the if statement
    $row = null;
    $storedUsername = null;
    $storedUserRole = null;
    $storedUserId = null;
    
    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT username, user_role, userid FROM $tablename WHERE username = ?");
    $stmt->bind_param("s", $desiredUsername);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Access the record values
        $storedUsername = $row["username"];
        $storedUserRole = $row["user_role"];
        $storedUserId = $row["userid"];
    }
    
    // Close the connection
    $conn->close();
    
    // Access the variables outside the if statement
    if ($row !== null) {
        // echo "Username: $storedUsername<br>";
        // echo "User Role: $storedUserRole<br>";
        // echo "User ID: $storedUserId<br>";
    } else {
        echo "Username does not exist.";
    }
    ?>
    