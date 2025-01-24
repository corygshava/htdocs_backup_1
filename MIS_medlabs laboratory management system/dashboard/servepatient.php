<?php
    require "../actions/checksession.php";
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
    <title>Services rendered form</title>
</head>

<?php
    $referalID = isset($_GET['referalID']) ? $_GET['referalID'] : "";
    $DoctorSerial = isset($_GET['DoctorSerial']) ? $_GET['DoctorSerial'] : "";
    $DoctorName = isset($_GET['DoctorName']) ? $_GET['DoctorName'] : "";
    $PatientName = isset($_GET['PatientName']) ? $_GET['PatientName'] : "";
    $service = isset($_GET['service']) ? $_GET['service'] : "";
    $description = isset($_GET['description']) ? $_GET['description'] : "";
    $state = isset($_GET['state']) ? $_GET['state'] : "";

    $usesReferal = isset($_GET['referalID']);
?>

<body class="imagebg">
    <nav class="w3-bar w3-white">
        <a href="javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a href="#" class="w3-bar-item pagetitle">Services rendered form</a>
    </nav>

    
    <div class="main" id="newuser">
        <div class="login_form w3-center floating-section">
            <div class="w3-display-container display">
                <img src="" alt="image of Doctor smiling" class="display-myimg random-image-ls">
                <div class="w3-animate-opacity">
                    <b class="subtxt">Services rendered form</b>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red"><b></b></span>
                </div>
            </div>

            <form action="../actions/servepatientHandler.php" class="w3-center myform" method="post">

                <!-- sets itself to N/A if its not from a refered patient -->

                <div class="input_holder w3-hide">
                    <label for="serviceid">refferal ID</label>
                    <br>
                    <input type="text" name="serviceid" value="XVCI-2989">
                </div>

                <div class="input_holder w3-hide">
                    <label for="referalid">refferal ID</label>
                    <br>
                    <input type="text" name="referalid" value="<?php echo $referalID;?>">
                </div>

                <div class="input_holder w3-hide">
                    <label for="servicer">Who serviced you</label>
                    <br>
                    <input type="text" name="servicer" value="<?php echo $curuser;?>">
                </div>

                <!-- this field is disabled if the patient was refered -->

                <div class="input_holder">
                    <label for="patientname">Patient name</label>
                    <br>
                    <input type="text" name="patientname" id="nptPatient" <?php if($usesReferal){echo "value=\"$PatientName\"";}?> placeholder="Enter the Patient's full name here" required>
                </div>

                <!-- this is modified to include the name of the current user -->

                <?php
                    if($usesReferal){
                        ?>
                <div class="input_holder">
                    <label for="service">Service rendered</label>
                    <br>
                    <input type="text" name="service" value="<?php echo $service;?>">
                </div>
                
                <div class="input_holder">
                    <label>Doctor's remarks</label><br>
                    <textarea type="text" disabled="true" rows="3" class="w3-text-white"><?php echo $description;?></textarea>
                </div>

                <?php
                    } else {?>
                <!-- disabled if refered -->

                <div class="input_holder">
                    <label for="operation">service rendered</label>
                    <br>
                    
                    <?php
                        include("../actions/ourservices.php");
                    ?>
                </div>
                <?php
                    }
                ?>

                <div class="input_holder">
                    <label for="description">remarks</label>
                    <br>
                    <textarea required name="description" cols="30" rows="10" placeholder="enter remarks about the patient's case"></textarea>
                </div>

                <div class="input_holder">
                    <button type="reset" class="w3-hide w3-btn w3-hover-blue w3-grey themeBtn">reset data</button>
                    <button type="submit" class="w3-btn w3-hover-blue w3-grey themeBtn">submit data</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="w3-light-grey">
        <p>Medlabs Laboratory Management Information System</p>
    </footer>
</body>

<script src="../js/utility.js">
</script>

<script>
    generateRandomImages("../");
    
    document.forms[0].serviceid.value = `${generateRandomWord(4)}-${generateRandomNumber(5)}`;
</script>
</html>