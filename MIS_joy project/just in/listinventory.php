<?php

// Include the file handling database connection
include 'actions/connect.php';

// Query to select all records from the inventory table
$query = "SELECT * FROM inventory";
$result = mysqli_query($conn, $query);

// Check if there are any records
if(mysqli_num_rows($result) > 0) {
    // Display the records
    echo "<h2>Inventory List</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Item Name</th><th>Item Quantity</th><th>Date Added</th><th>Date Updated</th><th>Update Log</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['itemname']."</td>";
        echo "<td>".$row['itemquantity']."</td>";
        echo "<td>".$row['dateadded']."</td>";
        echo "<td>".$row['dateupdated']."</td>";
        echo "<td>".$row['updatelog']."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Inform the user if there are no records
    echo "No records found in the inventory.";
}

// Free result set
mysqli_free_result($result);

// Close database connection
mysqli_close($conn);

?>
