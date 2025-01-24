<?php
    // Include the database connection file
    include "connect.php";

    // Check if depoholder, depoamt, and transactioncode are set and not empty
    if(isset($_POST['depoholder']) && !empty($_POST['depoholder']) && isset($_POST['depoamt']) && !empty($_POST['depoamt']) && isset($_POST['transactioncode']) && !empty($_POST['transactioncode'])) {

        // Sanitize input
        $depoholder = $conn->real_escape_string($_POST['depoholder']);
        $depoamt = $conn->real_escape_string($_POST['depoamt']);
        $transactioncode = $conn->real_escape_string($_POST['transactioncode']);
        $depostatus = "pending verification"; // Set depostatus to "pending verification"
        $depodate = date("Y-m-d H:i:s"); // Current date and time

        // SQL query to insert data into the deposits table
        $sql = "INSERT INTO deposits (depoamt, depoholder, depodate, depostatus, depo_transactioncode) 
                VALUES ('$depoamt', '$depoholder', '$depodate', '$depostatus', '$transactioncode')";

        // Execute the query
        if ($conn->query($sql)) {
            echo '<script>alert("Deposit processed successfully.");</script>';
        } else {
            echo '<script>alert("Error inserting deposit data: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: Please provide all required information.");</script>';
    }

    // Close connection
    $conn->close();

    echo "redirecting...";
    header("refresh: 1.2 ../savings.php?req=deposits");
?>


