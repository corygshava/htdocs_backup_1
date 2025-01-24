<?php 
    include 'actions/connect.php';

    // Query to fetch all records from the sales table
    $query_sales = "SELECT * FROM users";
    $result_sales = mysqli_query($conn, $query_sales);

    $res = "";

    $res .= "
            <tr>
                <th>id</th>
                <th>Username</th>
                <th>password</th>
                <th>Date added</th>
            </tr>";

    if ($result_sales) {

        // Fetch and display each row of the sales table
        while ($row = mysqli_fetch_assoc($result_sales)) {
            $res .= "<tr>
			<td>{$row['Id']}</td>
			<td>{$row['Username']}</td>
			<td><b title=\"{$row['Password']}\">userpassword</b></td>
			<td>{$row['Date_added']}</td>
			</tr>";
        }
    } else {
        $res .= "<tr><td colspan='8' style='text-align:center;'>error retreiving users' records</td></tr>";
    }

    // Add the final row with '-- thats all --'
    $res .= "<tr><td colspan='8' style='text-align:center;'>-- thats all --</td></tr>";
?>