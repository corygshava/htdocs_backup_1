<?php
    // Include database connection file
    include "connect.php";

    // Check if necessary variables are provided via POST
    if(isset($_POST['thename']) && isset($_POST['theidnumber']) && isset($_POST['thecontact'])) {

        // Sanitize the input to prevent SQL injection
        $thename = mysqli_real_escape_string($conn, $_POST['thename']);
        $theidnumber = mysqli_real_escape_string($conn, $_POST['theidnumber']);
        $thecontact = mysqli_real_escape_string($conn, $_POST['thecontact']);
        $theage = mysqli_real_escape_string($conn, $_POST['theage']);
        $thegender = mysqli_real_escape_string($conn, $_POST['thegender']);

        // Query to check if the idnumber already exists in the patients table
        $check_query = "SELECT COUNT(*) AS total FROM patients WHERE idnumber = '$theidnumber'";
        $check_result = mysqli_query($conn, $check_query);

        if($check_result) {
            $row = mysqli_fetch_assoc($check_result);
            $total_patients = $row['total'];

            if($total_patients > 0) {
                // If a record with the idnumber already exists, inform the user
                echo "The ID number already exists, try using the Birth certificate number instead";
                $thepage = "../newpatient.php";
            } else {
                // If no record exists with the idnumber, add a new record to the patients table
                $current_date_time = date('Y-m-d H:i:s');
                $insert_query = "INSERT INTO patients (patientname, idnumber, patientContact, registrationdate, lastvisit, age,gender) VALUES ('$thename', '$theidnumber', '$thecontact', '$current_date_time', '$current_date_time','$theage','$thegender')";
                $insert_result = mysqli_query($conn, $insert_query);
                
                if($insert_result) {
                    echo "Patient added successfully.";
                    $thepage = "../listpatients.php";
                } else {
                    echo "Error adding patient.";
                    $thepage = "../newpatient.php";
                }
            }
        } else {
            echo "Error executing query.";
            $thepage = "../newpatient.php";
        }

        // Close database connection
        mysqli_close($conn);
    } else {
        echo "Required variables not provided.";
        $thepage = "../newpatient.php";
    }

    include 'smartredirect.php';
?>