<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/tables.css">

    <title>performers</title>
</head>
<body>
    <div class="content">
        <div class="tableholder">
            <h2 class="w3-center">Event performers</h2>

<?php
    // Include the database connection file
    include '../actions/connect.php';

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
            echo "<table class=\"w3-table\">
                    <tr class=\"primarybg\">
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
            echo "<div class=\"w3-center w3-panel\">No performers found for the selected event.</div>";
        }
    } else {
        echo "<div class=\"w3-center w3-panel\">No event chosen.</div>";
    }

    // Close the database connection
    $conn->close();
?>

<script>
// Function to handle the "fire performer" button click
function firePerformer(pname) {
    // Redirect to a PHP script to handle firing the performer (not implemented here)
    window.location.href = `worker_fireperformer.php?pname=${pname}`;
}
</script>

            <div class="bottomopt">
                <button onclick="print()"><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</body>
</html>