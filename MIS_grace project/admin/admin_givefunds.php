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

    <title>CFS : Give funds</title>
</head>
<body>


    <?php
        include '../components/admin_navbar.php';
    ?>

    <?php
        include '../actions/connect.php';

        if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
            echo "<script>alert('No active user found. Please log in.');</script>";
            exit;
        }

        $curusertype = $_COOKIE['curusertype'];

        if ($curusertype == 'admin') {
            // Calculate available cash from verified deposits
            $sql = "SELECT SUM(depoamount) AS availablecash FROM deposits WHERE status = 'verified'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $availablecash = $row['availablecash'];
            } else {
                $availablecash = 0;
            }

            $sql = "SELECT SUM(transamount) AS transcash FROM transactions";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $usedcash = $row['transcash'];
            } else {
                $usedcash = 0;
            }

            $availablecash = $availablecash == '' ? 0 : $availablecash;
            $usedcash = $usedcash == '' ? 0 : $usedcash;
            $balance = $availablecash - $usedcash;
            $thebal = number_format($balance,2,'.',',');

            $balanceTxt = "<h2>Total Available Cash: <b>{$thebal}</b></h2>";
    ?>

<div class="w3-center header">
        <?php echo $balanceTxt;?>
    </div>

    <div class="content">
        <div class="tableholder">
            <div class="w3-center">
                <h2>Allocate funds</h2>
                <hr>
                <p>choose a beneficiary to allocate funds to</p>
            </div>

    <?php
        // List all beneficiaries
        $sql = "SELECT * FROM beneficiaries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class=\"w3-table w3-border w3-white\">
                    <tr class=\"themebg w3-text-white\">
                        <th>Name</th>
                        <th>Amount Required</th>
                        <th>End Date</th>
                        <th>Last Fund Date</th>
                        <th>Residence</th>
                        <th>Actions</th>
                    </tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr class=\"w3-border-bottom\">
                        <td>{$row['bname']}</td>
                        <td>{$row['amountrequired']}</td>
                        <td>{$row['enddate']}</td>
                        <td>{$row['lastfunddate']}</td>
                        <td>{$row['residence']}</td>
                        <td><a href=\"../actions/givefunds.php?kidid={$row['benid']}\">Allocate Funds</a></td>
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

    <script>
        function allocateFunds(bcNumber, amountRequired) {
            // This function would handle the allocation of funds via AJAX or a form submission
            alert(`Allocate funds to beneficiary with BC Number ${bcNumber} for amount ${amountRequired}`);
        }
    </script>

    <div class="w3-modal themodal" data-shown="0">
        <div class="w3-modal-content">
            <button class="w3-btn w3-hover-red w3-right" onclick="toggleShow('.themodal')"><i class="fa fa-close"></i></button>
            <h2>Give funds</h2>
        </div>
    </div>

    <script src="../js/SuperScript.js"></script>
</body>
</html>