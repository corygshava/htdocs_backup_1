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
<!-- eventid 	description 	assignedto 	duedate 	iscomplete -->

<!-- vname duedate desc -->
    <?php
        // Include the database connection file
        include '../actions/connect.php';

        // Check if all required POST variables are set
        if (isset($_POST['vname']) && isset($_POST['duedate']) &&
            isset($_POST['description'])) {

            // Assign POST variables to PHP variables
            $eventid = $curevent;
            $vname = $_POST['vname'];
            $duedate = $_POST['duedate'];
            $description = $_POST['description'];

            // Prepare the SQL statement
            $sql = "INSERT INTO tasks (eventid, assignedto, duedate, description, iscomplete) 
                    VALUES ('$eventid', '$vname', '$duedate', '$description', 'no')";

            // Execute the SQL statement
            if ($conn->query($sql) === TRUE) {
                echo "task added successfully.";
            } else {
                echo "Error: Could not execute query: " . $conn->error;
            }

        } else {
            echo "Error: All required fields must be provided.";
        }

        header("refresh: 2.5; view_tasks.php");
        echo "<br>redirecting...";
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>