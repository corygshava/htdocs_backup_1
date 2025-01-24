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

    <title>CFS : transactions</title>
</head>
<body>
    
    <?php
        include '../components/admin_navbar.php';
    ?>


<div class="content">
        <div class="tableholder">
            <div class="w3-center">
                <h2>All transactions</h2>
                <hr>
                <p>all recorded transactions</p>
            </div>

    <?php
    include '../actions/connect.php';

    if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curusertype = $_COOKIE['curusertype'];

    if ($curusertype == 'admin') {
        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class=\"w3-table w3-border w3-white\">
                <tr class=\"themebg w3-text-white\">
                        <th>transaction id</th>
                        <th>bname</th>
                        <th>amount given</th>
                        <th>date</th>
                        <th>code</th>
                    </tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr class=\"w3-border-bottom\">
                        <td>{$row['transid']}</td>
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
    } else {
        echo "You are not allowed to access this page.";
    }

    $conn->close();
?>

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