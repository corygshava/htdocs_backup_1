<?php 
    include 'actions/connect.php';

    // SQL query to get itemamt where itemname is "coffee_seeds"
    $query = "SELECT itemamt FROM inventory WHERE itemname = 'coffee_seeds'";
    $result = $conn->query($query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $maxweight = $row['itemamt'];
    } else {
        echo "Error fetching data: " . mysqli_error($conn);
    }
?>