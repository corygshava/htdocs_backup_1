<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../in_processing.php';

    // Check if 'p_id' and 'newstate' are passed via GET
    if (isset($_GET['p_id']) && isset($_GET['newstate'])) {
        $p_id = (int)$_GET['p_id'];
        $newstate = $_GET['newstate'];

        // Query to check if there's a record with the passed p_id
        $checkQuery = "SELECT * FROM inprocessing WHERE Id = $p_id";
        $checkResult = mysqli_query($conn, $checkQuery);

        $thedate = date('Y-m-d H:i:s');

        if ($checkResult->num_rows > 0) {
            $row = mysqli_fetch_assoc($checkResult);
            $to_add = $row['Amount'];

            // Check if newstate is "lost"
            if ($newstate === 'lost') {
                // Update the record's status to "lost"
                $updateQuery = "UPDATE inprocessing SET Status = 'lost', Date_cleared = '$thedate' WHERE Id = $p_id";
                mysqli_query($conn, $updateQuery);

                // Inform the user that it completed successfully
                $restxt = "Operation completed successfully.";
                $opres = 'true';
            } else {
                // Update the record's status to "complete"
                $updateQuery = "UPDATE inprocessing SET Status = 'complete', Date_cleared = '$thedate' WHERE Id = $p_id";
                mysqli_query($conn, $updateQuery);

                // Update the inventory table for "coffee"
                $inventoryQuery = "UPDATE inventory SET itemamt = itemamt + $to_add WHERE itemname = 'coffee'";
                mysqli_query($conn, $inventoryQuery);

                // Inform the user that it completed successfully
                $restxt = "Operation completed successfully.";
                $opres = 'true';
            }
        } else {
            $restxt = "No record found with the provided p_id.";
        }
    } else {
        $restxt = "Missing 'p_id' or 'newstate' in the request.";
    }

    include '../elements/loader.php';
?>
