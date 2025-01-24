<?php
// Include the database connection file
include 'connect.php';

// Check if all required POST variables are set
if (isset($_POST['eventid']) && isset($_POST['vname']) && isset($_POST['role']) &&
    isset($_POST['description']) && isset($_POST['contact'])) {

    // Assign POST variables to PHP variables
    $eventid = $_POST['eventid'];
    $vname = $_POST['vname'];
    $role = $_POST['role'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];

    // Prepare the SQL statement
    $sql = "INSERT INTO vendors (eventid, vname, role, description, contact) 
            VALUES ('$eventid', '$vname', '$role', '$description', '$contact')";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Vendor added successfully.";
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
