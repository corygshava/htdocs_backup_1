<?php
	// Query to select all records from the deposits table
	$query = "SELECT * FROM deposits";
	$result = $conn->query($query);

	$res = '';
	// Check if there are records and start the table
	if ($result && $result->num_rows > 0) {
	    $res .= '
	            <tr>
	                <th>Transaction Code</th>
	                <th>Deposit Amount</th>
	                <th>Date Done</th>
	            </tr>';

	    // Output data of each row
	    while ($row = $result->fetch_assoc()) {
	        $res .= '<tr>
	                <td>' . htmlspecialchars($row['transaction_code']) . '</td>
	                <td>' . htmlspecialchars($row['Depo_amt']) . '</td>
	                <td>' . htmlspecialchars($row['date_done']) . '</td>
	            </tr>';
	    }

	} else {
	    $res .= '<tr>
            <td colspan="3" style="text-align:center;">none found</td>
          </tr>';
	}

    // Add the final row
    $res .= '<tr>
            <td colspan="3" style="text-align:center;">-- thats all --</td>
          </tr>';

	include '../elements/loader.php';
?>