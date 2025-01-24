<?php
    $recommendeduser='Driver';
    include("actions/checksession.php");
    // echo $curusertype." ".$curuser;
?>

<!-- viewed differently dependind on usertype -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iconic.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/new_styles.css">
    <link rel="stylesheet" href="css/common.css">

    <link rel="stylesheet" href="js/leaflet/leaflet.css">

    <script src="js/app.js"></script>

	<title>all deliveries</title>
</head>
<body>

    <!-- 
        for client, show all deliveries they created, 
        for driver show all deliveries where the status is pending of driver accepted (if driver is the current user) 
        available actions for pending is pick delivery which updates the delivery as accepted by the current user
    -->

    
    <?php
        $myop = "";

        $myop = "SELECT deliveryserial,loadtype,loaddescription,deliverydistance,deliverycost,driver,client,state FROM deliveries WHERE (driver='$curuser' AND state='in transit')";

        include("actions/getdata.php");
        $items = $result-> num_rows;

        if($items == 0){
            if(isset($_GET['filter'])){
                $myop = "SELECT deliveryserial,loadtype,loaddescription,deliverydistance,deliverycost,driver,client,state FROM deliveries WHERE state='pending' OR (driver='$curuser' AND state='selected')";
            } else {
                $myop = "SELECT deliveryserial,loadtype,loaddescription,deliverydistance,deliverycost,driver,client,state FROM deliveries WHERE (driver='$curuser' AND state='accepted') OR (driver='$curuser' AND state='selected') OR (driver='$curuser' AND state='complete') OR (driver='$curuser' AND state='verified') OR (driver='$curuser' AND state='failed')";
            }
        }

        include("actions/getdata.php");

        $outxt = '<table class="w3-table w3-border-blue w3-border">';

        // show headings
        $outxt = $outxt.'
            <tr class="table-header">
                <th>loadtype</th>
                <th>load description</th>
                <th>Distance (km)</th>
                <th>Reward</th>
                <th>Driver</th>
                <th>client</th>
                <th>state</th>
                <th>action</th>
            </tr>
        ';

        if($result->num_rows == 0){
            $outxt = $outxt."<tr class=\"w3-light-grey w3-hover-grey w3-border\" $extratxt>
                <td colspan=\"8\" class=\"w3-center\">No records found</td>
            </tr>";
        }

        while ($row = $result->fetch_row()) {
            $extratxt = $row[6] == "pending" ? 'onclick="servePatient(this)" style="cursor:alias;"' : '';
            $outxt = $outxt."<tr class=\"w3-light-grey w3-hover-grey w3-border\" $extratxt>";

            for ($n=1; $n < 9; $n++) {
                $tempserial = $row[0];
                $tempstate = $row[7];

                if($n == 3 || $n == 4){
                    $num = number_format($row[$n],2,".",",");
                    $res = $n == 3 ? "$num km" : "$num Ksh";
                    $outxt = $outxt.'<td style="padding:10px !important;">'.$res.'</td>'."\n";
                } else if($n < 7){
                    $res = is_numeric($row[$n]) ? number_format($row[$n],2,".",",") : $row[$n];
                    $outxt = $outxt.'<td style="padding:10px !important;">'.$res.'</td>'."\n";
                } else if($n == 7){
                    $mycol = $tempstate == "pending" ? "orange" : "green";
                    $mycol = $tempstate == "failed" ? "red" : $mycol;
                    $outxt = $outxt.'<td style="padding:10px !important;">'."<button class=\"w3-tag w3-$mycol\" style=\"border:none;\">".$tempstate.'</button></td>'."\n";
                } else{
                    if($tempstate == "pending"){
                        $outxt = $outxt."<td>
                            <a class=\"w3-button w3-black w3-hover-green\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=pickup\"><i class=\"icon icon-check\"></i> pick delivery</a>
                        </td>";
                    } else if($tempstate == "accepted"){
                        $outxt = $outxt."<td>
                            <a class=\"w3-text-green\">Awaiting your pickup</a>
                            <a class=\"w3-button w3-black w3-hover-green\" href=\"utility/tracermap.php?deliveryid=$tempserial\"><i class=\"icon icon-map-marker\"></i> find location</a>
                        </td>";
                    } else if($tempstate == "in transit"){
                        $outxt = $outxt."<td>
                            <a class=\"w3-button w3-black w3-hover-green\" href=\"utility/monitordelivery.php?deliveryid=$tempserial\"><i class=\"icon icon-map-marker\"></i> track</a>
                        </td>";
                    } else if($tempstate == "failed"){
                        $outxt = $outxt."<td>
                            <a class=\"w3-text-red\">Delivery failed</a>
                        </td>";
                    } else if($tempstate == "verified"){
                        $outxt = $outxt."<td>
                            <a class=\"w3-text-green\">Delivery successful</a>
                        </td>";
                    } else {
                        $outxt = $outxt."<td>
                            <a>awaiting approval</a>
                        </td>";
                    }
                }
            }

            $outxt = $outxt.'</tr>';
        }

        $outxt = $outxt.'</table>';
