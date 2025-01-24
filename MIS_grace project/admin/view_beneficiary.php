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
    <link rel="stylesheet" href="../css/login.css">
    
    <title>CFS : View beneficiary</title>
</head>
<body>
    <?php
        if ($curusertype == 'admin') {
            include '../components/admin_navbar.php';
        } else {
            include '../components/sponsor_navbar.php';
        }
    ?>

    <?php
        include '../actions/connect.php';

        if (isset($_GET['kidid'])) {
            $kidid = $_GET['kidid'];

            // Check if beneficiary record exists
            $sql = "SELECT * FROM beneficiaries WHERE benid = $kidid";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $bname = $row['bname'];
                $age = $row['age'];
                $gender = $row['gender'];
                $BCnumber = $row['BCnumber'];
                $description = $row['Description'];
                $medicalstatus = $row['medicalstatus'];
                $amountrequired = $row['amountrequired'];
                $startdate = $row['startdate'];
                $enddate = $row['enddate'];
                $lastfunddate = $row['lastfunddate'];
                $lastfunddate = $lastfunddate == '' ? 'N/A' : $lastfunddate;
                $residence = $row['residence'];
                
                // Now you can use these variables for further processing
                $transactionsSum = "SELECT SUM(transamount) as total FROM transactions WHERE benid = '$kidid'";
                $result = $conn->query($transactionsSum);
                $res = $result->fetch_assoc();
                $totalgiven = $res['total'];
                $totalgiven = $totalgiven == '' ? 0 : $totalgiven;
            } else {
                echo "Beneficiary not found.";
            }
        } else {
            echo "Invalid request.";
            exit();
        }

        $conn->close();
        ?>


    <div class="content">
        <div class="dataform">
            <div class="w3-center">
                <h2>beneficiary info</h2>
                <hr>
                <p class="w3-center">beneficiary data</p>
            </div>
            <div>
                <div class="w3-row">
                    <div class="w3-col m4 nptpanel">
                        <div class="infotag">
                            <h3>Name</h3>
                            <p><?php echo $bname;?></p>
                        </div>
                        <div class="infotag">
                            <h3>Age</h3>
                            <p><?php echo $age;?></p>
                        </div>
                        <div class="infotag">
                            <h3>BC number</h3>
                            <p><?php echo $BCnumber;?></p>
                        </div>
                    </div>
                    <div class="w3-col m4 nptpanel">
                        <div class="infotag">
                            <h3>medical status</h3>
                            <p><?php echo $medicalstatus;?></p>
                        </div>
                        <div class="infotag">
                            <h3>amount required</h3>
                            <p><?php echo $amountrequired;?></p>
                        </div>
                        <div class="infotag">
                            <h3>residence</h3>
                            <p><?php echo $residence;?></p>
                        </div>
                    </div>
                    <div class="w3-col m4 nptpanel">
                        <div class="infotag">
                            <h3>Gender</h3>
                            <p><?php echo $gender;?></p>
                        </div>
                        <div class="infotag">
                            <h3>Last transaction date</h3>
                            <p><?php echo $lastfunddate;?></p>
                        </div>
                        <div class="infotag">
                            <h3>total given</h3>
                            <p><?php echo $totalgiven;?></p>
                        </div>
                    </div>
                </div>
                <div class="nptpanel">
                    <div class="infotag">
                        <h3>Description</h3>
                        <p><?php echo $description;?></p>
                    </div>
                </div>

                <a href="view_beneficiaries.php" class="w3-btn themebg w3-text-white">back</a>
            </div>
        </div>
    </div>
</body>
</html>
