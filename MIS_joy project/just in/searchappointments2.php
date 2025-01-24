<?php

// Include the file handling database connection
include 'actions/connect.php';

// Check if the GET variable exists
if(isset($_GET['theappointmentserial'])) {
    // Sanitize the input to prevent SQL injection
    $appointmentSerial = mysqli_real_escape_string($conn, $_GET['theappointmentserial']);

    // Query to select records with the provided appointment serial
    $query = "SELECT * FROM appointments WHERE appointmentserial = '$appointmentSerial'";
    $result = mysqli_query($conn, $query);

    // Check if there are any matching records
    if(mysqli_num_rows($result) > 0) {
        // Fetch and display the records
        echo "<h2>Appointments</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Appointment Serial</th><th>Appointment Date</th><th>Facility</th><th>Patient ID Number</th><th>Appointment Status</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['appointmentserial']."</td>";
            echo "<td>".$row['appointmentdate']."</td>";
            echo "<td>".$row['facility']."</td>";
            echo "<td>".$row['patientidnumber']."</td>";
            echo "<td>".$row['appointmentstatus']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Inform the user of invalid request format
        echo "No records found for the provided appointment serial.";
    }

    // Free result set
    mysqli_free_result($result);
} else {
    // Inform the user of invalid request format
    echo "Invalid request format. Please provide an appointment serial.";
}

// Close database connection
mysqli_close($conn);

?>
