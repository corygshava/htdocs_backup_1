<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/tables.css">

    <title>CFS : user deposits</title>
</head>
<body>
    
    <?php
        if ($curusertype == 'admin') {
            include '../components/admin_navbar.php';
        } else {
            include '../components/sponsor_navbar.php';
        }
    ?>

    <div class="content">
        <div class="tableholder">
            <div class="w3-center">
                <?php

                if($curusertype == "sponsor"){
                    echo '<h2>Your Deposits</h2>
                    <hr>
                    <p>Here are all your deposits</p>';
                } else {
                    $filt = (isset($_GET['filter'])) ? $_GET['filter'] : "All";
                    echo "<h2>$filt Deposits</h2>
                    <hr>
                    <p>Here are all deposits in the database</p>";
                }
                ?>
            </div>

<?php
    include '../actions/connect.php';

    if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curuser = $_COOKIE['curuser'];
    $curusertype = $_COOKIE['curusertype'];

    function fetchDeposits($sql, $conn) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class=\"w3-table w3-border\">
                    <tr class=\"themebg w3-text-white\">
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Code</th>
                        <th>Status</th>";
            global $curusertype;
            if ($curusertype == 'admin') {
                echo "<th>Actions</th>";
            }
            echo "</tr>";

            while($row = $result->fetch_assoc()) {
                $myamt = number_format($row['depoamount'],2,'.',',');
                echo "<tr class=\"w3-border-bottom\">
                        <td>{$row['depoid']}</td>
                        <td>{$row['userid']}</td>
                        <td>{$row['depodate']}</td>
                        <td>{$myamt}</td>
                        <td>{$row['code']}</td>
                        <td>{$row['status']}</td>";
                if ($curusertype == 'admin') {
                    if ($row['status'] == 'pending') {
                        echo "<td>
                            <a href=\"../actions/updatedepo.php?theid={$row['depoid']}&thestate=verified\">Verify</a> 
                            <a href=\"../actions/updatedepo.php?theid={$row['depoid']}&thestate=Error\">Error</a>
                        </td>";
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

        </div>

        <div class="bottomopt">
            <button class="w3-text-white" onclick="print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>


    <?php
        include '../components/footer.php';
    ?>
</body>
</html>