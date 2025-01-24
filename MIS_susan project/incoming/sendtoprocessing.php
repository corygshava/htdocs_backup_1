<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../in_processing.php';

    // Check if 'to_send' value has been passed via POST
    if (isset($_POST['to_send'])) {
        $to_send = (float)$_POST['to_send']; // Ensure to_send is treated as a float

        // Get the current date and time
        $date_added = date('Y-m-d H:i:s');

        // Retrieve itemamt for "coffee_seeds" from inventory
        $query = "SELECT itemamt FROM inventory WHERE itemname = 'coffee_seeds'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $availableAmt = $row['itemamt'];

            // Check if there is enough available amount
            if ($availableAmt >= $to_send) {
                // Update the inventory table
                $newAmt = $availableAmt - $to_send;
                $updateQuery = "UPDATE inventory SET itemamt = $newAmt WHERE itemname = 'coffee_seeds'";
                mysqli_query($conn, $updateQuery);

                // Insert new record into in_processing table
                $insertQuery = "INSERT INTO in_processing (date_added, amount, status) VALUES ('$date_added', $to_send, 'in processing')";
                mysqli_query($conn, $insertQuery);

                // Inform the user of success
                $restxt = "The operation was completed successfully.";
                $opres = 'true';
            } else {
                $restxt = "Insufficient amount available.";
            }
        } else {
            $restxt = "Error fetching data: " . $conn->error;
        }
    } else {
        $restxt = "'to_send' value not provided.";
    }

    include '../elements/loader.php';
?>