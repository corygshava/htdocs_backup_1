<?php 
    include 'actions/connect.php';

    // Query to fetch all records from the sales table
    $query_sales = "SELECT * FROM sales";
    $result_sales = mysqli_query($conn, $query_sales);

    $res = "";

    $res .= "
            <tr>
                <th>Transaction Code</th>
                <th>Amount Sold</th>
                <th>Amount Received</th>
                <th>Date Done</th>
            </tr>";

    if ($result_sales) {

        // Fetch and display each row of the sales table
        while ($row = mysqli_fetch_assoc($result_sales)) {
            $res .= "<tr>
                    <td>" . $row['transactioncode'] . "</td>
                    <td>" . $row['amt_sold'] . "</td>
                    <td>" . $row['amt_recieved'] . "</td>
                    <td>" . $row['date_done'] . "</td>
                  </tr>";
        }
    } else {
        $res .= "<tr><td colspan='8' style='text-align:center;'>error retreiving sales records</td></tr>";
    }

    // Add the final row with '-- thats all --'
    $res .= "<tr><td colspan='8' style='text-align:center;'>-- thats all --</td></tr>";
?>