<?php
    include("../actions/checksession.php");
    include("../actions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/new_styles.css">
    <link rel="stylesheet" type="text/css" href="../css/iconic.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/loader.css">
    <title>new delivery handler</title>
</head>
<body>


    <?php
        if(isset($_POST['deliverySerial'])){
            $deliverySerial = $_POST["deliverySerial"];
            $loadtype = $_POST["loadtype"];
            $loaddescription = $_POST["loaddescription"];
            $startCoords = $_POST["startCoords"];
            $endCoords = $_POST["endCoords"];
            $theDistance = $_POST["theDistance"];
            $deliverycost = $_POST["deliverycost"];

            $myop = "INSERT INTO deliveries (deliverySerial,loadtype, loaddescription, startCoords, endCoords, deliverydistance, deliverycost,driver,state,client)
                    VALUES ('$deliverySerial','$loadtype', '$loaddescription', '$startCoords', '$endCoords', '$theDistance', '$deliverycost','--','pending','$curuser')";

            $showinfo = false;
            $today = date("Y-m-d H:i:s");
            include("../actions/getdata.php");

            $myop = "INSERT INTO deliverylogs (deliverySerial,logs,lastupdatedate,datecreated,isdone)
                    VALUES ('$deliverySerial','0,0|','$today','$today','no')";
            include("../actions/getdata.php");

            // echo "working";
            $thepage = '../dashboard.php?notify=your delivery request has been added&thetype=good';
        } else {
            $thepage = '../new delivery.php?notify=your delivery request has been added&thetype=error';
            // echo "not working";
        }
    ?>
    <!-- this page just adds the delivery record to the databases' delivery table -->


    <div class="main-container">
		<div class="holder w3-text-white w3-center">
			<h4><i class="icon icon-refresh w3-spin"></i> <br>Processing form data</h4>
			<div class="Loading"><div class="bar"></div></div>
			<span class="matimer w3-text-orange w3-hide">secs</span>
            <p></p>
            <div class="log">
                <span>entering data</span><br>
                <span>running query</span></br>
            </div>
		</div>
	</div>
</body>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript">
	thelocation = "<?php echo $thepage?>";

	loader();
</script>

</html>