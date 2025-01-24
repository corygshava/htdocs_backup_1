<?php

    // Query to select all records from the intakes table
    $query = "SELECT * FROM intakes";
    $result = $conn->query($query);

    $res = '';

    // Check if there are records and start the table
    if ($result && $result->num_rows > 0) {
        $res.='<table border="1">
                <tr>
                    <th>Intake Serial</th>
                    <th>Farmer ID</th>
                    <th>Amount Brought</th>
                    <th>Amount Paid</th>
                    <th>Date Added</th>
                </tr>';

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $res.='<tr>
                    <td>' . htmlspecialchars($row['in_serial']) . '</td>
                    <td>' . htmlspecialchars($row['farmer_id']) . '</td>
                    <td>' . htmlspecialchars($row['amt_brought']) . '</td>
                    <td>' . htmlspecialchars($row['amt_paid']) . '</td>
                    <td>' . htmlspecialchars($row['date_added']) . '</td>
                </tr>';
        }

    } else {
        $res.='<tr>
	        <td colspan="5" style="text-align:center;">no records found</td>
	      </tr>';
    }

	// Add the final row
	$res.='<tr>
	        <td colspan="5" style="text-align:center;">-- thats all --</td>
	      </tr>';
?>