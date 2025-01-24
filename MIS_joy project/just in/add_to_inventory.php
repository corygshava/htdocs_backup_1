<?php

// Include the file handling database connection
include 'actions/connect.php';

// Check if the required POST values are passed
if(isset($_POST['itemname']) && isset($_POST['itemquantity'])) {
    // Sanitize the inputs to prevent SQL injection
    $itemName = mysqli_real_escape_string($conn, $_POST['itemname']);
    $itemQuantity = mysqli_real_escape_string($conn, $_POST['itemquantity']);

    // Check if there is already a record with the same item name
    $checkQuery = "SELECT * FROM inventory WHERE itemname = '$itemName'";
    $result = mysqli_query($conn, $checkQuery);

    if(mysqli_num_rows($result) > 0) {
        // Inform the user that the item is already in stock
        echo "The item '$itemName' is already in stock. Please either change the name or update the item instead.";
    } else {
        // Get today's date
        $todayDate = date('Y-m-d');
        // Insert record into inventory table
        $insertQuery = "INSERT INTO inventory (itemname, itemquantity, dateadded, dateupdated, updatelog) VALUES ('$itemName', '$itemQuantity', '$todayDate', '$todayDate', '$todayDate')";
        
        if(mysqli_query($conn, $insertQuery)) {
            echo "Item '$itemName' has been successfully added to the inventory.";
        } else {
            echo "Error adding item to inventory: " . mysqli_error($conn);
        }
    }
} else {
    // Inform the user of invalid request format
    echo "Invalid request format. Please provide both item name and quantity.";
}

// Close database connection
mysqli_close($conn);

?>
