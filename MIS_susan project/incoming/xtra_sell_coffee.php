<?php 
    include 'actions/connect.php';

    // Retrieve the sale_per_kilo price from the sysdata table
    $query_price = "SELECT itemvalue FROM sysdata WHERE itemname = 'sale_per_kilo'";
    $result_price = mysqli_query($conn, $query_price);
    $row_price = mysqli_fetch_assoc($result_price);
    $price = $row_price['itemvalue'];

    // Retrieve the amount of coffee available from the inventory table
    $query_avl_coffee = "SELECT itemamt FROM inventory WHERE itemname = 'coffee'";
    $result_avl_coffee = mysqli_query($conn, $query_avl_coffee);
    $row_avl_coffee = mysqli_fetch_assoc($result_avl_coffee);
    $avl_coffee = $row_avl_coffee['itemamt'];
?>