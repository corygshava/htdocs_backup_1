<?php
    $prefix = "../";
    include '../actions/checksession.php';
    include '../actions/connect.php';

    if (!isset($_POST['vcode']) || !isset($_POST['theamt'])) {
        echo "<script>alert('Please provide both the code and the amount');</script>";
    } else {
        $vcode = $_POST['vcode'];
        $amount = $_POST['theamt'];

        if (!isset($_COOKIE['curuser'])) {
            echo "<script>alert('No active user found. Please log in.');</script>";
            exit;
        }

        $curuser = $_COOKIE['curuser'];

        // Retrieve userid from users table
        $sql = "SELECT userid FROM users WHERE username = '$curuser'";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $restext = "User not found";
            exit;
        }

        $row = $result->fetch_assoc();
        $theid = $row['userid'];

        // Insert new deposit record
        $insertSql = "INSERT INTO deposits (userid, depoamount, depodate, code, status) VALUES ('$theid', '$amount', NOW(), '$vcode', 'pending')";

        if ($conn->query($insertSql)) {
            $restext = "Deposit added successfully";
            $worked = "yes";
        } else {
            $restext = "Error adding deposit: " . $conn->error . "";
        }
    }

    $loc = isset($worked) ? 'index.php' : 'make_deposit.php';

    // header("refresh: 2.5; $loc");

    $processtxt = "processing deposit";
    $timeout = 2.13;
    
    include '../components/loader.php';
?>
