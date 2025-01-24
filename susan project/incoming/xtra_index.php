<?php 
    include 'actions/connect.php';

    // Initialize variables
    $deposits = $tsales = $tpaid = $available_balance = $coffee_seeds = $coffee_powder = 0;
    $coffee_lost = $coffee_complete = $coffee_processing = 0;
    $count_farmers = $count_deposits = $count_sales = $count_intakes = 0;
    $T_brought = $T_paid = 0;

    // Get the sum of depo_amt from deposits
    $query_deposits = "SELECT SUM(Depo_amt) as deposits FROM deposits";
    $result_deposits = mysqli_query($conn, $query_deposits);
    if ($row = mysqli_fetch_assoc($result_deposits)) {
        $deposits = $row['deposits'];
    }

    // Get the sum of amt_recieved from sales
    $query_tsales = "SELECT SUM(Amt_paid) as tsales FROM sales";
    $result_tsales = mysqli_query($conn, $query_tsales);
    if ($row = mysqli_fetch_assoc($result_tsales)) {
        $tsales = $row['tsales'];
    }

    // Get the sum of amt_paid from intakes
    $query_tpaid = "SELECT SUM(Amt_paid) as tpaid FROM intakes";
    $result_tpaid = mysqli_query($conn, $query_tpaid);
    if ($row = mysqli_fetch_assoc($result_tpaid)) {
        $tpaid = $row['tpaid'];
    }

    // Calculate available balance
    $available_balance = ($deposits + $tsales) - $tpaid;

    // Get itemamt for "coffee_seeds" from inventory
    $query_coffee_seeds = "SELECT itemamt FROM inventory WHERE itemname = 'coffee_seeds'";
    $result_coffee_seeds = mysqli_query($conn, $query_coffee_seeds);
    if ($row = mysqli_fetch_assoc($result_coffee_seeds)) {
        $coffee_seeds = $row['itemamt'];
    }

    // Get itemamt for "coffee" from inventory
    $query_coffee_powder = "SELECT itemamt FROM inventory WHERE itemname = 'coffee'";
    $result_coffee_powder = mysqli_query($conn, $query_coffee_powder);
    if ($row = mysqli_fetch_assoc($result_coffee_powder)) {
        $coffee_powder = $row['itemamt'];
    }

    // Get sum of amount where status is "lost" in in_processing
    $query_coffee_lost = "SELECT SUM(Amount) as coffee_lost FROM inprocessing WHERE Status = 'lost'";
    $result_coffee_lost = mysqli_query($conn, $query_coffee_lost);
    if ($row = mysqli_fetch_assoc($result_coffee_lost)) {
        $coffee_lost = $row['coffee_lost'];
    }

    // Get sum of amount where status is "complete" in in_processing
    $query_coffee_complete = "SELECT SUM(Amount) as coffee_complete FROM inprocessing WHERE Status = 'complete'";
    $result_coffee_complete = mysqli_query($conn, $query_coffee_complete);
    if ($row = mysqli_fetch_assoc($result_coffee_complete)) {
        $coffee_complete = $row['coffee_complete'];
    }

    // Get sum of amount where status is "pending" in in_processing
    $query_coffee_processing = "SELECT SUM(Amount) as coffee_processing FROM inprocessing WHERE Status = 'pending'";
    $result_coffee_processing = mysqli_query($conn, $query_coffee_processing);
    if ($row = mysqli_fetch_assoc($result_coffee_processing)) {
        $coffee_processing = $row['coffee_processing'];
    }

    // Count the number of records in farmers
    $query_count_farmers = "SELECT COUNT(*) as count_farmers FROM farmers";
    $result_count_farmers = mysqli_query($conn, $query_count_farmers);
    if ($row = mysqli_fetch_assoc($result_count_farmers)) {
        $count_farmers = $row['count_farmers'];
    }

    // Count the number of records in deposits
    $query_count_deposits = "SELECT COUNT(*) as count_deposits FROM deposits";
    $result_count_deposits = mysqli_query($conn, $query_count_deposits);
    if ($row = mysqli_fetch_assoc($result_count_deposits)) {
        $count_deposits = $row['count_deposits'];
    }

    // Count the number of records in sales
    $query_count_sales = "SELECT COUNT(*) as count_sales FROM sales";
    $result_count_sales = mysqli_query($conn, $query_count_sales);
    if ($row = mysqli_fetch_assoc($result_count_sales)) {
        $count_sales = $row['count_sales'];
    }

    // Count the number of records in intakes
    $query_count_intakes = "SELECT COUNT(*) as count_intakes FROM intakes";
    $result_count_intakes = mysqli_query($conn, $query_count_intakes);
    if ($row = mysqli_fetch_assoc($result_count_intakes)) {
        $count_intakes = $row['count_intakes'];
    }

    // Get the sum of amt_brought and amt_paid in intakes
    $query_sum_intakes = "SELECT SUM(Amt_brought) as T_brought, SUM(Amt_paid) as T_paid FROM intakes";
    $result_sum_intakes = mysqli_query($conn, $query_sum_intakes);
    if ($row = mysqli_fetch_assoc($result_sum_intakes)) {
        $T_brought = $row['T_brought'];
        $T_paid = $row['T_paid'];
    }

    $opres = 'true';  // Operation result flag for success
    $restxt = "Admin summary calculated successfully.";
}
