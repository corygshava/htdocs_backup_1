<?php
// Include the database connection file
include 'connect.php';

// Check if the taskid and action parameters are set in the GET request
if (isset($_GET['taskid']) && isset($_GET['action'])) {
    // Get the taskid and action from the GET request
    $taskid = $_GET['taskid'];
    $action = $_GET['action'];

    // Prepare the SQL statement to update the task status
    $sql = "UPDATE tasks SET iscomplete = '$action' WHERE taskid = '$taskid'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Task status updated successfully.";

        // Redirect back to viewtasks.php after 3 seconds
        echo "<script>setTimeout(function() { window.location.href = 'viewtasks.php'; }, 3000);</script>";
    } else {
        echo "Error: Could not execute query: " . $conn->error;
    }
} else {
    echo "Error: Task ID or action not provided.";
}

// Close the database connection
$conn->close();
?>
