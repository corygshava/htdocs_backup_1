<?php
    // Include the database connection file
    include "connect.php";

    // Check if loanholder and loanamount are set in POST
    if(isset($_POST['loanholder']) && isset($_POST['loanamount'])) {
        // Sanitize and assign post variables
        $loanholder = $conn->real_escape_string($_POST['loanholder']);
        $loanamount = $conn->real_escape_string($_POST['loanamount']);
        
        // Concatenate and sanitize loanguarantors
        $loanguarantors = "";
        for ($i = 1; $i <= 3; $i++) {
            if (isset($_POST["Guarantor$i"]) && !empty($_POST["Guarantor$i"])) {
                if($i == 1){
                    $loanguarantors .= $conn->real_escape_string($_POST["Guarantor$i"])."_no";
                } else {
                    $loanguarantors .= "|".$conn->real_escape_string($_POST["Guarantor$i"])."_no";
                }
            }
        }
        // $loanguarantors = rtrim($loanguarantors, "_no|"); // Remove trailing separator

        // Get current date and time for dateapplied
        $dateapplied = date('Y-m-d H:i:s');
        
        // Set status to "pending approval"
        $status = "pending approval";

        // SQL query to insert a new record into the loans table
        $sql = "INSERT INTO loans (loanholder, loanamount, loanguarantors, dateapplied, status) 
                VALUES ('$loanholder', '$loanamount', '$loanguarantors', '$dateapplied', '$status')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('your loan has been requested successfully, wait for admin to approve it')</script>";
            header('refresh: 1.1 ../getloan.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: loanholder and loanamount are required";
    }

    // Close connection
    $conn->close();
?>
