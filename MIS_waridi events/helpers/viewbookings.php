<?php
// Include the database connection file
include 'connect.php';

// Check if the "curevent" cookie is set
if (isset($_COOKIE['curevent'])) {
    // Get the eventid from the cookie
    $eventid = $_COOKIE['curevent'];

    // Get the current date
    $currentDate = date('Y-m-d');

    // Get the event date from the events table
    $sqlEventDate = "SELECT eventdate FROM events WHERE eventid = '$eventid'";
    $resultEventDate = $conn->query($sqlEventDate);

    if ($resultEventDate->num_rows > 0) {
        $rowEventDate = $resultEventDate->fetch_assoc();
        $eventDate = $rowEventDate['eventdate'];

        // Check if the current date matches the event date
        $iseventday = ($currentDate == $eventDate) ? true : false;

        // Prepare the SQL statement to fetch attendees
        $sqlAttendees = "SELECT recid, contact, cname, ticketcode, checkedin FROM bookings WHERE eventid = '$eventid'";

        // Execute the SQL statement
        $resultAttendees = $conn->query($sqlAttendees);

        if ($resultAttendees->num_rows > 0) {
            // Output data in a table format
            echo "<table border='1'>
                    <tr>
                        <th>Record ID</th>
                        <th>Contact</th>
                        <th>Name</th>
                        <th>Ticket Code</th>
                        <th>Checked In</th>";

            // Add "Check In" column if it's the event day
            if ($iseventday) {
                echo "<th>Action</th>";
            }

            echo "</tr>";

            // Fetch data
            while ($rowAttendee = $resultAttendees->fetch_assoc()) {
                echo "<tr>
                        <td>{$rowAttendee['recid']}</td>
                        <td>{$rowAttendee['contact']}</td>
                        <td>{$rowAttendee['cname']}</td>
                        <td>{$rowAttendee['ticketcode']}</td>
                        <td>{$rowAttendee['checkedin']}</td>";

                // Add "Check In" button if it's the event day
                if ($iseventday) {
                    echo "<td><button onclick=\"checkInAttendee('{$rowAttendee['recid']}')\">Check In</button></td>";
                }

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No attendees found for the selected event.";
        }
    } else {
        echo "Error: Event date not found.";
    }
} else {
    echo "No event chosen.";
}

// Close the database connection
$conn->close();
?>

<script>
// Function to handle the "check in" button click
function checkInAttendee(recid) {
    // Redirect to a PHP script to handle checking in the attendee (not implemented here)
    window.location.href = `check_in.php?recid=${recid}`;
}
</script>
