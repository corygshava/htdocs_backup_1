<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/tables.css">

    <title>vendors</title>
</head>
<body>
    <div class="content">
        <div class="tableholder">
            <h2 class="w3-center">Event vendors</h2>

            <?php
// Include the database connection file
include '../actions/connect.php';

// Check if the "curevent" cookie is set
if (isset($_COOKIE['curevent'])) {
    // Get the eventid from the cookie
    $eventid = $_COOKIE['curevent'];

    // Prepare the SQL statement
    $sql = "SELECT vname, role, description, contact FROM vendors WHERE eventid = '$eventid'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table format
        echo "<table class=\"w3-table\">
                <tr class=\"primarybg\">
                    <th>Vendor Name</th>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>";

        // Fetch data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['vname']}</td>
                    <td>{$row['role']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['contact']}</td>
                    <td><button onclick=\"assignTask('{$row['vname']}')\">Fire vendor</button></td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "No vendors found for the selected event.";
    }
} else {
    echo "No event chosen.";
}

// Close the database connection
$conn->close();
?>

<script>
// Function to handle the "assign task" button click
function assignTask(vname) {
    // Redirect to a PHP script to handle assigning a task (not implemented here)
    window.location.href = `worker_firevendor.php?vname=${vname}`;
}
</script>
            <div class="bottomopt">
                <button><i class="fa fa-print"></i> Print</button>
            </div>
        </div>
    </div>
</body>
</html>