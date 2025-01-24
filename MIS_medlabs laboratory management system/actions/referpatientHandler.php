<?php
    require "checksession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/iconic.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>referal handler</title>

    <style>
        @media print{
            .sheetContainer{margin:0px;}
            .sheetContainer .header,.sheetContainer .body,.sheetContainer .footer{padding:15px;}
            .sheetContainer .header {
                background-color: #334;
                color: white;
                font-size: 30px;
            }
            .sheetContainer .body {
                background-color: transparent;
                margin: 25px 0;
            }
            .sheetContainer .footer {
                background-color: #ccc;
                font-size: 20px;
                position: fixed;
                bottom: 0;
                width: 100%;
            }
            button{
                background: transparent !important;
                border: none;
            }
        }
    </style>
</head>
<body>

<div class="w3-hide">
<?php
    if(!(isset($_POST['referalid']))){
        // header("Refresh:1.2; url = ../login.html");
        $referalid = $_POST['patientName'];
        echo "no referal id set ($referalid)";
        exit;
    }

    $referalid = $_POST['referalid'];
    $doctorid = $_POST['doctorid'];
    $doctorname = $_POST['doctorname'];
    $patientName = $_POST['patientName'];
    $service = $_POST['service'];
    $description = $_POST['description'];
    if($description == ""){$description = "no extra details available";}

    $myop = "INSERT INTO referals (ID, referalID, DoctorSerial, DoctorName, PatientName, service, description, state) VALUES (NULL, '$referalid', '$doctorid', '$doctorname', '$patientName', '$service', '$description', 'pending')";
    include("../actions/getdata.php");
?>
</div>

    <!-- 

        posted details are (referalid, doctorid, doctorname, patientName, usertype, description)

        add a record to the referals table using the posted details

        print command is called after 2 seconds.
        a link to go back to dashboard home is visible after 10 seconds
    -->

    <div class="w3-hide">
        This page will be responsible for processing adding of a new patient referal record<br>
        It doesnt do anything for now<br>
        <a href="../dashboard/index.php">go to menu</a>
    </div>

    <div class="sheetContainer">
        <div class="header">
            <button class="w3-right w3-text-white"><b><?php echo $referalid;?></b></button>
            <span>Patient Refferal Sheet</span>
        </div>
        <div class="body">
            <?php    
                echo "<p>I <b>$doctorname</b> (id <b>$doctorid</b>) hereby refer <b>$patientName</b> to the laboratory for the service of <b>$service</b></p>
                    <p><h4>Extra details</h4></p>
                    <p><i>$description</i></p>
                ";
            ?>
        </div>
        <div class="footer">
            <hr>
            <span>Referal date : <b id="dateTxt">No data</b></span>
        </div>
    </div>
</body>

<script>
    document.querySelector("#dateTxt").innerText = Date().normalize();
    print();
    window.location.assign("../dashboard/index.php");
</script>
</html>