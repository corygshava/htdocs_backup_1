<?php
    // Include database connection file
    include "connect.php";

    $thepage = '../listvisits.php';

    // Check if visitserial has been passed via POST
    if(isset($_POST['visitserial']) && isset($_POST['thestatement'])) {
        // Sanitize the input to prevent SQL injection
        $visitserial = mysqli_real_escape_string($conn, $_POST['visitserial']);
        $statement = mysqli_real_escape_string($conn, $_POST['thestatement']);
        $thedate = date('y-m-d h:i:s');
        
        // Query to update the corresponding record in the visits table
        $update_query = "UPDATE visits SET dateverified = '$thedate', visitstatus = 'cleared',doctorsremarks = '$statement' WHERE visitserial = '$visitserial'";
        
        // Execute the query
        $update_result = mysqli_query($conn, $update_query);
        
        // Check if any record has been updated
        if(mysqli_affected_rows($conn) > 0) {
            echo "Visit with serial $visitserial has been successfully verified.";
        } else {
            echo "No visit found with serial $visitserial.";
        }
    } else {
        echo "Invalid request format.";
    }

    // Close database connection
    mysqli_close($conn);

    include 'smartredirect.php';
?>
