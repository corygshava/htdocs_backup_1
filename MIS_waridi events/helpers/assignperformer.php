<?php
// Include the database connection file
include 'connect.php';

// Check if all required POST variables are set
if (isset($_POST['eventid']) && isset($_POST['pname']) && isset($_POST['role']) &&
    isset($_POST['starttime']) && isset($_POST['endtime'])) {

    // Assign POST variables to PHP variables
    $eventid = $_POST['eventid'];
    $pname = $_POST['pname'];
    $role = $_POST['role'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    // Set the checkedin status to "no"
    $checkedin = "no";

    // Prepare the SQL statement
    $sql = "INSERT INTO performers (eventid, pname, role, starttime, endtime, checkedin) 
            VALUES ('$eventid', '$pname', '$role', '$starttime', '$endtime', '$checkedin')";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "Performer added successfully.";
        echo "<script>setTimeout(function(){ window.location.href = 'index.html'; }, 4000);</script>";
    } else {
        echo "Error: Could not execute query: " . mysqli_error($conn);
    }

} else {
    echo "Error: All required fields must be provided.";
}

// Close the database connection
mysqli_close($conn);
?>
