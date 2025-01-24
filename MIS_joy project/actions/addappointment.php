<?php

    // Include the file handling database connection
    include 'connect.php';

    $thepage = "../listappointments.php";

    // Check if all the required POST variables are passed
    if(isset($_POST['theserial']) && isset($_POST['thedate']) && isset($_POST['thetime']) && isset($_POST['thefacility']) && isset($_POST['theidnumber'])) {
        // Sanitize the inputs to prevent SQL injection
        $appointmentSerial = mysqli_real_escape_string($conn, $_POST['theserial']);
        $appointmentDate = mysqli_real_escape_string($conn, $_POST['thedate']);
        $appointmentTime = mysqli_real_escape_string($conn, $_POST['thetime']);
        $appointmentFacility = mysqli_real_escape_string($conn, $_POST['thefacility']);
        $patientIdNumber = mysqli_real_escape_string($conn, $_POST['theidnumber']);

        // Concatenate date and time to match the datetime format for SQL fields
        $appointmentDateTime = "$appointmentDate $appointmentTime";

        // Insert new record into the appointments table
        $insertQuery = "INSERT INTO appointments (appointmentserial, appointmentdate, facility, patientidnumber, appointmentstatus) 
                        VALUES ('$appointmentSerial', '$appointmentDateTime', '$appointmentFacility', '$patientIdNumber', 'pending')";
        
        if(mysqli_query($conn, $insertQuery)) {
            echo "New appointment with serial number $appointmentSerial has been successfully added.";
        } else {
            echo "Error adding new appointment: " . mysqli_error($conn);
        }
    } else {
        // Inform the user of invalid request format
        echo "Invalid request format. Please provide all required variables.";
        $thepage = "../listpatients.php";
    }

    // Close database connection
    mysqli_close($conn);

    include 'smartredirect.php';
?>
