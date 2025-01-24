<?php
    // Include the database connection file
    include "connect.php";

    // Check if theuservariable is set and not empty
    if(isset($_GET['theuser']) && !empty($_GET['theuser'])) {
        // Sanitize theuser to prevent injection
        $theuser = $conn->real_escape_string($_GET['theuser']);
        
        // New status value
        $status = "banned";

        // SQL query to update status of a loan record
        $thedate = date("y-m-d h:i:s");
        $sql = "UPDATE customers SET custstatus='$status' WHERE custname='$theuser'";

        // Execute the query
        if ($conn->query($sql)) {
            echo '<script>alert("Customer banned and details forwarded to CRB");</script>';
        } else {
            echo '<script>alert("Customer banning failed");</script>';
        }
    } else {
        echo '<script>alert("Error: theuser is required");</script>';
    }

    // Close connection
    $conn->close();

    header("refresh: 0.2 ../customers.php");
?>