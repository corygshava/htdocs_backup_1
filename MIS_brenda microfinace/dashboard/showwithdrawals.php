<?php
    // Include the database connection file
    include "actions/connect.php";

    if(isset($thereq) && isset($curuser)){

        // SQL query to select records from the customers table
        $sql = $thereq == 'all' ? 
            "SELECT wdid, wdamt, wdholder, wddate FROM withdrawals" :
            "SELECT wdid, wdamt, wddate FROM withdrawals WHERE wdholder = '$curuser'";

        // Execute the query
        $result = $conn->query($sql);

        // Check if there are results
        if ($result->num_rows > 0) {
            if($thereq == 'all'){
                // Start table
                echo '<table class="w3-table w3-border thetable">';
                echo '<tr class="primarybg2 w3-text-white">';
                // Table header
                echo '<th>withdrawal id</th>';
                echo '<th>withdrawal amount</th>';
                echo '<th>withdrawal Customer</th>';
                echo '<th>date</th>';
                echo '</tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
                    echo '<td>' . $row["wdid"] . '</td>';
                    echo '<td>' . $row["wdamt"] . '</td>';
                    echo '<td>' . $row["wdholder"] . '</td>';
                    echo '<td>' . $row["wddate"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                // Start table
                echo '<table class="w3-table w3-border thetable">';
                echo '<tr class="primarybg2 w3-text-white">';
                // Table header
                echo '<th>withdrawal id</th>';
                echo '<th>withdrawal amount</th>';
                echo '<th>date</th>';
                echo '</tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
                    echo '<td>' . $row["wdid"] . '</td>';
                    echo '<td>' . $row["wdamt"] . '</td>';
                    echo '<td>' . $row["wddate"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        } else {
            echo "<div class=\"w3-center\"><button class=\"primarybg themebtn3\">0 records found</button></div>";
        }
    }

    // Close connection
    $conn->close();
?>