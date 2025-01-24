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
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>All referals</title>

    <style>
        .display{position:relative;overflow:hidden;}
    </style>
</head>
<body>


    <!-- 
        so this code checks whether the current user is a doctor or a lab technician
        if doctor it shows only the referals with his / her curuser
        otherwise it just lists all referals in the database
    -->

    <?php
        $thetable = "referals";
        $myop = "";
        $toshow = "";

        if(isset($_GET["thetable"]) && $curusertype != "doctor"){
            $thetable = $_GET["thetable"];
        }

        if($curusertype == "doctor"){
            $myop = "SELECT referalID,DoctorSerial,DoctorName,PatientName,service,description,state FROM referals WHERE doctorname = '$curuser'";
            $toshow = "My referals";
        } else {
            $myop = "SELECT referalID,DoctorSerial,DoctorName,PatientName,service,description,state FROM referals";
            $toshow = "All referals";
        }

        include("../actions/getdata.php");

        $outxt = '<table class="w3-table w3-border-blue w3-border">';

        // show headings
        $outxt = $outxt.'
            <tr class="w3-blue w3-borderless">
                <th>referalID</th>
                <th>DoctorSerial</th>
                <th>DoctorName</th>
                <th>PatientName</th>
                <th>service</th>
                <th>description</th>
                <th>state</th>
            </tr>
        ';

        while ($row = $result->fetch_row()) {
            $extratxt = $row[6] == "pending" ? 'onclick="servePatient(this)" style="cursor:alias;"' : '';
            $outxt = $outxt."<tr class=\"w3-light-grey w3-hover-grey w3-border\" $extratxt>";

            for ($n=0; $n < 7; $n++) { 
                if($n < 6){
                    $outxt = $outxt.'<td style="padding:10px !important;">'.$row[$n].'</td>'."\n";
                } else {
                    $mycol = $row[$n] == "pending" ? "orange" : "green";
                    $outxt = $outxt.'<td style="padding:10px !important;">'."<button class=\"w3-tag w3-$mycol\" style=\"border:none;\">".$row[$n].'</button></td>'."\n";
                }
            }

            $outxt = $outxt.'</tr>';
        }

        $outxt = $outxt.'</table>';
        // exit;
    ?>

    <nav class="w3-bar w3-white">
        <a href="javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a href="#" class="w3-bar-item pagetitle">All referals</a>
    </nav>

    <div class="display" style="height:180px">
        <img src="" alt="" class="display-myimg random-image-ls">
        <div class="w3-animate-zoom"><span class="subtxt"><?php echo $toshow;?></span></div>
    </div>

    <div class="w3-container" style="margin:25px 0;">
        <!-- <table class="w3-table w3-border mytable">
            <tr class="w3-border w3-black">
                <th>referral ID</th>
                <th>Patient Name</th>
                <th>Refering Doctor</th>
                <th>Doctor ID</th>
                <th>Service to render</th>
                <th>Referal state</th>
                <th>extra details</th>
            </tr>
            <tr>
                <td>23123</td>
                <td>Danson Miari</td>
                <td>David G simons</td>
                <td>23111</td>
                <td>CT scan</td>
                <td>pending</td>
                <td>none included</td>
            </tr>
            <tr>
                <td>23123</td>
                <td>Danson Miari</td>
                <td>David G simons</td>
                <td>23111</td>
                <td>CT scan</td>
                <td>pending</td>
                <td>none included</td>
            </tr>
        </table> -->
        <?php echo $outxt;?>
    </div>

    <footer class="w3-light-grey">
        <p>Medlabs Laboratory Management Information System</p>
    </footer>
</body>

<script src="../js/utility.js">
</script>

<script>
    generateRandomImages("../");
    // document.body.style.backgroundImage = `url("../images/pexels-chokniti-khongchum-3082452.jpg")`

    function servePatient(element) {
        let items = element.children;
        let payload = "";
        payload += `referalID=${items[0].innerText}&`;
        payload += `DoctorSerial=${items[1].innerText}&`;
        payload += `DoctorName=${items[2].innerText}&`;
        payload += `PatientName=${items[3].innerText}&`;
        payload += `service=${items[4].innerText}&`;
        payload += `description=${items[5].innerText}&`;
        payload += `state=${items[6].innerText}`;

        location.assign(`servepatient.php?fromrefer=yes&${payload}`);
    }
</script>
</html>