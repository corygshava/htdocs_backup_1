<?php
    // Include the database connection file
    include "actions/connect.php";

    // SQL query to select records from the customers table
    $sql = "SELECT custid, custname, custstatus, custcontact FROM customers";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Start table
        echo '<table class="w3-table w3-border thetable">';
        echo '<tr class="primarybg2">';
        // Table header
        echo '<th>Customer ID</th>';
        echo '<th>Name</th>';
        echo '<th>Status</th>';
        echo '<th>Contact</th>';
        echo '<th>number of loans</th>';
        echo '<th>actions</th>';
        echo '</tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $thecust = $row['custname'];
            $myop = "SELECT COUNT(*) as counts FROM loans WHERE loanholder = '$thecust'";

            $myresult = $conn->query($myop);
            $inrow = $myresult->fetch_assoc();
            $myloans = $inrow['counts'] == '' ? 0 : $inrow['counts'];

            $myop = "SELECT COUNT(*) as counts FROM loans WHERE loanholder = '$thecust' AND status = 'unpaid'";

            $myresult = $conn->query($myop);
            $inrow = $myresult->fetch_assoc();
            $myunpaidloans = $inrow['counts'] == '' ? 0 : $inrow['counts'];

            echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
            echo '<td>' . $row["custid"] . '</td>';
            echo '<td>' . $row["custname"] . '</td>';
            echo '<td>' . $row["custstatus"] . '</td>';
            echo '<td>' . $row["custcontact"] . '</td>';
            echo '<td><span class="themebtn3 w3-text-white primarybg2">' . $myloans . ' loans</span><span class="themebtn3 w3-text-white primarybg2">' . $myloans . ' unpaid loan(s)</span></td>';

            $extratxt = $row["custstatus"] != "active" ? '--' : "<a href=\"actions/banuser.php?theuser={$row['custname']}\" class=\"primarybg themebtn3 w3-hover-red\">Report to CRB</a>";
            echo '<td>' . $extratxt . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "<div class=\"w3-center\"><button class=\"primarybg themebtn3\">0 records found</button></div>";
    }

    // Close connection
    $conn->close();
?>
