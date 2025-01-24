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

	<title>new delivery</title>
</head>
<body>

    <?php
        $curpage = "New delivery";
        $myprefix="";
        include("elements/navbar.php");?>

    <header class="banner w3-hide">
        <!-- <video src="media\vids\pexels_videos_2435376 (1080p).mp4" autoplay></video> -->
        <img src="media/images/banner_image.jpg" alt="banner image" class="anim-slidetop">
        <div class="banner-text">
            <b>new delivery</b>
        </div>
    </header>

    <div class="inputmain w3-text-white">
        <form action="utility/newdeliveryhandler.php" method="post">
            <div class="input-holder w3-hide">
                <label for="deliverySerial">loadtype</label><br>
                <input type="hidden" name="deliverySerial" required/>
            </div>
            <div class="input-holder">
                <label for="loadtype">type of load</label><br>
                <input type="text" name="loadtype" placeholder="what kind of load are you transporting?" required/>
            </div>
            <div class="input-holder">
                <label for="loaddescription">Load Description</label><br>
                <!-- <input type="text" name="loaddescription" placeholder="enter a brief description of what the load is"/> -->
                <textarea name="loaddescription" cols="30" rows="5" placeholder="enter a brief description of what the load is" required></textarea>
            </div>
            <div class="input-holder">
                <label for="startCoords">start Coordinates</label><br>
                <input type="text" id="startCoords" disabled="true" class="shorter" placeholder="latitude,longitude">
                <input type="hidden" name="startCoords" placeholder="enter startCoords here" class="shorter" required/>
                <b class="mybtn w3-hover-blue w3-black" onclick="generateCoords('startCoords')">Generate</b>
            </div>
            <div class="input-holder">
                <label for="endCoords">end Coordinates</label><br>
                <input type="text" id="endCoords" disabled="true" class="shorter" placeholder="latitude,longitude">
                <input type="hidden" name="endCoords" placeholder="enter endCoords here" class="shorter" required/>
                <b class="mybtn w3-hover-blue w3-black" onclick="generateCoords('endCoords')">Generate</b>
            </div>

            <div class="input-holder">
            <label for="endCoords">Cost (<b>ksh 150</b> per kilometer)</label><br>
                <input type="hidden" name="theDistance">
                <input type="text" id="theCost" disabled="true" placeholder="based on the distance (150 per kilometer)">
                <input type="hidden" name="deliverycost">
            </div>

            <div class="input-holder">
                <b class="themebtn w3-btn w3-black w3-hover-blue" onclick="verifyInput()">verify input</b>
                <button class="themebtn w3-btn w3-black w3-hover-blue" style="display:none">add new delivery</button>
            </div>
        </form>
    </div>

    <div class="w3-modal" id="mapmodal" data-shown="0" style="z-index: 501;">
        <div class="w3-modal-content w3-transparent">
            <div class="holder w3-center">
                <h2>Choose map coordinate</h2>

                <div class="w3-grey" id="themap" style="overflow:hidden;height: 350px;"></div>

                <div class="w3-container w3-center">
                    <p>approximate distance : <b id="distanceTxt">--</b></p>
                </div>

                <button class="themebtn w3-btn w3-black w3-hover-blue" onclick="trackuser()"><i class="icon icon-map-marker"></i> my location</button>
                <button class="themebtn w3-btn w3-black w3-hover-blue" onclick="toggleShow('#mapmodal')"><i class="icon icon-check"></i> pick coordinate</button>
            </div>
        </div>
    </div>

    <div class="alerter">
        
    </div>

    <script src="js/superscript.js"></script>
    <script src="js/app.js"></script>
    <script src="js/mapops.js"></script>
    <script src="js/utility.js"></script>
    <script src="js/leaflet/leaflet.js"></script>
    <script>
        var myform = document.forms[0];
        var curmapinput,dummy;

        var priceperkm = 150;

        function verifyInput() {
            let nptloadtype = document.forms[0].loadtype.value;
            let nptloaddescription = document.forms[0].loaddescription.value;
            let nptstartCoords = document.forms[0]['startCoords'][1].value;
            let nptendCoords = document.forms[0]['endCoords'][1].value;

            if(nptloadtype == ""){
                // alert(nptloadtype);
                alerter("warning","enter a valid load type name",3000);
                return;
            } else if(nptloaddescription == ""){
                // alert(nptloaddescription);
                alerter("warning","a load description is required",3000);
                return;
            } else if(nptstartCoords == ""){
                // alert(nptstartCoords);
                alerter("warning","generate start location",3000);
                return;
            } else if(nptendCoords == ""){
                // alert(nptendCoords);
                alerter("warning","generate destination location",3000);
                return;
            } else {
                document.forms[0].submit();
                return;
            }

            alert("trial");
        }

        function generateCoords(input){
            let mynpt = myform[input][1];
            curmapinput = mynpt;
            dummy = myform[input][0];

            requesttype = (input == "startCoords") ? 0 : 1;

            if(dummy == null){
                alert(`setup failed : #${input} is null`);
                return;
            }
            toggleShow('#mapmodal');

            initializeMapForInput();
        }

        function showdistance(){
            let distanceTxt = myform['theDistance'];

            let pricenpt = myform['theCost'];
            let otherpricenpt = myform['deliverycost'];
            let distanceShow = document.querySelector("#distanceTxt");

            console.log("clicked")

            if (markers[0] == undefined){
                distanceShow.innerText = `choose the pickup location`;
            } if (markers[1] == undefined) {
                distanceShow.innerText = `pick a destination`;
            } else {
                distanceTxt.value = pointsdistance;
                pricenpt.value = `Ksh ${(Math.floor(pointsdistance * priceperkm)).toLocaleString('en-us')}`;
                otherpricenpt.value = Math.floor(pointsdistance * priceperkm);
                distanceShow.innerText = `${Math.round(pointsdistance)}km`;
            }
        }

        function generateDeliverySerial(){
            let thenpt = myform.deliverySerial;
            thenpt.value = generateRandomWord(16);
        }

        getCurrentLocation();
        generateDeliverySerial();
    </script>

<?php include("elements/errorbubble.php");?>
</body>
</html>