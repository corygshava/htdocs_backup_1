<?php
    include("actions/checksession.php");
    // echo $curusertype." ".$curuser;
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

	<title>user dashboard</title>

    <style>
        .notifier{cursor:pointer;}
    </style>
</head>
<body>
    <?php
        $curpage = "$curusertype Dashboard";
        $myprefix="";
        // include("elements/navbar.php");
    ?>

	<!-- <img src="media/images/pexels-albin-berlin-906982.jpg" alt="" class="custombg"> -->

    <!-- if the user has logged in as a client -->

    <?php
        if($curusertype == "client"){
            $availabledeliveries = 0;
            $waitingdeliveries = 0;

            $myop = "SELECT * FROM deliveries WHERE state = 'pending' AND client='$curuser'";
            include("actions/getdata.php");
            $availabledeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'selected' AND client='$curuser'";
            include("actions/getdata.php");
            $waitingdeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'accepted' AND client='$curuser'";
            include("actions/getdata.php");
            $accepteddeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'in transit' AND client='$curuser'";
            include("actions/getdata.php");
            $deliveriesinprogress = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'failed' AND client='$curuser'";
            include("actions/getdata.php");
            $faileddeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'complete' AND client='$curuser'";
            include("actions/getdata.php");
            $unverifieddeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'verified' AND client='$curuser'";
            include("actions/getdata.php");
            $completedeliveries = $result->num_rows;

            

            ?>
	<div class="w3-half side left sideholder anim-slideright">
        <header class="w3-text-white">
            <h3 class="w3-animate-opacity userhandle" data-value="welcome <b class='themetxt'><?php echo $curuser;?></b>">----------------------------------</h3>
            <span class="title themetxt" data-value="Cleint Dashboard">---------------------------------------</span>
            <b class="mytag themebg w3-hide">client</b>
            <hr class="themetxt">
        </header>

        <div class="w3-hide">
            <div>balance<br>50000</div>
            <div>reserved<br>2000</div>
            <div>
                <button class="themebtn">manage</button>
            </div>
        </div>

        <!-- in case there was an error logging in -->
        <div class="dash-buttons" id="clientuser">
            <a class="menubtn client" href="new delivery.php"><i class="icon icon-shop"></i> New Delivery</a>
            <a class="menubtn client" href="my deliveries.php"><i class="icon icon-shopping-cart"></i> My Deliveries</a>
            <a class="menubtn client" href="logout.php"><i class="icon icon-user"></i> logout</a>
        </div>
    </div>

    <div class="w3-half side right anim-slideleft" style="text-align: right;">
        <div class="w3-align-right w3-text-white side-heading">
            <h1><b class="themetxt">Your</b> information</h1>
        </div>

        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $availabledeliveries;?></span> <span>pending deliveries</span>
        </div>

        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $waitingdeliveries;?></span> <span>delivery requests available</span>
        </div>

        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $accepteddeliveries;?></span> <span>Deliveries awaiting pickup</span>
        </div>

        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $deliveriesinprogress;?></span> <span>Deliveries in progress</span>
        </div>
        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $faileddeliveries;?></span> <span> failed deliveries</span>
        </div>

        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $unverifieddeliveries;?></span><span> Deliveries unverified</span>
        </div>

        <div class="notifier client" onclick="checkdeliveries()">
            <span class="bigtxt themetxt"><?php echo $completedeliveries;?></span> <span>Deliveries complete</span>
        </div>
    </div>

    <?php
    
        } else if($curusertype == "Driver"){

            $mydeliveries = 0;
            $availabledeliveries = 0;
            $x = 0;
            $myserial = "";
            $extradata = "<br><b class=\"w3-text-orange\">My deliveries  </b>";

            $myop = "SELECT * FROM deliveries WHERE driver = '$curuser' AND state='selected'";
            include("actions/getdata.php");
            $mydeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE driver = '$curuser' AND state='accepted'";
            include("actions/getdata.php");
            $topickup = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE driver = '$curuser' AND state='verified'";
            include("actions/getdata.php");
            $gooddeliveries = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE driver = '$curuser' AND state = 'in transit'";
            include("actions/getdata.php");
            $ongoing = $result->num_rows;

            $myop = "SELECT * FROM deliveries WHERE state = 'pending'";
            include("actions/getdata.php");
            $availabledeliveries = $result->num_rows;

            if($ongoing > 0){
                $myop = "SELECT deliveryserial FROM deliveries where driver='$curuser' AND state = 'in transit'";
                include("actions/getdata.php");

                $temprows = $result->num_rows;
                $extradata = $extradata."<b class=\"w3-tag\">$temprows</b><br>";

                while ($row = $result -> fetch_row()) {
                    $x += 1;
                    $serial = $row[0];
                    $extradata = $extradata."<a class=\"menubtn driver\" href=\"utility\monitordelivery.php?deliveryid=$serial\"><i class=\"icon icon-map-marker\"></i> Delivery $x</a>";
                }
            }
    ?>
    <!-- if the user has logged in as a driver -->

    <div class="w3-half side left sideholder anim-slideright">
        <header class="w3-text-white">
            <h3 class="w3-animate-opacity">welcome <b><?php echo $curuser;?></b></h3>
            <span class="title w3-text-orange" data-value="Driver Dashboard">---------------------------------------</span>
            <b class="mytag w3-orange w3-hide">client</b>
            <hr class="w3-border-orange">
        </header>

        <!-- in case there was an error logging in -->
        <div class="dash-buttons" id="clientuser">
            <?php
                if($ongoing > 0){
                    echo $extradata;
                } else {
                    echo "<a class=\"menubtn driver\" href=\"all deliveries.php\"><i class=\"icon icon-shopping-cart\"></i> view Deliveries</a>";
                }
            ?>
            <a class="menubtn driver" href="logout.php"><i class="icon icon-user"></i> logout</a>
        </div>
    </div>

    <div class="w3-half side right anim-slideleft" style="text-align: right;">
        <div class="w3-align-right w3-text-white side-heading">
            <h1><b class="w3-text-orange">Your</b> information</h1>
        </div>

        <div class="notifier driver" onclick="checkdeliveries()">
            <span class="bigtxt w3-text-orange"><?php echo $availabledeliveries;?></span><span> deliveries available</span>
        </div>

        <div class="notifier driver" onclick="checkdeliveries()">
            <span class="bigtxt w3-text-orange"><?php echo $mydeliveries;?></span><span> awaiting approval</span>
        </div>

        <div class="notifier driver" onclick="checkdeliveries()">
            <span class="bigtxt w3-text-orange"><?php echo $topickup;?></span><span> awaiting your pickup</span>
        </div>

        <div class="notifier driver" onclick="checkdeliveries()">
            <span class="bigtxt w3-text-orange"><?php echo $ongoing;?></span><span> ongoing deliveries</span>
        </div>

        <div class="notifier driver" onclick="checkdeliveries()">
            <span class="bigtxt w3-text-orange"><?php echo $gooddeliveries;?></span><span> successful deliveries</span>
        </div>
    </div>

    <?php
        } else {
            ?>
        <div class="w3-half side left sideholder anim-slideright">
            <header class="w3-text-white">
                <h3 class="w3-animate-opacity userhandle" data-value="welcome <b><?php echo $curuser;?></b>">----------------------------------</h3>
                <span class="title w3-text-blue" data-value="<b>Admin</b> Dashboard">---------------------------------------</span>
                <b class="mytag w3-blue w3-hide">client</b>
                <hr class="w3-border-blue">
            </header>

            <!-- in case there was an error logging in -->
            <div class="dash-buttons" id="clientuser">
                <a class="menubtn admin" href="utility/viewtable.php?thetable=users"><i class="icon icon-user"></i> All users</a>
                <a class="menubtn admin" href="utility/viewtable.php?thetable=deliveries"><i class="icon icon-shopping-cart"></i> All delivery records</a>
                <a class="menubtn admin" href="utility/viewtable.php?thetable=deliverylogs"><i class="icon icon-truck"></i> All delivery logs</a>
                <a class="menubtn admin" href="logout.php"><i class="icon icon-user"></i> logout</a>
            </div>
        </div>

        <div class="w3-half side right anim-slideleft w3-hide" style="text-align: right;">
            <div class="w3-align-right w3-text-white side-heading">
                <h1><b class="w3-text-blue">SYSTEM</b> information</h1>
            </div>
        </div>
    <?php 
        }
    ?>
</body>

<script src="js/app.js"></script>
<script src="js/utility.js"></script>

<script type="text/javascript">
	function showusername() {
        let thename = sessionStorage.getItem("currentUser") == null ? "no user available" : sessionStorage.getItem("currentUser");
        let items = document.querySelectorAll('.theusername');

        for (var x = 0;x < items.length;x++) {
        	items[x].innerText = thename;
        }
    }

	function switchtabs(n){
		var tabs = document.querySelector('.sidebar').querySelectorAll('li');
		for (let x = 0; x < tabs.length; x++) {
			const element = tabs[x];
			element.classList.remove('active');
		}
		
		tabs[n].classList.add('active');
	}

    function checkdeliveries(){
        <?php
                if($curusertype == "client"){
        ?>
            window.location.assign("my deliveries.php#end");
        <?php
                } else {
        ?>
            window.location.assign("all deliveries.php#end");
        <?php
                }
        ?>
    }
    showusername();

    setbackgroundImage("");
	textfun(".title", 2);
    textfun(".userhandle", 20);
</script>

<?php include("elements/errorbubble.php");?>
</html>