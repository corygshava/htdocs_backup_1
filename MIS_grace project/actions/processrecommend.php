<?php
    include 'connect.php';

    if (!isset($_COOKIE['curusertype'])) {
        echo "<script>alert('No user type found. Please log in.'); window.location.href = 'index.html';</script>";
        exit;
    }

    $curusertype = $_COOKIE['curusertype'];

    if ($curusertype == 'sponsor') {
        // Check if all POST variables are present
        $required_fields = ['theuserid','thename','theage','BCnumber','medicalstatus','theamt','theresidence','thegender','description'];

        foreach ($required_fields as $field) {
            if (!isset($_POST[$field])) {
                echo "Missing $field. Please provide all required information.<br>";
                header("refresh: 1.2; sponsor_recommend.php");
                echo "redirecting...";
                exit;
            }
        }

        $theuserid = $_POST['theuserid'];
        $thename = $_POST['thename'];
        $theage = $_POST['theage'];
        $BCnumber = $_POST['BCnumber'];
        $medicalstatus = $_POST['medicalstatus'];
        $theamt = $_POST['theamt'];
        $theresidence = $_POST['theresidence'];
        $thegender = $_POST['thegender'];
        $description = $_POST['description'];

        // Insert new record into beneficiaries table
        $startdate = date('Y-m-d');
        $enddate = date('Y-m-d', strtotime('+4 years'));
        $sql = "INSERT INTO recommendations (userid, bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, residence, status)
                VALUES ('$theuserid', '$thename', '$theage', '$thegender', '$BCnumber', '$description', '$medicalstatus', '$theamt', '$startdate', '$enddate', '$theresidence','pending')";

        if ($conn->query($sql)) {
            echo "<script>alert('New recommendation added successfully.'); setTimeout(function(){ window.location.href = '../admin/index.php'; }, 2000);</script>";
            echo "redirecting...";
        } else {
            echo "Error adding recommendation: <b>'" . $conn->error . "'</b>";
            echo "redirecting...";
        }
    } else {
        echo "<script>alert('Only sponsors are allowed to access this page.');</script>";
        header("refresh: 1.2;../admin/");
    }

    $conn->close();
?>
