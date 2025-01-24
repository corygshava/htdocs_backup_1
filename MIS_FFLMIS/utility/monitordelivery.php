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
    <meta http-equiv="refresh" content="3000"/>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
        var curlocation = "";
        var currentcoords = "";
    </script>

	<title>monitor delivery</title>
</head>
<body>


    <?php
        // get info form database

        $theid = "";
        $thepage = "";
        $deliveryserial = "";
        $startCoords = "00,00";
        $endcoords = "00,00";

        if(isset($_GET["deliveryid"])){
            $theid = $_GET["deliveryid"];
        } else {
            header("refresh: 1.2s; url = ../dashboard.php");
        }

        $myop = "SELECT deliveryserial,startCoords,endcoords FROM deliveries WHERE deliveryserial='$theid'";
        // $showresult = true;
        $numrows = 3;

        include("../actions/getdata.php");

        $debugtxt = "id is $theid and it returned $numrows rows";

        if($numrows == 0){
            $thepage = "../dashboard.php";
        }

        while($row = $result->fetch_row()){
            $deliveryserial = $row[0];
            $startCoords = $row[1];
            $endcoords = $row[2];
        }
    ?>

<!-- global js variableas -->
<script>
    var journeystart = '<?php echo $startCoords;?>';
    var journeyend = '<?php echo $endcoords;?>';
</script>


    <?php
        $curpage = "monitor delivery";
        $myprefix="../";
        include("../elements/navbar.php");
    ?>

    <header class="banner" style="height: 200px;display: none;">
        <!-- <video src="media\vids\pexels_videos_2435376 (1080p).mp4" autoplay></video> -->
        <img src="../media/images/banner_image.jpg" alt="banner image" class="anim-slidetop">
        <div class="banner-text">
            <b>monitor delivery</b>
        </div>
    </header>

    <!-- <?php echo $debugtxt;?> -->

    <div class="mapholder w3-row">
        <div class="w3-col m8">
            <div id="mapguy" class="w3-grey" style="width: 100%;" data-heightovr="80%"></div>
        </div>

        <div class="w3-col m4 actionarea" data-heightovr="80%">
            <h2 class="w3-center">Actions</h2>

        <!-- in case user is a client -->

<?php if($curusertype == 'client'){?>
            <div class="controls">
                <div class="naver">
                    <button class="naverbtn active" onclick="navme('.holdernew',0,'.naverbtn')">ping data</button>
                    <button class="naverbtn" onclick="navme('.holdernew',1,'.naverbtn')">raw location data</button>
                    <button class="naverbtn" onclick="navme('.holdernew',2,'.naverbtn')">report job</button>
                </div>

                <div class="holdernew">
                    <h3>Ping data</h3>
                    <span class="sumtxt">..</span>
                    <br>
                    <b id="timertxt">10 seconds</b>
                    <div class="bar w3-black">
                        <div class="progress" id="theprogress" style="height: 20px;"></div>
                    </div>

                    <div class="w3-center">
                        <button class="w3-black w3-hover-blue newbtns" data-shown="1" id="generatebtn" onclick="toggleShow('#generatebtn');" style="padding:15px 13px;">generate map</button>
                    </div>
                </div>

                <div class="holdernew">
                    <h3>location data</h3>
                    <span>This is the raw data uploaded from the driver's device</span>
                    <br>
                    <div id="rawdata" data-shown="0" style="display: block">
                        <span>last ping time : </span>
                        <b id="lastUpdateDate">--</b>
                        <span>last ping location : </span>
                        <b id="lastLocation">--</b>
                    </div>
                </div>

                <div class="holdernew">
                    <h3>Delivery finalisation</h3>
                    <p>If you have noticed some irregularities you can cancel the job here (the driver will not recieve any payment after this)</p>
                    <b style="color: #ff0000 !important;">THIS ACTION CANNONT BE UNDONE, USE CAREFULLY!</b>
                    <br>
                    <a class="w3-black w3-hover-blue w3-btn themebtn" href="editdelivery.php?deliveryid=<?php echo $deliveryserial;?>&action=failed" style="display:inline-block;">mark journey as failed</a>
                </div>
            </div>
        </div>
    </div>

    <div class="logs w3-text-white">
        <h2 class="themetxt">Driver logs</h2>
        <div class="w3-bar-block" id="logger">
            <li class="w3-bar-item">item 1</li>
            <li class="w3-bar-item">item 2</li>
            <li class="w3-bar-item">item 3</li>
        </div>
        <hr>
        <p class="w3-center">--[end of log entries]--</p>
    </div>

        <div id="output"></div>

        <script>
            currentcoords = '-1,23';

            
            function fetchData() {
                if(canrun){
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'getdata.php?serial=<?php echo $deliveryserial;?>', true);

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                console.log(xhr.responseText);

                                handledata(xhr.responseText);
                            } else {
                                console.error('Error:', xhr.statusText);
                            }
                        }
                    };

                    xhr.send();

                    // setInterval(fetchData, 5000); // 5000 milliseconds = 5 seconds
                    canrun = false;
                }
            }

            function handledata(text){
                // the text is in the form lastlocation_#bounds#_lastupdatedate_#bounds#_logs
                let myres = text.split("_#bounds#_");
                let lastlocation = myres[0];
                let lastreporttime = myres[1];
                let logs = myres[2].split("|");

                document.querySelector("#lastLocation").innerText = lastlocation;
                document.querySelector("#lastUpdateDate").innerText = lastreporttime;
                
                let logger = document.querySelector("#logger");
                logger.innerHTML = '';

                for (let x = 0; x < logs.length; x++) {
                    const element = logs[x];
                    
                    logger.innerHTML += `<li class="w3-bar-item w3-hover-grey">${element}</li>`;
                }

                centerAt(`${lastlocation}`);
                elapsedtime = 0;
            }
        </script>

        <script>
            var myinterval = null;
            var lasttime = Date.now();
            var rounds = 0;
            var canrun = true;

            function handleDataReqs() {
                fetchData();

                myinterval = setInterval(() => {
                    fetchData();

                    // if(rounds > 15){
                    //     clearInterval(myinterval);
                    //     console.log(`${(Date.now() - lasttime) / 1000} seconds passed and ${rounds} rounds done`);
                    // }
                }, interval);
            }

            function datatimeout() {
                canrun = true;
                console.log(`${(Date.now() - lasttime) / 1000} seconds passed`);

                // let otherinterval = 
                setTimeout(() => {
                    datatimeout();
                }, interval);
            }
        </script>

