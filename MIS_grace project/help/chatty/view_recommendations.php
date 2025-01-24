<?php
    include 'connect.php';

    if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curuser = $_COOKIE['curuser'];
    $curusertype = $_COOKIE['curusertype'];

    function fetchRecommendations($sql, $conn) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Beneficiary Name</th>
                        <th>Age</th>
                        <th>BC Number</th>
                        <th>Description</th>
                        <th>Medical Status</th>
                        <th>Amount Required</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Residence</th>
                        <th>Status</th>";
            global $curusertype;
            if ($curusertype == 'admin') {
                echo "<th>Actions</th>";
            }
            echo "</tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['bname']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['BCnumber']}</td>
                        <td>{$row['Description']}</td>
                        <td>{$row['medicalstatus']}</td>
                        <td>{$row['amountrequired']}</td>
                        <td>{$row['startdate']}</td>
                        <td>{$row['enddate']}</td>
                        <td>{$row['residence']}</td>
                        <td>{$row['status']}</td>";
                if ($curusertype == 'admin') {
                    if ($row['status'] == 'pending') {
                        echo "<td><button onclick=\"updateStatus({$row['id']}, 'approved')\">Approve</button> 
                              <button onclick=\"updateStatus({$row['id']}, 'rejected')\">Reject</button></td>";
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

        $sql = "SELECT * FROM recommendations WHERE userid = $theid";
        fetchRecommendations($sql, $conn);
    } else {
        $filter = isset($_GET['filter']) ? $_GET['filter'] : '';
        
        if ($filter == 'all') {
            $sql = "SELECT * FROM recommendations";
            fetchRecommendations($sql, $conn);
        } else if ($filter == 'pending') {
            $sql = "SELECT * FROM recommendations WHERE status = 'pending'";
            fetchRecommendations($sql, $conn);
        } else {
            $sql = "SELECT * FROM recommendations";
            fetchRecommendations($sql, $conn);
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
