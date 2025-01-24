<?php
    if(isset($criteria)){
        include "actions/connect.php";

        if($criteria == "all"){

            $sql = "SELECT saveid, saveamt, saveholder, savestatus, updatedates, savestartdate FROM savings";

            // Execute the query
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Start table
                echo '<table class="w3-table w3-border thetable">';
                echo '<tr class="primarybg2 w3-text-white">';
                // Table header
                echo '<th>saveid</th>';
                echo '<th>saveamount</th>';
                echo '<th>saveholder</th>';
                echo '<th>savestatus</th>';
                echo '<th>update dates</th>';
                echo '<th>first deposit date</th>';
                echo '</tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
                    echo '<td>' . $row["saveid"] . '</td>';
                    echo '<td>' . $row["saveamt"] . '</td>';
                    echo '<td>' . $row["saveholder"] . '</td>';
                    echo '<td>' . $row["savestatus"] . '</td>';
                    echo '<td>' . $row["updatedates"] . '</td>';
                    echo '<td>' . $row["savestartdate"] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "<div class=\"w3-center\"><button class=\"primarybg themebtn3\">0 records found</button></div>";
            }
        } else {
            $sql = "SELECT saveid, saveamt, savestatus, updatedates, savestartdate FROM savings WHERE saveholder = '$criteria'";

            // Execute the query
            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
                // Start table
                echo '<table class="w3-table w3-border thetable">';
                echo '<tr class="primarybg2 w3-text-white">';
                // Table header
                echo '<th>saveid</th>';
                echo '<th>saveamount</th>';
                echo '<th>savestatus</th>';
                echo '<th>update dates</th>';
                echo '<th>first deposit date</th>';
                echo '<th>Actions</th>';
                echo '</tr>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
                    echo '<td>' . $row["saveid"] . '</td>';
                    echo '<td>' . $row["saveamt"] . '</td>';
                    echo '<td>' . $row["savestatus"] . '</td>';
                    echo '<td>' . $row["updatedates"] . '</td>';
                    echo '<td>' . $row["savestartdate"] . '</td>';
                    $myaction = "<a href=\"withdraw.php\" class=\"primarybg themebtn3\">withdraw funds</a>";
                    echo '<td>' . $myaction . '</td>';
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