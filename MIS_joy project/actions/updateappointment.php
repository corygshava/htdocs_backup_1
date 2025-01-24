<?php

    // Include the file handling database connection
    include 'connect.php';

    $thepage = '../listappointments.php';

    // Check if the GET variable exists
    if(isset($_GET['theappointmentserial'])) {
        // Sanitize the input to prevent SQL injection
        $appointmentSerial = mysqli_real_escape_string($conn, $_GET['theappointmentserial']);

        // Query to check if a record exists with the provided appointment serial
        $query = "SELECT * FROM appointments WHERE appointmentserial = '$appointmentSerial'";
        $result = mysqli_query($conn, $query);

        // Check if there is a record with the provided appointment serial
        if(mysqli_num_rows($result) > 0) {
            // Update the appointment status to "kept"
            $updateQuery = "UPDATE appointments SET appointmentstatus = 'kept' WHERE appointmentserial = '$appointmentSerial'";

            if(mysqli_query($conn, $updateQuery)) {
                // Generate a random string for visit serial
                $visitSerial = generateRandomString(8);

                // Fetch appointment details
                $appointmentDetails = mysqli_fetch_assoc($result);
                $patientIdNumber = $appointmentDetails['patientidnumber'];
                $facilityUsed = $appointmentDetails['facility'];
                $visitDate = date('Y-m-d h:i:s');

                // Insert record into visits table
                $insertQuery = "INSERT INTO visits (visitserial, patientidnumber, facilityused, visitdate, visitstatus) VALUES ('$visitSerial', '$patientIdNumber', '$facilityUsed', '$visitDate', 'pending verification')";
                if(mysqli_query($conn, $insertQuery)) {
                    echo "Appointment with serial number $appointmentSerial has been updated to 'kept' and a visit record has been added.";
                } else {
                    echo "Error adding visit record: " . mysqli_error($conn);
                }
            } else {
                echo "Error updating appointment status: " . mysqli_error($conn);
            }
        } else {
            // Inform the user that no record was found with the provided appointment serial
            echo "No appointment found with the provided serial number.";
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        // Inform the user of invalid request format
        echo "Invalid request format. Please provide an appointment serial.";
    }

    // Close database connection
    mysqli_close($conn);

    // Function to generate a random string
    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    include 'smartredirect.php';
?>
