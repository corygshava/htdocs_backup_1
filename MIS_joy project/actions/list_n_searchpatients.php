<?php
    // Include database connection file
    include "connect.php";

    // HTML table structure
    echo '<table class="w3-table w3-border thetable">';
    echo '<tr class="primarybg2">';
    echo '<th>Patient ID</th>';
    echo '<th>ID Number</th>';
    echo '<th>Patient Name</th>';
    echo '<th>Contact</th>';
    echo '<th>Registration Date</th>';
    echo '<th>Last Visit</th>';
    echo '</tr>';

    // Check if the 'filter' variable exists in GET
    if(isset($_GET['filter'])) {
        // Sanitize the input to prevent SQL injection
        $filter = mysqli_real_escape_string($conn, $_GET['filter']);
        
        // Query to fetch records matching the filter
        $query = "SELECT patientid, idnumber, patientname, patientContact, registrationdate, lastvisit FROM patients WHERE idnumber LIKE '%$filter%'";
    } else {
        // Query to fetch all records
        $query = "SELECT patientid, idnumber, patientname, patientContact, registrationdate, lastvisit FROM patients";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if query executed successfully
    if($result) {
        // Fetch and display data
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="w3-border-bottom w3-hover-dark-grey">';
            echo '<td>' . $row['patientid'] . '</td>';
            echo '<td>' . $row['idnumber'] . '</td>';
            echo '<td>' . $row['patientname'] . '</td>';
            echo '<td>' . $row['patientContact'] . '</td>';
            echo '<td>' . $row['registrationdate'] . '</td>';
            echo '<td>' . $row['lastvisit'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);

    // Close the table
    echo '</table>';
?>
