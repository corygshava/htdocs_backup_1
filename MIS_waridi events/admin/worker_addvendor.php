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
            } else {
                echo "Error: Could not execute query: " . $conn->error;
            }

        } else {
            echo "Error: All required fields must be provided.";
        }

        header("refresh: 2.5; view_vendors.php");
        echo "<br>redirecting...";
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>