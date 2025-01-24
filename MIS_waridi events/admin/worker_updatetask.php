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

    <title>Processing account creation</title>
</head>
<body>
    <div class="serverlog">

    <?php
    // Include the database connection file
    include '../actions/connect.php';

    // Check if the pname parameter is set in the GET request
    if (isset($_GET['taskid']) && isset($_GET['action'])) {
        // Get the performer name from the GET request
        $taskid = $_GET['taskid'];
        $status = $_GET['action'];

        // Prepare the SQL statement to delete the performer
        $sql = "UPDATE tasks SET iscomplete = '$status' WHERE taskid = '$taskid'";


        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "task updated successfully.";
        } else {
            echo "Error: Could not execute query: " . $conn->error;
        }
    } else {
        echo "Error: provide all required data.";
    }
    echo "<br>redirecting ...";

    // Close the database connection
    $conn->close();
    ?>

<script>
// Redirect back to the performers list page after 4 seconds
setTimeout(function() {
    window.location.href = 'view_tasks.php'; // Adjust the file name if necessary
}, 2000);
</script>

    </div>
</body>
</html>