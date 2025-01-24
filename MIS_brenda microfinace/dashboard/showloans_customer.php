<?php
    // Include the database connection file
    include "actions/connect.php";
    include "actions/checksession.php";

    // Check if the curuser variable exists
    if ($curuser != "") {

        // SQL query to select records where loanholder field is curuser
        $sql = "SELECT loanid, loanholder, loanamount, balance, loanguarantors, dateapplied, dateapproved, dateverified, amountpaid, paymentcode, status FROM loans WHERE loanholder = '$curuser'";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
            // Start table
            echo '<table class="w3-table w3-border thetable w3-black">';
            echo '<tr class="primarybg2">';
            // Table header
            echo '<th>Loan ID</th>';
            echo '<th>Loan Amount</th>';
            echo '<th>Balance</th>';
            echo '<th>Date Applied</th>';
            echo '<th>Date Approved</th>';
            echo '<th>Date Verified</th>';
            echo '<th>Last Amount Paid</th>';
            echo '<th>Payment Codes</th>';
            echo '<th>Status</th>';
            echo '<th>Actions</th>';
            echo '</tr>';

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-grey w3-hover-dark-grey" data-guarantors="' . $row["loanguarantors"] . '">';
                echo '<td>' . $row["loanid"] . '</td>';
                echo '<td>' . $row["loanamount"] . '</td>';
                $thebalance = $row["balance"] == '' ? $row["loanamount"] : $row["balance"];
                echo '<td>' . $thebalance . '</td>';
                echo '<td>' . $row["dateapplied"] . '</td>';
                echo '<td>' . $row["dateapproved"] . '</td>';
                echo '<td>' . $row["dateverified"] . '</td>';
                echo '<td>' . $row["amountpaid"] . '</td>';
                echo '<td>' . $row["paymentcode"] . '</td>';
                echo '<td>' . $row["status"] . '</td>';
                echo '<td>';
                    switch ($row["status"]) {
                        case 'pending approval':
                            // code...
                            echo "<a href=\"#\" class=\"primarybg themebtn3 hover2\" data-guarantors=\"{$row["loanguarantors"]}\" onclick=\"showguarantors(this)\">view Guarantors</a>";
                            break;
                        case 'rejected':
                            // code...
                            echo "--";
                            break;
                        case 'unpaid':
                            // code...
                            echo "<a href=\"payloan.php?loanid={$row['loanid']}&loanamt={$row['balance']}\" class=\"primarybg themebtn3 hover2\">make payment</a>";
                            break;
                        case 'pending verification':
                            // code...
                            echo "--";
                            break;
                        
                        default:
                            // code...
                            echo "--";
                            break;
                    }
                echo '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "<div class=\"w3-center\"><button class=\"primarybg themebtn3\">0 records found</button></div>";
        }
    } else {
        // Invalid request
        echo "Unauthorized access detected";
    }

    // Close connection
    $conn->close();
?>
