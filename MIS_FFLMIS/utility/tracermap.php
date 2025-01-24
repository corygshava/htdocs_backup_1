<?php
    include("../actions/checksession.php");
    // echo $curusertype." ".$curuser;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/iconic.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/new_styles.css">
    <link rel="stylesheet" href="../css/new_styles2.css">
    <link rel="stylesheet" href="../css/common.css">

    <link rel="stylesheet" href="../js/leaflet/leaflet.css">

    <script src="../js/superscript.js"></script>
    <script src="../js/app.js"></script>
    <script src="../js/mapops.js"></script>
    <script src="../js/leaflet/leaflet.js"></script>

    <title>Find start point</title>

    <style>
        .holder span,.holder button{display:inline-block;margin: 0 0 15px 0;}
        .holder button{border-radius: 12px;}
    </style>
</head>

<?php
    $startpoint ="";
    $endpoint="" ;
    $thedistance= 0;

    if(isset($_GET['deliveryid'])){
        $theid = $_GET['deliveryid'];
        $thelocation = "51.505, -0.09";
        $myop = "SELECT deliveryserial,startCoords,endcoords,deliverydistance,state FROM deliveries WHERE deliveryserial='$theid' AND state = 'accepted'";
        // $showresult = true;
        $numrows = 3;

        include("../actions/getdata.php");

        if($result->num_rows == 0){
            header("location: ../all deliveries.php");
            exit();
        }

        while ($row = $result->fetch_row()) {
            $startpoint = $row[1];
            $endpoint = $row[2];
            $thedistance = $row[3];
        }
    } else {
        header("Refresh:0.2; url = ../dashboard.php?notify=supply the delivery serial number first&type=error");
        exit;
    }


?>

<body>
    <?php
        $curpage = "find delivery pickup";
        $myprefix="../";
        include("../elements/navbar.php");

        $dist = number_format($thedistance,3,".",",");
    ?>

    <header class="banner w3-hide" style="height: 200px;">
        <!-- <video src="media\vids\pexels_videos_2435376 (1080p).mp4" autoplay></video> -->
        <img src="../media/images/banner_image.jpg" alt="banner image" class="anim-slidetop">
        <div class="banner-text">
            <b>find delivery pickup</b>
        </div>
    </header>

    <!-- Your map container goes here -->
    <div class="tableholder">
        <div id="map" class="w3-grey" style="height: 500px;width:100%;"></div>
        <div class="controls">
            <div class="holder">
                <span>pickup coordinates</span>
                <br>
                <b id="lastLocation" class="w3-hide"><?php echo $startpoint;?></b>
                <br>
                <button class="w3-button w3-hover-orange w3-black" onclick="centerAt(`<?php echo $startpoint;?>`)"><i class="icon icon-map-marker"></i> trace</button>
            </div>
            <div class="holder">
                <span>Approximate distance</span>
                <br>
                <b id="lastLocation"><?php echo "{$dist} km <i>(approx)</i>";?></b>
            </div>
            <div class="holder">
                <span>Destination Coordinates</span>
                <br>
                <b id="lastLocation" class="w3-hide"><?php echo $endpoint;?></b>
                <br>
                <button class="w3-button w3-hover-orange w3-black" onclick="centerAt(`<?php echo $endpoint;?>`)"><i class="icon icon-map-marker"></i> trace</button>
            </div>
        </div>
    </div>

    <script src="../js/leaflet/leaflet.js"></script>
    <script>
        var startPoint = [<?php echo $startpoint;?>];
        var endPoint = [<?php echo $endpoint;?>];
        var distance = <?php echo $thedistance;?>;
        var map = null;

        var startMarker = undefined,endMarker = undefined;

        function generatemap(){
            map = L.map('map').setView([<?php echo $startpoint;?>], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20
            }).addTo(map);

            startMarker = L.marker([<?php echo $startpoint;?>]).addTo(map);
            endMarker = L.marker([<?php echo $endpoint;?>]).addTo(map);

            startMarker.bindPopup("Pickup Point").openPopup();;
            endMarker.bindPopup("Destination");
        }

        function centerMap() {
            map.setView([<?php echo $startpoint;?>], 15);
        }
        function centerAt(where){
            // where is a string stored like "23,45"
            let loc = where.split(",");
            map.setView([Number(loc[0]),Number(loc[1])], 13);
        }

        generatemap();

        function routeTryout(){
            // for routing
            var osrmEndpoint = 'https://router.project-osrm.org/route/v1/driving/';

            fetch(`${osrmEndpoint}${startPoint[0]},${startPoint[1]};${endPoint[0]},${endPoint[1]}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                // Process the routing data and extract the route geometry (roads)
                var route = data.routes[0].geometry.coordinates;

                // Create a Polyline on the map to represent the route
                var routePath = L.polyline(route, { color: 'blue' }).addTo(map);
            });
        }
    </script>

<?php include("../elements/errorbubble.php");?>
</body>
</html>
