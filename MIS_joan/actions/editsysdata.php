<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../systemdata.php';

    // Check if the POST variables have been passed
    if (isset($_POST['newval'], $_POST['tochange'])) {
        // Sanitize the input values
        $newval = mysqli_real_escape_string($conn, $_POST['newval']);
        $tochange = mysqli_real_escape_string($conn, $_POST['tochange']);

        // SQL query to update the itemvalue in the sysdata table
        $sql = "UPDATE sysdata SET itemvalue = '$newval' WHERE itemname = '$tochange'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            $restxt = "System data updated successfully.";
            $opres = 'true';  // Set operation result variable to true
        } else {
            $restxt = "Failed to update system data: " . $conn->error;
        }
    } else {
        $restxt = "Required POST variables are missing.";
    }

    include '../elements/loader.php';
?>