<?php
// Include the database connection file
include 'connect.php';

// Check if the "curevent" cookie is set
if (isset($_COOKIE['curevent'])) {
    // Get the eventid from the cookie
    $eventid = $_COOKIE['curevent'];

    // Prepare the SQL statement
    $sql = "SELECT taskid, description, assignedto, duedate, iscomplete FROM tasks WHERE eventid = '$eventid'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data in a table format
        echo "<table border='1'>
                <tr>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>";

        // Fetch data
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['description']}</td>
                    <td>{$row['assignedto']}</td>
                    <td>{$row['duedate']}</td>
                    <td>{$row['iscomplete']}</td>
                    <td>";

            // Add "mark as done" and "mark as failed" buttons if the task is not complete
            if ($row['iscomplete'] == 'no') {
                echo "<a href='update_task_status.php?taskid={$row['taskid']}&action=done'>Mark as Done</a>
                      <a href='update_task_status.php?taskid={$row['taskid']}&action=failed'>Mark as Failed</a>";
            }

            echo "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No tasks found for the selected event.";
    }
} else {
    echo "No event chosen.";
}

// Close the database connection
$conn->close();
?>
