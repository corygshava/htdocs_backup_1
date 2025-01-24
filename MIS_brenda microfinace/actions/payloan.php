<?php
    // Include the database connection file
    include "connect.php";

    // Check if loannum, amountpaid, and paymentcode are set and not empty
    if(isset($_POST['loannum']) && !empty($_POST['loannum']) && isset($_POST['amountpaid']) && isset($_POST['paymentcode'])) {

        // Sanitize input
        $loannum = $conn->real_escape_string($_POST['loannum']);
        $amountpaid = $conn->real_escape_string($_POST['amountpaid']);
        $paymentcode = $conn->real_escape_string($_POST['paymentcode']);
        
        // New status value
        $status = "waiting verification";

        $myop = "SELECT balance,loanamount,paymentcode FROM loans WHERE loanid='$loannum'";
        $result = $conn->query($myop);

        if ($result) {
            echo '<script>alert("Loan data found successfully.");</script>';

            $row = $result -> fetch_assoc();
            $thebalance = $row['balance'] == '' ? $row['loanamount'] : $row['balance'];
            $newbalance = ($thebalance - $amountpaid);
            $status = $newbalance == 0 ? 'pending verification' : 'unpaid';
            $paymentcode .= ", ".$row['paymentcode'];

            // SQL query to update record in loans table
            $sql = "UPDATE loans SET status='$status',balance = '$newbalance', amountpaid='$amountpaid', paymentcode='$paymentcode' WHERE loanid='$loannum'";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Loan details updated successfully.");</script>';
            } else {
                echo '<script>alert("Error updating loan details: ' . $conn->error . '");</script>';
            }
        } else {
            echo '<script>alert("Error finding loan data: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: Please provide all necessary information.");</script>';
    }

    // Close connection
    $conn->close();

    echo "redirecting in 2 seconds";
    header("refresh: 1.3 ../loans.php?req=all");
?>
