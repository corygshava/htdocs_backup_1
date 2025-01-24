<?php
    // Query to get the price per kilo from the sysdata table
    $price_query = "SELECT itemvalue FROM sysdata WHERE itemname = 'price_per_kilo'";
    $result_price = $conn->query($price_query);
    $price = ($result_price && $result_price->num_rows > 0) ? $result_price->fetch_assoc()['itemvalue'] : 0;

    // Query to get the total sums from the deposits, sales, and intakes tables
    $total_depos_query = "SELECT SUM(depo_amt) AS total FROM deposits";
    $result_depos = $conn->query($total_depos_query);
    $T_depos = ($result_depos && $result_depos->num_rows > 0) ? $result_depos->fetch_assoc()['total'] : 0;

    $total_sales_query = "SELECT SUM(amt_recieved) AS total FROM sales";
    $result_sales = $conn->query($total_sales_query);
    $T_sales = ($result_sales && $result_sales->num_rows > 0) ? $result_sales->fetch_assoc()['total'] : 0;

    $total_intakes_query = "SELECT SUM(amt_paid) AS total FROM intakes";
    $result_intakes = $conn->query($total_intakes_query);
    $T_paid = ($result_intakes && $result_intakes->num_rows > 0) ? $result_intakes->fetch_assoc()['total'] : 0;

    // Calculate available balance
    $available_balance = ($T_depos + $T_sales) - $T_paid;

    // Query to get all farmers' id and name
    $farmers_query = "SELECT id, Name FROM farmers";
    $result_farmers = $conn->query($farmers_query);
    $farmers_ids = [];
    $farmers_names = [];

    if ($result_farmers && $result_farmers->num_rows > 0) {
        while ($row = $result_farmers->fetch_assoc()) {
            $farmers_ids[] = $row['id'];
            $farmers_names[] = $row['Name'];
        }
    }

    // Convert arrays to comma-separated strings
    $farmers_ids_string = implode(',', $farmers_ids);
    $farmers_names_string = implode(',', $farmers_names);
?>