<?php
    } else {
?>
        <!-- in case user is a driver -->

        
        <div class="controls">
            <div class="naver">
                <button class="naverbtn active" onclick="navme('.holdernew',0,'.naverbtn')">location data</button>
                <button class="naverbtn" onclick="navme('.holdernew',1,'.naverbtn')">update task log</button>
                <button class="naverbtn" onclick="navme('.holdernew',2,'.naverbtn')">finalise delivery</button>
            </div>

            <div class="holdernew">
                <h3>Location ping</h3>
                <span class="sumtxt">Your location will be pinged every</span>
                <br>
                <b id="timertxt">10 seconds</b>
                <div class="bar">
                    <div class="progress" id="theprogress" style="height: 20px;"></div>
                </div>
            </div>

            <div class="holdernew">
                <h3>Update delivery log</h3>
                <form action="updatedelivery.php">
                    <label for="message"><b>Add new log </b>(Inform Client Of delivery Issue or comment)</label><br>
                    <input type="text" name="message" placeholder="enter message here" required>
                    <input type="hidden" name="deliveryid" value="<?php echo $deliveryserial;?>">
                    <button type="submit" class="w3-black w3-hover-blue newbtns">send</button>
                </form>
            </div>

            <div class="holdernew">
                <h3>finalise delivery</h3>
                <div class="w3-center">
                    <p>Click the button below to confirm that the delivery has been finalised</p>
                    <button class="w3-black w3-hover-blue newbtns w3-hide">report incident</button>
                    <a class="w3-black w3-hover-blue w3-btn themebtn" href="editdelivery.php?deliveryid=<?php echo $deliveryserial;?>&action=finish" style="display:inline-block;">mark journey as done</a>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Function to send data via AJAX
        var latitude = 0;
        var longitude = 0;

        function locationHandler(){
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    latitude = position.coords.latitude;
                    longitude = position.coords.longitude;
                    var currentLocation = `${latitude}, ${longitude}`;
                    console.log("Current Location:", currentLocation);
                    // return currentLocation;
                }, function(error) {
                    console.log("Error getting geolocation:", error);
                    // return "0,0";
                });
            } else {
                console.log("Geolocation is not available in this browser.");
                // return "0,0";
            }
        }

        function sendDataFinal() {
            if(canrun){
                var filename = '<?php echo $deliveryserial;?>';

                locationHandler();
                var linetowrite = `${latitude}, ${longitude}`;

                console.log(`the payload: ${linetowrite}`)

                var xhr = new XMLHttpRequest();
                xhr.open('GET', `loglocation.php?filename=${filename}&linetowrite=${linetowrite}`, true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText); // Log the response from the server
                        } else {
                            console.error('Error:', xhr.statusText);
                        }
                    }
                };

                var params = 'filename=' + encodeURIComponent(filename) + '&linetowrite=' + encodeURIComponent(linetowrite);
                xhr.send(params);

                canrun = false;
                alerter("good","location updated",2.5);
                rounds += 1;
                elapsedtime = 0;
            }
        }

        currentcoords = getCurrentLocation();
    </script>
