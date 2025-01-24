<?php

// Include the file handling database connection
include 'actions/connect.php';

// Check if the required POST value is passed
if(isset($_POST['itemname'])) {
    // Sanitize the input to prevent SQL injection
    $itemName = mysqli_real_escape_string($conn, $_POST['itemname']);

    // Query to select records from the inventory table containing the provided item name
    $query = "SELECT * FROM inventory WHERE itemname LIKE '%$itemName%'";
    $result = mysqli_query($conn, $query);

    // Check if there are any matching records
    if(mysqli_num_rows($result) > 0) {
        // Display the matching records
        echo "<h2>Inventory Search Results</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Item Name</th><th>Item Quantity</th><th>Date Updated</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['itemname']."</td>";
            echo "<td>".$row['itemquantity']."</td>";
            echo "<td>".$row['dateupdated']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Inform the user if no matching records are found
        echo "No records found in the inventory for item '$itemName'.";
    }

    // Free result set
    mysqli_free_result($result);
} else {
    // Inform the user of invalid request format
    echo "Invalid request format. Please provide the item name.";
}

// Close database connection
mysqli_close($conn);

?>
