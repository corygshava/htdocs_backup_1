<?php
include 'connect.php';

// SQL query to fetch all records from the sysdata table
$sql = "SELECT * FROM sysdata";
$result = $conn->query($sql);

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    $res .='
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Item Value</th>
                <th>actions</th>
            </tr>';
    
    // Output data of each row
    $myround = -1;

    while ($row = $result->fetch_assoc()) {
        $myround += 1;
        $res .= '<tr>
                <td>' . htmlspecialchars($row['id']) . '</td>
                <td>' . htmlspecialchars($row['itemname']) . '</td>
                <td>' . htmlspecialchars($row['itemvalue']) . '</td>
                <td>
                    <button class="themebtn" onclick="editrec('.$myround.')"><i class="fa fa-pencil"></i> edit</button>
                </td>
              </tr>';
    }

    // Add the final row with "-- thats all --"
    $res .= '<tr>
            <td colspan="8" style="text-align:center;">-- thats all --</td>
          </tr>';
} else {
    $res .= '<tr>
            <td colspan="8" style="text-align:center;">no records found</td>
          </tr>';
}

$res .= '<tr>
    <td colspan="8" style="text-align:center;">-- thats all --</td>
  </tr>';

// Close the database connection
$conn->close();
?>
