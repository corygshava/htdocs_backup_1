<?php
// Include database connection file
include "actions/connect.php";

// Check if theappointmentserial GET variable exists
if(isset($_GET['theappointmentserial'])) {
    // Sanitize the input to prevent SQL injection
    $theappointmentserial = mysqli_real_escape_string($conn, $_GET['theappointmentserial']);
    
    // Query to fetch records matching the given appointment serial
    $query = "SELECT * FROM appointments WHERE appointmentserial = '$theappointmentserial'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if there are any records
    if(mysqli_num_rows($result) > 0) {
        // Display table header
        echo '<table>';
        echo '<tr>';
        echo '<th>Appointment Serial</th>';
        echo '<th>Appointment Date</th>';
        echo '<th>Facility</th>';
        echo '<th>Patient ID Number</th>';
        echo '<th>Appointment Status</th>';
        echo '</tr>';
        
        // Display records
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['appointmentserial'] . '</td>';
            echo '<td>' . $row['appointmentdate'] . '</td>';
            echo '<td>' . $row['facility'] . '</td>';
            echo '<td>' . $row['patientidnumber'] . '</td>';
            echo '<td>' . $row['appointmentstatus'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        // If no records found, display message
        echo "No appointments found with serial $theappointmentserial.";
    }
} else {
    // If theappointmentserial GET variable is not provided, inform the user
    echo "Invalid request format. Appointment serial not provided.";
}

// Close database connection
mysqli_close($conn);
?>
