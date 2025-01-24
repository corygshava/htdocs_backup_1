<?php
// Include the database connection file
include 'connect.php';

// Check if the recid parameter is set in the GET request
if (isset($_GET['recid'])) {
    // Get the recid from the GET request
    $recid = $_GET['recid'];

    // Prepare the SQL statement to update the checkedin status
    $sqlUpdate = "UPDATE bookings SET checkedin = 'yes' WHERE recid = '$recid'";

    // Execute the SQL statement
    if ($conn->query($sqlUpdate) === TRUE) {
        echo "Attendee checked in successfully.";
    } else {
        echo "Error: Could not execute query: " . $conn->error;
    }
} else {
    echo "Error: Record ID not provided.";
}

// Close the database connection
$conn->close();
?>
