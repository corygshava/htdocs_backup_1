<?php
// Include database connection file
include "actions/connect.php";

// Check if the value for 'thevisitdata' has been passed via GET
if(isset($_GET['thevisitdata'])) {
    // Sanitize the input to prevent SQL injection
    $thevisitdata = mysqli_real_escape_string($conn, $_GET['thevisitdata']);
    
    // Query to select records where visitserial matches thevisitdata
    $query = "SELECT * FROM visits WHERE visitserial = '$thevisitdata'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if there are any records where visitserial matches thevisitdata
    if(mysqli_num_rows($result) > 0) {
        echo '<h2>Visits with Visit Serial: ' . $thevisitdata . '</h2>';
        echo '<table class="w3-table w3-border thetable">';
        echo '<tr class="primarybg2">';
        echo '<th>Visit Serial</th>';
        echo '<th>Patient ID Number</th>';
        echo '<th>Facility Used</th>';
        echo '<th>Visit Date</th>';
        echo '<th>Visit Status</th>';
        echo '<th>Date Verified</th>';
        echo '</tr>';
        
        // Fetch and display the records
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="w3-border-bottom w3-hover-dark-grey">';
            echo '<td>' . $row['visitserial'] . '</td>';
            echo '<td>' . $row['patientidnumber'] . '</td>';
            echo '<td>' . $row['facilityused'] . '</td>';
            echo '<td>' . $row['visitdate'] . '</td>';
            echo '<td>' . $row['visitstatus'] . '</td>';
            echo '<td>' . $row['dateverified'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        // If no records match visitserial, query records where patientidnumber matches thevisitdata
        $query = "SELECT * FROM visits WHERE patientidnumber = '$thevisitdata'";
        
        // Execute the query
        $result = mysqli_query($conn, $query);
        
        // Check if there are any records where patientidnumber matches thevisitdata
        if(mysqli_num_rows($result) > 0) {
            echo '<h2>Visits with Patient ID Number: ' . $thevisitdata . '</h2>';
            echo '<table class="w3-table w3-border thetable">';
            echo '<tr class="primarybg2">';
            echo '<th>Visit Serial</th>';
            echo '<th>Patient ID Number</th>';
            echo '<th>Facility Used</th>';
            echo '<th>Visit Date</th>';
            echo '<th>Visit Status</th>';
            echo '<th>Date Verified</th>';
            echo '</tr>';
            
            // Fetch and display the records
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr class="w3-border-bottom w3-hover-dark-grey">';
                echo '<td>' . $row['visitserial'] . '</td>';
                echo '<td>' . $row['patientidnumber'] . '</td>';
                echo '<td>' . $row['facilityused'] . '</td>';
                echo '<td>' . $row['visitdate'] . '</td>';
                echo '<td>' . $row['visitstatus'] . '</td>';
                echo '<td>' . $row['dateverified'] . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo 'No visits found for the provided visit serial or patient ID number.';
        }
    }
} else {
    // If 'thevisitdata' is not provided, list all records
    $query = "SELECT * FROM visits";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    // Check if there are any records
    if(mysqli_num_rows($result) > 0) {
        echo '<h2>All Visits</h2>';
        echo '<table class="w3-table w3-border thetable">';
        echo '<tr class="primarybg2">';
        echo '<th>Visit Serial</th>';
        echo '<th>Patient ID Number</th>';
        echo '<th>Facility Used</th>';
        echo '<th>Visit Date</th>';
        echo '<th>Visit Status</th>';
        echo '<th>Date Verified</th>';
        echo '</tr>';
        
        // Fetch and display the records
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="w3-border-bottom w3-hover-dark-grey">';
            echo '<td>' . $row['visitserial'] . '</td>';
            echo '<td>' . $row['patientidnumber'] . '</td>';
            echo '<td>' . $row['facilityused'] . '</td>';
            echo '<td>' . $row['visitdate'] . '</td>';
            echo '<td>' . $row['visitstatus'] . '</td>';
            echo '<td>' . $row['dateverified'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'No visits found.';
    }
}

// Close database connection
mysqli_close($conn);
?>
