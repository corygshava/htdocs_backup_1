<?php
// Include the database connection file
include 'connect.php';

// Get the current date
$currentDate = date('Y-m-d');

// Get the filter from the GET request, default to an empty string if not set
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Prepare the SQL statement based on the filter value
switch ($filter) {
    case 'all':
        $sqlEvents = "SELECT * FROM events";
        break;
    case 'passed':
        $sqlEvents = "SELECT * FROM events WHERE eventdate < '$currentDate'";
        break;
    case 'today':
        $sqlEvents = "SELECT * FROM events WHERE eventdate = '$currentDate'";
        break;
    case 'upcoming':
        $sqlEvents = "SELECT * FROM events WHERE eventdate BETWEEN '$currentDate' AND DATE_ADD('$currentDate', INTERVAL 2 WEEK)";
        break;
    case 'available':
        $sqlEvents = "SELECT * FROM events WHERE eventdate >= '$currentDate'";
        break;
    default:
        $sqlEvents = "SELECT * FROM events WHERE eventdate > '$currentDate'";
        break;
}

// Execute the SQL statement
$resultEvents = $conn->query($sqlEvents);

if ($resultEvents->num_rows > 0) {
    // Output data in a table format
    echo "<table border='1'>
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Ticket Cost</th>
                <th>Description</th>
                <th>Venue</th>
                <th>Theme Color</th>
                <th>Event Key</th>
                <th>Event Code</th>
            </tr>";

    // Fetch data
    while ($rowEvent = $resultEvents->fetch_assoc()) {
        echo "<tr>
                <td>{$rowEvent['eventid']}</td>
                <td>{$rowEvent['eventname']}</td>
                <td>{$rowEvent['eventdate']}</td>
                <td>{$rowEvent['starttime']}</td>
                <td>{$rowEvent['endtime']}</td>
                <td>{$rowEvent['ticketcost']}</td>
                <td>{$rowEvent['description']}</td>
                <td>{$rowEvent['venue']}</td>
                <td>{$rowEvent['themecolor']}</td>
                <td>{$rowEvent['eventkey']}</td>
                <td>{$rowEvent['eventcode']}</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No events found.";
}

// Close the database connection
$conn->close();
?>
