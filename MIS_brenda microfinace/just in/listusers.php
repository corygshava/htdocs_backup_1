<?php
    // Include the database connection file
    include "actions/connect.php";

    // SQL query to select records from the users table
    $sql = "SELECT userid, username, datecreated FROM users";

    // Execute the query
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Start table
        echo '<table class="w3-table w3-border thetable">';
        echo '<tr class="primarybg2">';
        // Table header
        echo '<th>User ID</th>';
        echo '<th>Username</th>';
        echo '<th>Date Created</th>';
        echo '</tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<tr class="w3-border-bottom w3-grey w3-text-black w3-hover-dark-grey">';
            echo '<td>' . $row["userid"] . '</td>';
            echo '<td>' . $row["username"] . '</td>';
            echo '<td>' . $row["datecreated"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
?>
