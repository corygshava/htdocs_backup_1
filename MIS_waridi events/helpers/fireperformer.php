<?php
// Include the database connection file
include 'connect.php';

// Check if the pname parameter is set in the GET request
if (isset($_GET['pname'])) {
    // Get the performer name from the GET request
    $pname = $_GET['pname'];

    // Prepare the SQL statement to delete the performer
    $sql = "DELETE FROM performers WHERE pname = '$pname'";

    // Execute the SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Performer fired successfully.";
    } else {
        echo "Error: Could not execute query: " . $conn->error;
    }
} else {
    echo "Error: Performer name not provided.";
}

// Close the database connection
$conn->close();
?>

<script>
// Redirect back to the performers list page after 4 seconds
setTimeout(function() {
    window.location.href = 'performers_list.php'; // Adjust the file name if necessary
}, 4000);
</script>
