<?php

// Include the file handling database connection
include 'connect.php';

$redirect_delay = 3;
$thepage = "../listinventory.php";

// Check if the required POST values are passed
if(isset($_POST['thename']) && isset($_POST['theamt'])) {
    // Sanitize the inputs to prevent SQL injection
    $itemName = mysqli_real_escape_string($conn, $_POST['thename']);
    $itemQuantity = mysqli_real_escape_string($conn, $_POST['theamt']);
    $todayDate = date('Y-m-d h:i:s');

    if(isset($_POST['theop'])){
        $itemQuantity *= -1;
    }

    // Check if there is a record with the same item name
    $checkQuery = "SELECT * FROM inventory WHERE itemname = '$itemName'";
    $result = mysqli_query($conn, $checkQuery);

    if(mysqli_num_rows($result) > 0) {
        // Fetch the existing record
        $row = mysqli_fetch_assoc($result);
        $existingQuantity = $row['itemquantity'];
        $existingUpdateLog = $row['updatelog'];

        // Calculate new quantity and update log
        $newQuantity = $existingQuantity + $itemQuantity;
        $newUpdateLog = $existingUpdateLog . ", $todayDate";

        // Update the record in the inventory table
        $updateQuery = "UPDATE inventory SET itemquantity = '$newQuantity', dateupdated = '$todayDate', updatelog = '$newUpdateLog' WHERE itemname = '$itemName'";
        if(mysqli_query($conn, $updateQuery)) {
            echo "Item '$itemName' has been successfully updated in the inventory.";
        } else {
            echo "Error updating item in inventory: " . mysqli_error($conn);
        }
    } else {
        $addquery = "INSERT INTO inventory (itemname,itemquantity,dateadded,dateupdated,updatelog) VALUES ('$itemName','$itemQuantity','$todayDate','$todayDate','$todayDate')";
        $theresult = mysqli_query($conn,$addquery);

        if($theresult){
            echo "<b>$itemName</b> has been added successfully<br>";
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

include 'smartredirect.php';
?>
