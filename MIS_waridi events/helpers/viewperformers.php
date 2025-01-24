<?php
// Include the database connection file
include 'connect.php';

// Check if the "curevent" cookie is set
if (isset($_COOKIE['curevent'])) {
    // Get the eventid from the cookie
    $eventid = $_COOKIE['curevent'];

    // Prepare the SQL statement
    $sql = "SELECT pname, role, starttime, endtime, checkedin FROM performers WHERE eventid = '$eventid'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table format
        echo "<table border='1'>
                <tr>
                    <th>Performer Name</th>
                    <th>Role</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Checked In</th>
                    <th>Action</th>
                </tr>";

        // Fetch data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['pname']}</td>
                    <td>{$row['role']}</td>
                    <td>{$row['starttime']}</td>
                    <td>{$row['endtime']}</td>
                    <td>{$row['checkedin']}</td>
                    <td><button onclick=\"firePerformer('{$row['pname']}')\">Fire Performer</button></td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No performers found for the selected event.";
    }
} else {
    echo "No event chosen.";
}

// Close the database connection
$conn->close();
?>

<script>
// Function to handle the "fire performer" button click
function firePerformer(pname) {
    // Redirect to a PHP script to handle firing the performer (not implemented here)
    window.location.href = `fire_performer.php?pname=${pname}`;
}
</script>
