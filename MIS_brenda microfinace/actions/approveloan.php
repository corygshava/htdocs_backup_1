<?php
    // Include the database connection file
    include "connect.php";

    // Check if loannum is set and not empty
    if(isset($_GET['loannum']) && !empty($_GET['loannum'])) {
        // Sanitize loannum
        $loannum = $conn->real_escape_string($_GET['loannum']);
        
        // New status value
        $status = "unpaid";

        // SQL query to update status of a loan record
        $thedate = date("y-m-d h:i:s");
        $sql = "UPDATE loans SET status='$status',dateapproved = '$thedate' WHERE loanid='$loannum'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Loan approved");</script>';
        } else {
            echo '<script>alert("Loan approval failed");</script>';
        }
    } else {
        echo '<script>alert("Error: loannum is required");</script>';
    }

    // Close connection
    $conn->close();

    header("refresh: 0.2 ../loans.php?req=unpaid");
?>
