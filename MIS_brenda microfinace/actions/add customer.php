<?php
    // Include the database connection file
    include "connect.php";

    $thepage = "../index.php";
    $dontredirect = true;

    include 'checksession.php';

    if($curuser != ""){
        echo '<script>alert("Logout first");</script>';
        header('refresh: 3.5 ../index.php');
        exit();
    }

    // Check if customername, customerpassword, and customercontact are set and not empty
    if(isset($_POST['customername']) && !empty($_POST['customername']) && isset($_POST['customerpassword']) && !empty($_POST['customerpassword']) && isset($_POST['customercontact']) && !empty($_POST['customercontact'])) {
        
        // Sanitize input
        $customername = $conn->real_escape_string($_POST['customername']);
        $customerpassword = $conn->real_escape_string($_POST['customerpassword']);
        $customercontact = $conn->real_escape_string($_POST['customercontact']);
        $custstatus = "active"; // Set custstatus to "active"
        
        // Check if customername already exists
        $check_sql = "SELECT * FROM customers WHERE custname='$customername'";
        $check_result = $conn->query($check_sql);
        
        // If customername doesn't exist, add new record
        if($check_result){
            if ($check_result->num_rows == 0) {
                // SQL query to insert a new record into the customers table
                $thetime = date("y-m-d h:i:s");
                $myop = "INSERT INTO customers (custname, custpassword, custcontact, custstatus,custjoindate) 
                        VALUES ('$customername', '$customerpassword', '$customercontact', '$custstatus','$thetime')";
                include 'getdata.php';

                // echo "$myop";

                // Execute the query
                if ($result) {
                    echo '<script>alert("Customer added successfully.");</script>';

                    // Set cookies for current username and user type
                    $current_username = $customername;
                    $current_usertype = "client";

                    // set login cookie
                    setcookie("curusername", $current_username, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("curusertype", $current_usertype, time() + (86400 * 30), "/"); // 86400 = 1 day
                    echo '<script>alert("Login successful.");</script>';
                } else {
                    echo '<script>alert("an Error adding customer: ' . $conn->error . '");</script>';
                }
            } else {
                echo '<script>alert("The customer name already exists, pick a different name");</script>';
            }
        } else {
            echo '<script>alert("Error adding customer: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: Please provide all required information.");</script>';
        $thepage = 'register.php';
    }

    // Close connection
    $conn->close();
    header("refresh: 3.2 $thepage");
?>
