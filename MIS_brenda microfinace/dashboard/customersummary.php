<?php
    // Include the database connection file
    include "actions/connect.php";
    include "actions/checksession.php";

    // Define loan status values array
    $loanstatusvalues = array("pending approval", "rejected","unpaid","pending verification","paid"); // Replace with actual status values

    // Initialize variables
    $depositsCount = 0;
    $withdrawalsCount = 0;
    $savingsTotal = 0;
    $loandata = array_fill(0, count($loanstatusvalues), 0);
    $loancount = array_fill(0, count($loanstatusvalues), 0);

    // Get current active username
    if (isset($curuser)) {
        // Count records in deposits where depoholder field is curuser
        $sql = "SELECT COUNT(*) AS count FROM deposits WHERE depoholder = '$curuser' AND depostatus = 'pending verification'";
        $result = $conn->query($sql);
        if($result){
            $row = $result->fetch_assoc();
            $depositsCount = $row['count'] == '' ? 0 : $row['count'];
        }

        // Count records in withdrawals where wdholder field is curuser
        $sql = "SELECT COUNT(*) AS count FROM withdrawals WHERE wdholder = '$curuser'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $withdrawalsCount = $row['count'] == '' ? 0 : $row['count'];

        // Get sum of contents of saveamt field in savings where saveholder field is curuser
        $sql = "SELECT SUM(saveamt) AS total FROM savings WHERE saveholder = '$curuser'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $savingsTotal = $row['total'] == '' ? 0 : $row['total'];

        $sql = "SELECT COUNT(*) AS count FROM loans WHERE loanholder = '$curuser'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $loansCount = $row['count'] == '' ? 0 : $row['count'];

        // Get sum of loanamount for each status value where loanholder is curuser
        foreach ($loanstatusvalues as $index => $status) {
            $sql = "SELECT SUM(loanamount) AS total FROM loans WHERE status = '$status' AND loanholder = '$curuser'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $loandata[$index] = $row['total'] == '' ? 0 : $row['total'];
        }

        foreach ($loanstatusvalues as $index => $status) {
            $sql = "SELECT COUNT(*) as total FROM loans WHERE status = '$status' AND loanholder = '$curuser'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $loancount[$index] = $row['total'] == '' ? 0 : $row['total'];
        }
    } else {
        echo "Error: No current active user specified";
    }

    echo "
        <script>
            var loandata = {
    ";
        foreach ($loancount as $key => $value) {
            echo "'{$loanstatusvalues[$key]}' : $value,";
        }
        echo "other : 0";
    echo "
            };

            var loantotals = {
    ";
        foreach ($loandata as $key => $value) {
            echo "'{$loanstatusvalues[$key]}' : $value,";
        }
        echo "other : 0";
    echo "
            };

            var toshow = {
                savings : $savingsTotal,
                deposits : $depositsCount,
                loans : $loansCount
            }

            var outdata = {
                'total number of loans' : 77,
                'your approved loans' : 77,
                'your uncashed deposits' : 77,
                'loans pending approval' : 77,
                'unapproved loans' : 77,
                'unpaid loans' : 77,
                'loans pending verification' : 77,
                'paid loans' : 77,
                'total unpaid loans' : 77,
                'total paid loans' : 77,
                'total savings' : 77
            }

            function setdata(){
                outdata['total number of loans'] = toshow.loans;
                outdata['your uncashed deposits'] = toshow.deposits;
                outdata['loans pending approval'] = loandata['{$loanstatusvalues[0]}'];
                outdata['unapproved loans'] = loandata['{$loanstatusvalues[1]}'];
                outdata['unpaid loans'] = loandata['{$loanstatusvalues[2]}'];
                outdata['loans pending verification'] = loandata['{$loanstatusvalues[3]}'];
                outdata['paid loans'] = loandata['{$loanstatusvalues[4]}'];
                outdata['total unpaid loans'] = loantotals.unpaid;
                outdata['total paid loans'] = loantotals.paid;
                outdata['total savings'] = toshow.savings;
            }

            setdata();
        </script>
    ";

    // Close connection
    $conn->close();
?>
