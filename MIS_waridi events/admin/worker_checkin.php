<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Processing account creation</title>
</head>
<body>
    <div class="serverlog">

        <?php
// Include the database connection file
include '../actions/connect.php';

// Check if the recid parameter is set in the GET request
if (isset($_GET['recid'])) {
    // Get the recid from the GET request
    $recid = $_GET['recid'];

    // Prepare the SQL statement to update the checkedin status
    $sqlUpdate = "UPDATE bookings SET checkedin = 'yes' WHERE recid = '$recid'";

    // Execute the SQL statement
    if ($conn->query($sqlUpdate)) {
        echo "Attendee checked in successfully.";
    } else {
        echo "Error: Could not execute query: " . $conn->error;
    }
} else {
    echo "Error: Record ID not provided.";
}

// Close the database connection
$conn->close();

header("refresh: 1.2; view_attendees.php");
?>

    </div>
</body>
</html>