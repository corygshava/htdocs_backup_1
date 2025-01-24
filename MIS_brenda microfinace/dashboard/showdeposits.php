<?php
    if(isset($criteria)){
        include "actions/connect.php";

        if($criteria == "all"){

            $sql = "SELECT depoid, depoamt, depoholder, depodate, depo_transactioncode, depostatus FROM deposits";

            // Execute the query
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Start table
                echo '<table class="w3-table w3-border thetable">';
                echo '<tr class="primarybg2 w3-text-white">';
                // Table header
                echo '<th>deposit id</th>';
                echo '<th>deposit amount</th>';
                echo '<th>deposit holder</th>';
                echo '<th>deposit date</th>';
                echo '<th>transactioncode</th>';
                echo '<th>status</th>';
                echo '<th>actions</th>';
                echo '</tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey w3-grey">';
                    echo '<td>' . $row["depoid"] . '</td>';
                    echo '<td>' . $row["depoamt"] . '</td>';
                    echo '<td>' . $row["depoholder"] . '</td>';
                    echo '<td>' . $row["depodate"] . '</td>';
                    echo '<td>' . $row["depo_transactioncode"] . '</td>';
                    echo '<td>' . $row["depostatus"] . '</td>';
                    echo '<td>';
                    switch ($row["depostatus"]) {
                        case 'pending verification':
                            // code...
                            echo "<a href=\"actions/verifydeposit.php?deponum={$row["depoid"]}\" class=\"primarybg themebtn3 hover2\">Verify deposit</a>";
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
            $sql = "SELECT depoid, depoamt, depodate, depo_transactioncode, depostatus FROM deposits WHERE depoholder = '$criteria'";

            // Execute the query
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Start table
                echo '<table class="w3-table w3-border thetable">';
                echo '<tr class="primarybg2 w3-text-white">';
                // Table header
                echo '<th>deposit id</th>';
                echo '<th>deposit amount</th>';
                echo '<th>deposit date</th>';
                echo '<th>transactioncode</th>';
                echo '<th>status</th>';
                echo '</tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
                    echo '<td>' . $row["depoid"] . '</td>';
                    echo '<td>' . $row["depoamt"] . '</td>';
                    echo '<td>' . $row["depodate"] . '</td>';
                    echo '<td>' . $row["depo_transactioncode"] . '</td>';
                    echo '<td>' . $row["depostatus"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "<div class=\"w3-center\"><button class=\"primarybg themebtn3\">0 records found</button></div>";
            }
        }
    } else {
        echo "<div class=\"w3-center\"><button class=\"w3-red themebtn3\">invalid request</button></div>";
    }
?>