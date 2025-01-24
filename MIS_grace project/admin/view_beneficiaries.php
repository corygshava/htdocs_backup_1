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
                <h2>All beneficiaries</h2>
                <hr>
                <p>Here are all your deposits</p>
            </div>

<?php
    include '../actions/connect.php';

    if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curusertype = $_COOKIE['curusertype'];

    if ($curusertype == 'admin') {
        $sql = "SELECT * FROM beneficiaries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class=\"w3-table w3-border w3-white\">
                <tr class=\"themebg w3-text-white\">
                        <th>Name</th>
                        <th>Age</th>
                        <th>Birth Certificate No</th>
                        <th>Amount Required</th>
                        <th>End Date</th>
                        <th>Last Fund Date</th>
                        <th>Residence</th>
                        <th>Actions</th>
                    </tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "
                    <tr class=\"w3-border-bottom\">
                        <td>{$row['bname']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['BCnumber']}</td>
                        <td>{$row['amountrequired']}</td>
                        <td>{$row['enddate']}</td>
                        <td>{$row['lastfunddate']}</td>
                        <td>{$row['residence']}</td>
                        <td><a href=\"view_beneficiary.php?kidid={$row['benid']}\">view info</a></td>
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
</body>
</html>