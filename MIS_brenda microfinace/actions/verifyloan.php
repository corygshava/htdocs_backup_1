<?php
    // Include the database connection file
    include "connect.php";

    // Check if loannum is set and not empty
    if(isset($_GET['loannum']) && !empty($_GET['loannum'])) {
        // Sanitize loannum
        $loannum = $conn->real_escape_string($_GET['loannum']);
        
        // New status value
        $status = "paid";
        $thedate = date("y-m-d h:i:s");

        // SQL query to update status of a loan record
        $sql = "UPDATE loans SET status='$status',dateverified = '$thedate' WHERE loanid='$loannum'";

        // Execute the query
        if ($conn->query($sql)) {
            echo '<script>alert("Loan payment verified");</script>';
        } else {
            echo '<script>alert("Loan verification failed: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: invalid request");</script>';
    }

    // Close connection
    $conn->close();

    echo "redirecting...";
    header("refresh: 1.2 ../loans.php?req=paid");
?>
