<?php
    // Include database connection file
    include "connect.php";

    $thepage = '../listpatients.php';

    // Check if necessary variables are provided via POST
    if(isset($_POST['thevisitserial']) && isset($_POST['thepatientidnumber']) && isset($_POST['thefacilityused'])) {
        // Sanitize the input to prevent SQL injection
        $thevisitserial = mysqli_real_escape_string($conn, $_POST['thevisitserial']);
        $thepatientidnumber = mysqli_real_escape_string($conn, $_POST['thepatientidnumber']);
        $thefacilityused = mysqli_real_escape_string($conn, $_POST['thefacilityused']);
        
        // Get current date and time
        $visitdate = date('Y-m-d H:i:s');

        // Set default visit status
        $visitstatus = "pending clearance";

        // Query to insert a new record into the visits table
        $insert_query = "INSERT INTO visits (visitserial, patientidnumber, facilityused, visitdate, visitstatus) 
                         VALUES ('$thevisitserial', '$thepatientidnumber', '$thefacilityused', '$visitdate', '$visitstatus')";

        // Execute the query
        $insert_result = mysqli_query($conn, $insert_query);

        // Check if query executed successfully
        if($insert_result) {
            $updatepatientdataquery = "UPDATE patients SET lastvisit = '$visitdate' WHERE idnumber = '$thepatientidnumber'";
            $update_result = mysqli_query($conn, $updatepatientdataquery);

            if($update_result){
                echo "Visit record added successfully.";
            } else {
                echo "there was an error adding the new visit : ".mysqli_error($conn);
            }
        } else {
            echo "Error adding visit record: " . mysqli_error($conn);
        }
    } else {
        echo "Required variables not provided.";
    }

    // Close database connection
    mysqli_close($conn);

    include 'smartredirect.php';
?>
