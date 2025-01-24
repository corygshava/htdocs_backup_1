<?php
    // Include the database connection file
    include "actions/connect.php";

    // Define loan status values array
    $loanstatusvalues = array("pending approval", "rejected", "unpaid","pending verification","paid"); // Replace with actual status values

    // Initialize table counts array
    $tablecounts = array();

    // Count records in each table
    $tables = array("loans", "deposits", "customers", "users", "savings", "usagelogs", "withdrawals");

    foreach ($tables as $table) {
        $sql = "SELECT COUNT(*) as count FROM $table";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $tablecounts[$table] = $row['count'];
    }

    // Calculate sum of contents in saveamt field of savings table
    $sql = "SELECT SUM(saveamt) as total FROM savings";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $savingsTotal = $row['total'] == '' ? 0 : $row['total'];

    $loanstest = "";

    $summaryvalues = array("paid","unpaid");

    // for loan totals
    foreach ($summaryvalues as $key => $value) {
        $sql = "SELECT SUM(loanamount) as total FROM loans WHERE status = '$value'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $loanstest .= "$value : ";
        $loanstest .= $row['total'] == '' ? 0 : $row['total'];
        $loanstest .= ",";
    }

    $loanstest .= "'other' : 0";

    // Initialize loandata array
    $loandata = array_fill(0, count($loanstatusvalues), 0);

    // Calculate sum of loanamount for each status value
    foreach ($loanstatusvalues as $index => $status) {
        $sql = "SELECT COUNT(*) as total FROM loans WHERE status = '$status'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $loandata[$index] = $row['total'] == '' ? 0 : $row['total'];

        // echo $loandata[$index]."<br>";
    }

    // Output results
    echo "
    <script>
        var loantotals = {{$loanstest}}
    ";
    echo "/*Table Counts:*/\n
        var toshow = {
    ";
    foreach ($tablecounts as $table => $count) {
        echo "$table: $count,";
    }

    echo "'other' : 0};\n
        var totalsavings = $savingsTotal;\n";

    echo "var loandata = {";
    foreach ($loanstatusvalues as $index => $status) {
        $outxt = $loandata[$index];
        echo "'$status' : $outxt,";
    }

    echo "'other' : 0};

    outdata = {
        'total customers' : 23,
        'customers with savings' : 23,
        'uncashed deposits' : 23,
        'loans pending approval' : 23,
        'rejected loans' : 23,
        'unpaid loans' : 23,
        'loans pending verification' : 23,
        'paid loans' : 23,
        'total unpaid loans' : 23,
        'total amount paid back' : 23,
        'total savings' : 23
    };


    function setdata(){
        outdata['total customers'] = toshow.customers;
        outdata['customers with savings'] = toshow.savings;
        outdata['uncashed deposits'] = toshow.deposits;
        outdata['loans pending approval'] = loandata['{$loanstatusvalues[0]}'];
        outdata['rejected loans'] = loandata['{$loanstatusvalues[1]}'];
        outdata['unpaid loans'] = loandata['{$loanstatusvalues[2]}'];
        outdata['loans pending verification'] = loandata['{$loanstatusvalues[3]}'];
        outdata['paid loans'] = loandata['{$loanstatusvalues[4]}'];
        outdata['total unpaid loans'] = loantotals.unpaid;
        outdata['total amount paid back'] = loantotals.paid;
        outdata['total savings'] = totalsavings;
    }

    setdata();

    </script>";

    /*
    
    */

    // Close connection
    $conn->close();
?>
