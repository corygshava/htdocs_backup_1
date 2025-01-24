<!-- can only be viewed by driver and client -->

<?php
    $recommendeduser='client';
    $curpage = "my deliveries";
    $redirectto = "dashboard.php?notify=you dont have permission to view that";
    include("actions/checksession.php");
?>

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

	<title>my deliveries</title>
</head>
<body>

    <!-- this tables shows all deliveries that are pending or accepted and the driver is the current user -->

    <?php
        $myop = "";

        if($curusertype == 'client'){
            $myop = "SELECT deliveryserial,loadtype,loaddescription,deliverydistance,deliverycost,driver,state FROM deliveries WHERE client = '$curuser'";
        } else {
            $myop = "SELECT deliveryserial,loadtype,loaddescription,deliverydistance,deliverycost,driver,state FROM deliveries WHERE driver = '$curuser'";
        }

        include("actions/getdata.php");

        $outxt = '<table class="w3-table w3-border-blue w3-border">';

        // show headings
        $outxt = $outxt.'
            <tr class="table-header">
                <th>loadtype</th>
                <th>load description</th>
                <th>Distance (km)</th>
                <th>Cost (ksh)</th>
                <th>Driver</th>
                <th>state</th>
                <th>action</th>
            </tr>
        ';

        if($result->num_rows != 0){
            while ($row = $result->fetch_row()) {
                $extratxt = $row[6] == "pending" ? 'onclick="servePatient(this)" style="cursor:alias;"' : '';
                $outxt = $outxt."<tr class=\"w3-light-grey w3-hover-white w3-border\" $extratxt>";

                for ($n=1; $n < 8; $n++) {
                    $tempserial = $row[0];
                    $tempstate = $row[6];

                    if($n == 3){
                        $outxt = $outxt.'<td style="padding:10px !important;">'.number_format($row[$n],2,".",",").' km</td>'."\n";
                    } else if($n == 4){
                        $outxt = $outxt.'<td style="padding:10px !important;">'.number_format($row[$n],0,".",",").'</td>'."\n";
                    } else if($n < 6){
                        $outxt = $outxt.'<td style="padding:10px !important;">'.$row[$n].'</td>'."\n";
                    } else if($n == 6){
                        $mycol = $tempstate == "pending" ? "orange" : "green";
                        $mycol = $tempstate == "failed" ? "red" : $mycol;
                        $outxt = $outxt.'<td style="padding:10px !important;">'."<button class=\"w3-tag w3-$mycol\" style=\"border:none;\">".$tempstate.'</button></td>'."\n";
                    } else {
                        if($tempstate == "pending"){
                            $outxt = $outxt."<td>
                                <a class=\"w3-button w3-black w3-hover-red\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=cancel\"><i class=\"icon icon-close\"></i> cancel</a>
                            </td>";
                        } else if($tempstate == "selected"){
                            $outxt = $outxt."<td>
                                <a class=\"w3-button w3-black w3-hover-red\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=reject\"><i class=\"icon icon-close\"></i> reject driver</a><br>
                                <a class=\"w3-button w3-black w3-hover-green\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=accept\"><i class=\"icon icon-check\"></i> accept driver</a>
                            </td>";
                        } else if($tempstate == "accepted"){
                            $outxt = $outxt."<td>
                                <a class=\"w3-button w3-black w3-hover-blue\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=begin\"><i class=\"icon icon-shopping-cart\"></i> has been picked up</a><br>
                            </td>";
                        } else if($tempstate == "in transit"){
                            $outxt = $outxt."<td>
                                <a class=\"w3-button w3-black w3-hover-blue\" href=\"utility/monitordelivery.php?deliveryid=$tempserial\"><i class=\"icon icon-map-marker\"></i> monitor</a><br>
                            </td>";
                        } else if($tempstate == "complete"){
                            $outxt = $outxt."<td>
                                <a class=\"w3-button w3-black w3-hover-green\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=verify\"><i class=\"icon icon-check\"></i> confirm arrival</a><br>
                                <a class=\"w3-button w3-black w3-hover-red\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=fail\"><i class=\"icon icon-warning\"></i> Error occured</a><br>
                            </td>";
                        }  else if($tempstate == "verified"){
                            $outxt = $outxt."<td class=\"w3-text-green\">
                                <!--<a class=\"w3-button w3-black w3-hover-red\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=verify\"><i class=\"icon icon-check\"></i> verify</a><br>-->
                                <i>delivery was completed successfully</i>
                            </td>";
                        }  else if($tempstate == "failed"){
                            $outxt = $outxt."<td class=\"w3-text-red\">
                                <!--<a class=\"w3-button w3-black w3-hover-red\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=verify\"><i class=\"icon icon-check\"></i> verify</a><br>-->
                                <i><b>delivery failed</b></i><br>
                                <a class=\"w3-button w3-black w3-hover-blue\" href=\"utility/editdelivery.php?deliveryid=$tempserial&action=delete\"><i class=\"icon icon-delete\"></i> delete record</a><br>
                            </td>";
                        }
                    }
                }

                $outxt = $outxt.'</tr>';
            }
        } else {
            $outxt = $outxt.'<tr><td colspan="7" class="w3-center">no data was found</td></tr>';
        }

        $outxt = $outxt.'</table>';
    ?>

    <?php
        include("elements/navbar.php");
    ?>

    <header class="banner">
        <!-- <video src="media\vids\pexels_videos_2435376 (1080p).mp4" autoplay></video> -->
        <img src="media/images/banner_image.jpg" alt="banner image" class="anim-slidetop">
        <div class="banner-text">
            <b>my deliveries</b>
        </div>
    </header>

    <div class="tableholder w3-text-white">
        <?php echo $outxt;?>
    </div>

    <div class="w3-panel w3-center">
        <a href="new delivery.php" class="w3-button w3-black w3-hover-blue" style="border-radius:12px;">add new</a>
    </div>

    <div id="end"></div>
</body>
</html>