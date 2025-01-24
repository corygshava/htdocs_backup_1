<?php
include 'connect.php';

if (!isset($_COOKIE['curusertype'])) {
    echo "<script>alert('No user type found. Please log in.');</script>";
    exit;
}

$curusertype = $_COOKIE['curusertype'];

if ($curusertype == 'admin') {
    // List all transactions
    $sql = "SELECT * FROM transactions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Transaction ID</th>
                    <th>Beneficiary ID</th>
                    <th>Beneficiary Name</th>
                    <th>Transaction Amount</th>
                    <th>Transaction Date</th>
                    <th>Code</th>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['transid']}</td>
                    <td>{$row['benid']}</td>
                    <td>{$row['bname']}</td>
                    <td>{$row['transamount']}</td>
                    <td>{$row['transdate']}</td>
                    <td>{$row['code']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }

    // Calculate total amount given
    $sql = "SELECT SUM(transamount) AS totalgiven FROM transactions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalgiven = $row['totalgiven'];
        echo "<p>Total Amount Given: $totalgiven</p>";
    } else {
        echo "Total Amount Given: 0";
    }
} else {
    echo "You are not allowed to access this page.";
}

$conn->close();
?>
