<?php
include 'connect.php';

if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
    echo "<script>alert('No active user found. Please log in.');</script>";
    exit;
}

$curuser = $_COOKIE['curuser'];
$curusertype = $_COOKIE['curusertype'];

function fetchDeposits($sql, $conn) {
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Code</th>
                    <th>Status</th>";
        global $curusertype;
        if ($curusertype == 'admin') {
            echo "<th>Actions</th>";
        }
        echo "</tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['depoid']}</td>
                    <td>{$row['userid']}</td>
                    <td>{$row['depoamount']}</td>
                    <td>{$row['depodate']}</td>
                    <td>{$row['code']}</td>
                    <td>{$row['status']}</td>";
            if ($curusertype == 'admin') {
                if ($row['status'] == 'pending') {
                    echo "<td><button onclick=\"updateStatus({$row['depoid']}, 'approved')\">Approve</button> 
                          <button onclick=\"updateStatus({$row['depoid']}, 'error')\">Error</button></td>";
                } else {
                    echo "<td>None available</td>";
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
}

if ($curusertype == 'sponsor') {
    $sql = "SELECT userid FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $curuser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>alert('User not found');</script>";
        exit;
    }

    $row = $result->fetch_assoc();
    $theid = $row['userid'];

    $sql = "SELECT * FROM deposits WHERE userid = $theid";
    fetchDeposits($sql, $conn);
} else {
    $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
    
    if ($filter == 'all') {
        $sql = "SELECT * FROM deposits";
        fetchDeposits($sql, $conn);
    } else if ($filter == 'pending') {
        $sql = "SELECT * FROM deposits WHERE status = 'pending'";
        fetchDeposits($sql, $conn);
    } else {
        $sql = "SELECT * FROM deposits";
        fetchDeposits($sql, $conn);
    }
}

$conn->close();
?>

<script>
function updateStatus(id, newStatus) {
    // This function would handle the updating of the status via AJAX or a form submission
    alert(`Update status for ID ${id} to ${newStatus}`);
}
</script>
