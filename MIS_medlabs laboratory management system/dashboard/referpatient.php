<?php
    require "../actions/checksession.php";
    require "../actions/functions.php";
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

    <title>Refer a patient</title>
</head>

<body class="imagebg">

<div class="w3-hide">
    <!-- generate data to be used in the form -->
    <?php
        if($curusertype != "doctor"){
            header("Refresh:1.2; url = ../index.php");
            exit;
        }

        $myop = "SELECT doctorserial FROM doctors WHERE doctorname = '$curuser'";
        include("../actions/getdata.php");

        $doctorId = ($result->fetch_row())[0];
    ?>
</div>

    <nav class="w3-bar w3-white">
        <a href="javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a href="#" class="w3-bar-item pagetitle">Refer a patient</a>
    </nav>

    <div class="main" id="newuser">
        <div class="login_form w3-center floating-section">
            <div class="w3-display-container display">
                <img src="" alt="image of Doctor smiling" class="display-myimg random-image-ls">
                <div class="w3-animate-opacity">
                    <b class="subtxt">Refer a patient</b>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red"><b></b></span>
                </div>
            </div>

            <form action="../actions/referpatientHandler.php" class="w3-center myform" method="post">

                <div class="input_holder w3-hide">
                    <label for="referalid">refferal ID</label>
                    <br>
                    <input type="text" name="referalid" value="GDF-2323">
                </div>

                <!-- this page makes a db call to find out the doctor's id based on the username -->

                <div class="input_holder w3-hide">
                    <label for="doctorid">Doctor's ID</label>
                    <br>
                    <input type="text" name="doctorid" value="<?php echo $doctorId;?>">
                </div>

                <!-- this is modified to include the name of the current user -->

                <div class="input_holder w3-hide">
                    <label for="doctorid">Doctor's name</label>
                    <br>
                    <input type="text" name="doctorname" value="<?php echo $curuser;?>">
                </div>

                <div class="input_holder">
                    <label for="patientName">Patient's name</label>
                    <br>
                    <input type="text" name="patientName" id="nptPatient" placeholder="enter the patient's name" required>
                </div>

                <!-- [OPTIONAL] theres a table for services being offered -->

                <div class="input_holder">
                    <label for="service">What service does the patient require</label>
                    <br>
                    <?php
                        include("../actions/ourservices.php");
                    ?>
                </div>

                <div class="input_holder">
                    <label for="description">Extra details / description</label>
                    <br>
                    <textarea name="description" cols="30" rows="10" placeholder="enter a short description of the patient's case"></textarea>
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

    document.forms[0].referalid.value = `${generateRandomWord(4)}-${generateRandomNumber(5)}`;
</script>
</html>