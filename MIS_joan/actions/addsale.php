<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../sales_coffee.php';

    // Check if post variables 'tcode' and 'amt_sold' are passed
    if (isset($_POST['tcode']) && isset($_POST['amt_sold'])) {
        $tcode = mysqli_real_escape_string($conn, $_POST['tcode']);
        $amt_sold = (float)$_POST['amt_sold'];

        $thedate = date('Y-m-d H:i:s');

        // Retrieve the value of 'sale_per_kilo' from sysdata
        $query_sale = "SELECT itemvalue FROM sysdata WHERE itemname = 'sale_per_kilo'";
        $result_sale = mysqli_query($conn, $query_sale);
        $row_sale = mysqli_fetch_assoc($result_sale);
        $thesale = (float)$row_sale['itemvalue']; // Stored as a number

        // Retrieve the current available amount of coffee from inventory
        $query_inventory = "SELECT itemamt FROM inventory WHERE itemname = 'coffee'";
        $result_inventory = mysqli_query($conn, $query_inventory);
        $row_inventory = mysqli_fetch_assoc($result_inventory);
        $availableAmt = (float)$row_inventory['itemamt'];

        // Check if there is enough coffee to fulfill the sale
        if ($availableAmt >= $amt_sold) {
            // Update the inventory for 'coffee'
            $new_amt = $availableAmt - $amt_sold;
            $update_inventory = "UPDATE inventory SET itemamt = $new_amt WHERE itemname = 'coffee'";
            mysqli_query($conn, $update_inventory);

            // Calculate the amount received
            $amt_received = $amt_sold * $thesale;

            // Insert the new record into the sales table
            $insert_sales = "INSERT INTO sales (transaction_code, amt_sold, amt_recieved, date_done) 
                             VALUES ('$tcode', $amt_sold, $amt_received, '$thedate')";
            mysqli_query($conn, $insert_sales);

            // Inform the user that the operation completed successfully
            $restxt = "Sale completed successfully.";
            $opres = 'true';
        } else {
            // Inform the user that there's not enough coffee in the inventory
            $restxt = "Not enough coffee in inventory.";
        }
    } else {
        $restxt = "Missing 'tcode' or 'amt_sold'.";
    }

    include '../elements/loader.php';
?>
