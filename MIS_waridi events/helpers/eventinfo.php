<?php
// Include the database connection file
include 'connect.php';

// Check if the curevent parameter is set in the GET request
if (isset($_GET['curevent'])) {
    // Get the curevent (eventid) from the GET request
    $eventid = $_GET['curevent'];

    // Prepare the SQL statement to retrieve event information
    $sqlEventInfo = "SELECT * FROM events WHERE eventid = '$eventid'";

    // Execute the SQL statement
    $resultEventInfo = $conn->query($sqlEventInfo);

    if ($resultEventInfo->num_rows > 0) {
        // Fetch event data
        $eventInfo = $resultEventInfo->fetch_assoc();

        // Display event information
        echo "<h1>Event Information</h1>";
        echo "<p><strong>Event ID:</strong> {$eventInfo['eventid']}</p>";
        echo "<p><strong>Event Name:</strong> {$eventInfo['eventname']}</p>";
        echo "<p><strong>Event Date:</strong> {$eventInfo['eventdate']}</p>";
        echo "<p><strong>Start Time:</strong> {$eventInfo['starttime']}</p>";
        echo "<p><strong>End Time:</strong> {$eventInfo['endtime']}</p>";
        echo "<p><strong>Ticket Cost:</strong> {$eventInfo['ticketcost']}</p>";
        echo "<p><strong>Description:</strong> {$eventInfo['description']}</p>";
        echo "<p><strong>Venue:</strong> {$eventInfo['venue']}</p>";
        echo "<p><strong>Theme Color:</strong> {$eventInfo['themecolor']}</p>";
        echo "<p><strong>Event Key:</strong> {$eventInfo['eventkey']}</p>";
        echo "<p><strong>Event Code:</strong> {$eventInfo['eventcode']}</p>";
    } else {
        echo "No event found with the provided Event ID.";
    }
} else {
    echo "No Event ID provided.";
}

// Close the database connection
$conn->close();
?>
