<?php
    // Include the database connection file
    include "actions/connect.php";

    // Function to fetch and display loan records
    function displayLoanRecords($infilter = "all") {
        global $conn;

        // SQL query based on the filter value
        if ($infilter !== "all") {
            $sql = "SELECT loanid, loanholder, loanamount, balance, loanguarantors, dateapplied, dateapproved, dateverified, amountpaid, paymentcode, status FROM loans WHERE status = '$infilter'";
        } else {
            $sql = "SELECT loanid, loanholder, loanamount, balance, loanguarantors, dateapplied, dateapproved, dateverified, amountpaid, paymentcode, status FROM loans";
        }

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
            // Start table
            echo '<table class="w3-table w3-border thetable w3-black">';
            echo '<tr class="primarybg2">';
            // Table header
            echo '<th>Loan ID</th>';
            echo '<th>Loan Holder</th>';
            echo '<th>Loan Amount</th>';
            echo '<th>Balance</th>';
            echo '<th>Date Applied</th>';
            echo '<th>Date Approved</th>';
            echo '<th>Date Verified</th>';
            echo '<th>Amount Paid</th>';
            echo '<th>Payment Code</th>';
            echo '<th>Status</th>';
            echo '<th>Actions</th>';
            echo '</tr>';

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey w3-grey" data-guarantors="' . $row["loanguarantors"] . '">';
                echo '<td>' . $row["loanid"] . '</td>';
                echo '<td>' . $row["loanholder"] . '</td>';
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
                            echo "<a href=\"actions/rejectloan.php?loannum={$row["loanid"]}\" class=\"primarybg themebtn3 hover2\">reject</a>";
                            echo "<a href=\"actions/approveloan.php?loannum={$row["loanid"]}\" class=\"primarybg themebtn3 hover2\">approve</a>";
                            echo "<a href=\"#\" class=\"primarybg themebtn3 hover2\" data-guarantors=\"{$row["loanguarantors"]}\" onclick=\"showguarantors(this)\">view Guarantors</a>";
                            break;
                        case 'rejected':
                            // code...
                            //echo "<a href=\"actions/banuser.php?username={$row["loanholder"]}\" class=\"primarybg themebtn3 hover2\">ban user</a>";
                            echo "--";
                            break;
                        case 'unpaid':
                            // code...
                            // echo "<a href=\"#\" class=\"primarybg themebtn3 hover2\">{$row['status']}</a>";
                            echo "--";
                            break;
                        case 'pending verification':
                            // code...
                            echo "<a href=\"actions/verifyloan.php?loannum={$row["loanid"]}\" class=\"primarybg themebtn3 hover2\">Verify payment</a>";
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
    }

    // Check if the filter variable exists
    if (isset($filter)) {
        // Check if the filter is "all" or not
        if ($filter != "all") {
            // Display records based on the filter value
            displayLoanRecords($filter);
        } else {
            // Display all records
            displayLoanRecords();
        }
    } else {
        // Invalid request
        echo "Invalid request";
    }

    // Close connection
    $conn->close();
?>
