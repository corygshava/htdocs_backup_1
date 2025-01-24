<?php
    // Include the database connection file
    include "actions/connect.php";

    // Check if usernum is set and not empty
    if(isset($_POST['usernum']) && !empty($_POST['usernum'])) {
        // Sanitize usernum
        $usernum = $conn->real_escape_string($_POST['usernum']);
        
        // SQL query to delete record from users table
        $sql = "DELETE FROM users WHERE userid='$usernum'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("User deleted");</script>';
        } else {
            echo '<script>alert("User deleting failed: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: usernum is required");</script>';
    }

    // Close connection
    $conn->close();
?>
