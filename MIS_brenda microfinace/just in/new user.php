<?php
    // Include the database connection file
    include "actions/connect.php";

    // Check if username and password are set and not empty
    if(isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password'])) {
        
        // Sanitize username and password
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        
        // Check if username already exists
        $check_sql = "SELECT * FROM users WHERE username='$username'";
        $check_result = $conn->query($check_sql);
        
        // If username doesn't exist, add new record
        if ($check_result->num_rows == 0) {
            // SQL query to insert a new record into the users table
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("User added successfully.");</script>';
            } else {
                echo '<script>alert("Error adding user: ' . $conn->error . '");</script>';
            }
        } else {
            echo '<script>alert("The username already exists.");</script>';
        }
    } else {
        echo '<script>alert("Error: Please provide username and password.");</script>';
    }

    // Close connection
    $conn->close();
?>
