<?php
    // Include the database connection file
    include "connect.php";

    // Check if deponum is set and not empty
    if(isset($_GET['deponum']) && !empty($_GET['deponum'])) {
        // Sanitize deponum
        $deponum = $conn->real_escape_string($_GET['deponum']);
        
        // Update depostatus to "cashed" where depoid field is deponum
        $update_sql = "UPDATE deposits SET depostatus='cashed' WHERE depoid='$deponum'";

        if ($conn->query($update_sql) === TRUE) {
            // Fetch depoamt, depoholder, and depodate from deposits table
            $fetch_sql = "SELECT depoamt, depoholder, depodate FROM deposits WHERE depoid='$deponum'";
            $result = $conn->query($fetch_sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $depoamt = $row['depoamt'];
                $depoholder = $row['depoholder'];
                $depodate = $row['depodate'];
                
                // Check if there's a record in savings with the same saveholder as depoholder
                $check_sql = "SELECT * FROM savings WHERE saveholder='$depoholder'";
                $check_result = $conn->query($check_sql);
                if ($check_result->num_rows == 1) {
                    // Update existing record in savings
                    $existing_row = $check_result->fetch_assoc();
                    $saveamt = $existing_row['saveamt'] + $depoamt;
                    $updatedates = $existing_row['updatedates'] . ", $depodate";
                    $update_savings_sql = "UPDATE savings SET saveamt='$saveamt', updatedates='$updatedates' WHERE saveholder='$depoholder'";
                    $conn->query($update_savings_sql);
                } else {
                    // Add new record to savings
                    $saveamt = $depoamt;
                    $savestatus = "cashed";
                    $updatedates = $depodate;
                    $savestartdate = date("Y-m-d H:i:s");
                    $insert_savings_sql = "INSERT INTO savings (saveamt, saveholder, savestatus, updatedates, savestartdate) 
                                        VALUES ('$saveamt', '$depoholder', '$savestatus', '$updatedates', '$savestartdate')";
                    $conn->query($insert_savings_sql);
                }
                echo '<script>alert("customer\'s savings record updated.");</script>';
            } else {
                echo '<script>alert("Error: Unable to fetch deposit details.");</script>';
            }
        } else {
            echo '<script>alert("Error updating depostatus: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: deponum is required");</script>';
    }

    // Close connection
    $conn->close();

    echo "redirecting...";
    header("refresh: 1.2 ../savings.php?req=savings");
?>