?>
    <?php
        $curpage = "all deliveries";
        $myprefix="";

        $posclass = isset($_GET['filter']) ? "w3-blue" : "w3-black";
        $negclass = !isset($_GET['filter']) ? "w3-blue" : "w3-black";
        include("elements/navbar.php");
    ?>

    <header class="banner">
        <!-- <video src="media\vids\pexels_videos_2435376 (1080p).mp4" autoplay></video> -->
        <img src="media/images/banner_image.jpg" alt="banner image" class="anim-slidetop">
        <div class="banner-text">
            <b>All deliveries</b>
        </div>
    </header>

    <div class="w3-center w3-text-white">
        <h2>filters</h2>
        <a class="themebtn <?php echo $posclass;?>" href="all deliveries.php?filter=pending">pending deliveries</a>
        <a class="themebtn <?php echo $negclass;?>" href="all deliveries.php">all my deliveries</a>
    </div>

    <div class="tableholder">
        <?php echo $outxt;?>
    </div>

    <div class="tableholder w3-text-white w3-hide">
        <table class="w3-table">
            <tr class="table-header">
                <th>loadtype</th>
                <th>load description</th>
                <th>Distance</th>
                <th>Cost</th>
                <th>Driver</th>
                <th>state</th>
                <th>action</th>
            </tr>
            <tr>
                <td>Foodstuff</td>
                <td>it is something people eat</td>
                <td>200</td>
                <td>30000</td>
                <td>--</td>
                <td>pending</td>
                <td>
                    <a class="w3-button w3-black w3-hover-red" href="utility/editdelivery.php?deliveryid=22132dsdsfsdfewrr34&action=cancel"><i class="icon icon-close"></i> cancel delivery</a>
                </td>
            </tr>
            <tr>
                <td>Foodstuff</td>
                <td>it is something people eat</td>
                <td>200</td>
                <td>30000</td>
                <td>Darius minato</td>
                <td>selected</td>
                <td>
                    <a class="w3-button w3-black w3-hover-red" href="utility/editdelivery.php?deliveryid=22132dsdsfsdfewrr34&action=reject"><i class="icon icon-close"></i> reject driver</a><br>
                    <a class="w3-button w3-black w3-hover-green" href="utility/editdelivery.php?deliveryid=22132dsdsfsdfewrr34&action=accept"><i class="icon icon-check"></i> accept driver</a>
                </td>
            </tr>
            <tr>
                <td>Foodstuff</td>
                <td>it is something people eat</td>
                <td>200</td>
                <td>30000</td>
                <td>Darius minato</td>
                <td>driver chosen</td>
                <td>
                    <a class="w3-button w3-black w3-hover-green" href="utility/editdelivery.php?deliveryid=22132dsdsfsdfewrr34&action=collect"><i class="icon icon-shopping-cart"></i> load collected</a>
                </td>
            </tr>
            <tr>
                <td>Machinery</td>
                <td>Heavy electronic Machinery</td>
                <td>354</td>
                <td>53100</td>
                <td>Derrick Maul</td>
                <td>in transit</td>
                <td>
                    <a class="w3-button w3-black w3-hover-blue" href="utility/monitordelivery.php?deliveryid=22132dsdsfsdfewrr34&action=monitor"><i class="icon icon-map-marker"></i> monitor</a>
                </td>
            </tr>
            <tr>
                <td>Appliances</td>
                <td>TVs, radios and other stuff</td>
                <td>156</td>
                <td>23400</td>
                <td>Derrick Tulivan</td>
                <td>arrived</td>
                <td>
                    <a class="w3-button w3-black w3-hover-blue" href="utility/editdelivery.php?deliveryid=22132dsdsfsdfewrr34&action=verify"><i class="icon icon-check"></i> verify</a>
                </td>
            </tr>
            <tr>
                <td>Foodstuff</td>
                <td>it is something people eat</td>
                <td>200</td>
                <td>30000</td>
                <td>Darius minato</td>
                <td>complete</td>
                <td>
                <a class="w3-button w3-black w3-hover-blue" href="utility/monitordelivery.php?deliveryid=22132dsdsfsdfewrr34&action=monitor"><i class="icon icon-timer"></i> trace</a>
                </td>
            </tr>

            <tr>
                <td colspan="7" style="text-align:center;"><i>none found</i></td>
            </tr>
        </table>
    </div>

    <div id="end"></div>

    <?php include("elements/errorbubble.php");?>
</body>

</html>