<?php
// Include the database connection file
include 'connect.php';

// Check if all required POST variables are set
if (isset($_POST['eventid']) && isset($_POST['description']) && isset($_POST['assignedto']) &&
    isset($_POST['duedate'])) {

    // Assign POST variables to PHP variables
    $eventid = $_POST['eventid'];
    $description = $_POST['description'];
    $assignedto = $_POST['assignedto'];
    $duedate = $_POST['duedate'];

    // Set the iscomplete status to "no"
    $iscomplete = "no";

    // Prepare the SQL statement
    $sql = "INSERT INTO tasks (eventid, description, assignedto, duedate, iscomplete) 
            VALUES ('$eventid', '$description', '$assignedto', '$duedate', '$iscomplete')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully.";
        echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 4000);</script>";
    } else {
        echo "Error: Could not execute query: " . $conn->error;
    }

} else {
    echo "Error: All required fields must be provided.";
}

// Close the database connection
$conn->close();
?>
