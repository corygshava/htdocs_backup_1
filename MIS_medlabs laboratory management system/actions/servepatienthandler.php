<?php
    require "../actions/checksession.php";
?>

<!-- 

    if the patient was refered the referals table record corresponding with the provided one is updated as attended to

    eitherway the patients' records table is saved and updated

-->

<?php
    $serviceid = $_POST['serviceid'];
    $referalid = $_POST['referalid'];
    $servicer = $_POST['servicer'];
    $patientname = $_POST['patientname'];
    $service = $_POST['service'];
    $description = $_POST['description'];

    $usesreferal = $referalid != '';

    if($usesreferal){
        $myop = "UPDATE referals SET state = 'attended to' WHERE referalid = '$referalid'";
        include("../actions/getdata.php");
    }

    $myop = "INSERT INTO patientrecords (ID, serviceserial,PatientName, service, description, servicer) VALUES (NULL, '$serviceid','$patientname', '$service', '$description', '$servicer') ";
    include("../actions/getdata.php");


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

    <title>patient service receipt</title>

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

    <div class="sheetContainer">
        <div class="header">
            <button class="w3-right w3-text-white"><b><?php echo $serviceid;?></b></button>
            <span>Patient Service Sheet</span>
        </div>
        <div class="body">
            <?php    
                echo "<p>I <b>$curuser</b> have serviced <b>$patientname</b> by issuing a service by the designation <b>$service</b></p>
                    <p><h4>Session remarks</h4></p>
                    <p><i>$description</i></p>
                ";
            ?>
        </div>
        <div class="footer">
            <hr>
            <span>Service rendered on : <b id="dateTxt">No data</b></span>
        </div>
    </div>

</body>
</html>

<script>
    document.querySelector("#dateTxt").innerText = Date().normalize();
    print();
    window.location.assign("../dashboard/index.php");
</script>