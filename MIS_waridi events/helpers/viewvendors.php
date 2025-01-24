<?php
// Include the database connection file
include 'connect.php';

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
        echo "<table border='1'>
                <tr>
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
                    <td><button onclick=\"assignTask('{$row['vname']}')\">Assign Task</button></td>
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
    window.location.href = `assign_task.php?vname=${vname}`;
}
</script>
