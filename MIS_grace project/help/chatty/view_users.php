<?php
include 'connect.php';

// Retrieve all records from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>User Type</th>
                <th>Username</th>
                <th>User Password</th>
            </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['userid']}</td>
                <td>{$row['usertype']}</td>
                <td>{$row['username']}</td>
                <td>{$row['userpassword']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>
