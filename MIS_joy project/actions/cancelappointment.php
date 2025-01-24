<?php

    // Include the file handling database connection
    include 'connect.php';

    $thepage = "../listappointments.php";

    // Check if the GET variable exists
    if(isset($_GET['theappointmentserial'])) {
        // Sanitize the input to prevent SQL injection
        $appointmentSerial = mysqli_real_escape_string($conn, $_GET['theappointmentserial']);

        // Query to check if a record exists with the provided appointment serial
        $query = "SELECT * FROM appointments WHERE appointmentserial = '$appointmentSerial'";
        $result = mysqli_query($conn, $query);

        // Check if there is a record with the provided appointment serial
        if(mysqli_num_rows($result) > 0) {
            // Update the appointment status to "cancelled"
            $updateQuery = "UPDATE appointments SET appointmentstatus = 'cancelled' WHERE appointmentserial = '$appointmentSerial'";
            if(mysqli_query($conn, $updateQuery)) {
                echo "Appointment with serial number $appointmentSerial has been cancelled successfully.";
            } else {
                echo "Error updating appointment status: " . mysqli_error($conn);
            }
        } else {
            // Inform the user that no record was found with the provided appointment serial
            echo "No appointment found with the provided serial number.";
        }
    } else {
        // Inform the user of invalid request format
        echo "Invalid request format. Please provide an appointment serial.";
    }

    // Close database connection
    mysqli_close($conn);

    include 'smartredirect.php';
?>