<?php
    sleep(5);
?>
    <script>
        var myinterval = null;
        var lasttime = Date.now();
        var rounds = 0;
        var canrun = true;

        function handleDataReqs() {
            sendDataFinal();

            myinterval = setInterval(() => {
                handleDataReqs();

                // if(rounds > 15){
                //     clearInterval(myinterval);
                //     console.log(`${(Date.now() - lasttime) / 1000} seconds passed and ${rounds} rounds done`);
                // }
            }, interval);
        }

        function datatimeout() {
            canrun = true;
            console.log(`${(Date.now() - lasttime) / 1000} seconds passed`);

            // let otherinterval = 
            setTimeout(() => {
                datatimeout();
            }, interval);
        }
    </script>
</div>
<?php
    }
?>


<?php
    if($thepage != ""){
?>
        <script>
            location.assign("../dashboard.php");
        </script>

<?php
    }
?>


<!-- common functions -->

<script>
    var mymap = undefined;
    var interval = <?php if($curusertype == "client"){echo 10000;}else{echo 20000;}?>;
    var elapsedtime = 0;
    var marker = undefined;
    var utype = "<?php echo $curusertype;?>";

    window.onload = () => {handleDataReqs();datatimeout();loaderbar();};

    function createmap(){
        // Initialize the map
        mymap = L.map('mapguy').setView([0, 0], 20); // Initial center and zoom level

        // Add a tile layer (e.g., OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(mymap);

        // Get user's geolocation and update the map center
        if ('geolocation' in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                // Set the map center to the user's location
                mymap.setView([lat, lon], 13);
                
                // Add a marker at the user's location (optional)
                marker = L.marker([lat, lon]).addTo(mymap);
                <?php
                    if($curusertype == "client"){
                        echo "marker.bindPopup(\"Driver is here!\").openPopup();";
                    } else {
                        echo "marker.bindPopup(\"You are here!\").openPopup();";
                    }
                ?>

                curlocation = `${lat},${lon}`;
            }, function (error) {
                console.error('Error getting geolocation:', error);
            });
        } else {
            console.error('Geolocation is not available in this browser.');
        }
    }

    function updateMarker() {
        var coordinatesInput = currentcoords;
        var coordinates = parseCoordinates(coordinatesInput);

        if (coordinates) {
            var lat = parseFloat(coordinates[0]);
            var lon = parseFloat(coordinates[1]);

            if (!marker) {
                marker = L.marker([lat, lon]).addTo(mymap);
                marker.bindTooltip('Driver Location').openTooltip();
            } else {
                marker.setLatLng([lat, lon]);
            }

            mymap.setView([lat, lon], 13);
        } else {
            alert('Invalid coordinates. Please enter in the format (latitude, longitude).');
        }
    }

    function parseCoordinates(input) {
        var matches = input.match(/\(([^,]+),([^)]+)\)/);
        if (matches && matches.length === 3) {
            return [matches[1], matches[2]];
        }
        return null;
    }

    function centerAt(where){
        // where is a string stored like "23,45"
        let loc = where.split(",");
        mymap.setView([Number(loc[0]),Number(loc[1])], 15);

        if (!marker) {
            marker = L.marker([Number(loc[0]), Number(loc[1])]).addTo(mymap);
            marker.bindTooltip('Driver Location').openTooltip();
        } else {
            marker.setLatLng([Number(loc[0]), Number(loc[1])]);
        }
    }

    function loaderbar(){
        elapsedtime += 100;
        let thebar = document.querySelector("#theprogress");
        let timetxt = document.querySelector("#timertxt");
        let sumtxt = document.querySelector(".sumtxt");

        thebar.style.transition = "none";
        document.querySelector("#timertxt").innerText = `${interval / 1000} seconds`;
        thebar.style.width = `${((elapsedtime / interval) * 100) * 1.15}%`;


        if(utype != "client"){
            timetxt.innerHTML = `next ping in <b>${Math.floor((interval - elapsedtime) / 1000) - 1}s</b>`;
            sumtxt.innerHTML = `your location will be uploaded every <b>${Math.floor(interval / 1000)}seconds</b> (even if you change to a different section)`;
        } else {
            timetxt.innerHTML = `location updating in <b>${Math.floor((interval - elapsedtime) / 1000) - 1}s</b>`;
            sumtxt.innerHTML = `Driver's location will be read every <b>${Math.floor(interval / 1000)}seconds</b> (even if you change to a different section)`;
        }

        // if(elapsedtime >= interval){elapsedtime = 0;}
    }

    setupdivs();
    createmap();

    navme('.holdernew',0);

    let pinginterval = setInterval(() => {
            loaderbar();
        }, 100);
</script>

<?php include("../elements/errorbubble.php")?>
</body>
</html>