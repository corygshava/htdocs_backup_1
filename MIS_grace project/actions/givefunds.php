<?php
    include 'connect.php';

    if (isset($_GET['kidid'])) {
        $kidid = $_GET['kidid'];

        // Calculate total amount in treasury
        $sql = "SELECT SUM(depoamount) AS deposamt FROM deposits WHERE status = 'verified'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $deposamt = $row['deposamt'];
        } else {
            $deposamt = 0;
        }

        // Calculate total amount used
        $sql = "SELECT SUM(transamount) AS transamt FROM transactions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $transamt = $row['transamt'];
        } else {
            $transamt = 0;
        }

        // Calculate max available amount
        $maxamt = $deposamt - $transamt;

        // Check if beneficiary record exists
        $sql = "SELECT * FROM beneficiaries WHERE benid = $kidid";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $togive = $row['amountrequired'];
            $kidname = $row['bname'];

            if ($maxamt >= $togive) {
                // Generate random code
                $thecode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);

                // Insert transaction record
                $today = date('Y-m-d h:i:s');
                $sql = "INSERT INTO transactions (benid, bname, transamount, transdate, code) 
                        VALUES ($kidid, '$kidname', $togive, '$today', '$thecode')";
                if ($conn->query($sql) === TRUE) {
                    $restext = "Funds allocated successfully!";

                    $updateben = "UPDATE beneficiaries SET lastfunddate = '$today' WHERE benid = '$kidid'";
                    if($conn->query($updateben)){
                        $restext = "Funds allocated successfully!";
                    } else {
                        $restext = "Error updating beneficiary records : <b>{$conn->error}</b>";
                    }
                } else {
                    $restext = "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $restext = "Inadequate funds.";
            }
        } else {
            $restext = "Beneficiary not found.";
        }
    } else {
        $restext = "Invalid request.";
    }

    $processtxt = "processing transaction";
    $timeout = 2.5;
    $theloc = "../admin/admin_givefunds.php";

    // header("refresh:3;url=../admin/admin_givefunds.php");

    include '../components/loader.php';
?>
