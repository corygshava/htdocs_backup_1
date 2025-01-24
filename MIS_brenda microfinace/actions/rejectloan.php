<?php
    // Include the database connection file
    include "connect.php";

    // Check if loannum is set and not empty
    if(isset($_GET['loannum']) && !empty($_GET['loannum'])) {
        // Sanitize loannum
        $loannum = $conn->real_escape_string($_GET['loannum']);
        
        // New status value
        $status = "rejected";

        // SQL query to update status of a loan record
        $sql = "UPDATE loans SET status='$status' WHERE loanid='$loannum'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Loan rejected successfully");</script>';
        } else {
            echo '<script>alert("Loan rejection failed: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: loannum is required");</script>';
    }

    // Close connection
    $conn->close();

    echo "redirecting...";
    header("refresh: 0.2 ../loans.php?req=rejected");
?>
