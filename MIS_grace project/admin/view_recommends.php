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
                    echo '<h2>Your Recommendations</h2>
                    <hr>
                    <p>Here are all your Recommendations</p>';
                } else {
                    $filt = (isset($_GET['filter'])) ? $_GET['filter'] : "All";
                    echo "<h2>$filt Recommendations</h2>
                    <hr>
                    <p>Here are all Recommendations in the database</p>";
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

    function fetchRecommendations($sql, $conn) {
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table class=\"w3-table w3-border w3-white\">
                <tr class=\"themebg w3-text-white\">
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
                echo "
                    <tr class=\"w3-border-bottom\">
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
                        echo "
                            <td>
                                <a href=\"../actions/acceptrecommendation.php?recid={$row['id']}\">Approve</a>
                                <a href=\"../actions/rejectrecommendation.php?recid={$row['id']}\">Reject</a>
                            </td>";
                    } else {
                        echo "<td>--</td>";
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

        </div>

        <div class="bottomopt">
            <button class="w3-text-white" onclick="print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>

    <script>
        function updateStatus(id, newStatus) {
            // This function would handle the updating of the status via AJAX or a form submission
            alert(`Update status for ID ${id} to ${newStatus}`);
        }
    </script>

    <?php
        include '../components/footer.php';
    ?>
</body>
</html>