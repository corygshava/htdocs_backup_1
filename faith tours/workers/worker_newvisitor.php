<?php
    // Include the database connection file
    include('actions/connect.php');
    include('workers/functions.php');

    // Query to fetch itemvalue where itemname contains 'utype_'
    $result = $conn->query("SELECT itemname FROM systemdata WHERE itemname LIKE 'utype_%'");
    $theres = "";

    // Check if there are any records
    if ($result->num_rows > 0) {
        // Loop through each record and display the itemvalue
        while ($row = $result->fetch_assoc()) {
            $thecat = processcat($row['itemname']);
            $theres .= "\"{$thecat}\",";
        }
    } else {
        echo "No matching records found.";
        exit();
    }
?>
