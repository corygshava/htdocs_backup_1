<?php
	// Include the database connection
	require_once 'connect.php';

	// Fetch all records from the Farmers table
	$sql = "SELECT * FROM Farmers";
	$result = $conn->query($sql);

	// Start the HTML table
	$res = '';
	$res .= "<tr>
	        <th>ID</th>
	        <th>Name</th>
	        <th>Phone Contact</th>
	        <th>Email</th>
	        <th>Location</th>
	        <th>Date Added</th>
	        <th>actions</th>
	    </tr>";

	// Check if there are any records in the table
	if ($result->num_rows > 0) {
	    // Output data for each row
	    while ($row = $result->fetch_assoc()) {
	        $res .="<tr>
	                <td>{$row['Id']}</td>
	                <td>{$row['Name']}</td>
	                <td>{$row['Phone_contact']}</td>
	                <td>{$row['email']}</td>
	                <td>{$row['location']}</td>
	                <td>{$row['date_added']}</td>
	              </tr>";
	    }
	} else {
	    $res .="<tr><td colspan='6'>No farmers found</td></tr>";
	}

	// Add the final row with "that's all"
	$res .="<tr><td colspan='6' style='text-align:center;'>That's all</td></tr>";

	// Close the database connection
	$conn->close();
?>
