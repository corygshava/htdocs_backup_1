<?php
    include("../actions/checksession.php");
    // echo $curusertype." ".$curuser;
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
    <title>login handler</title>
</head>
<body>


<?php
    $todo = "No";
    $thepage = "../my deliveries.php";

    if(isset($_GET['deliveryid'])){
        $theid = $_GET['deliveryid'];
        $todo = $_GET['action'];
        echo "performing: ".$todo;

        if($todo == "cancel"){
            $myop = "DELETE FROM deliveries WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        } else if($todo == "pickup"){
            $myop = "UPDATE deliveries SET state = 'selected',driver = '$curuser' WHERE deliveryserial='$theid'";
            $thepage = "../all deliveries.php";
            include("../actions/getdata.php");
        } else if($todo == 'reject'){
            $myop = "UPDATE deliveries SET state = 'pending',driver = '--' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        } else if($todo == 'accept'){
            $myop = "UPDATE deliveries SET state = 'accepted' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        } else if($todo == 'begin'){
            $myop = "UPDATE deliveries SET state = 'in transit' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        } else if($todo == 'finish'){
            $myop = "UPDATE deliveries SET state = 'complete' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
            $myop = "UPDATE deliverylogs SET isdone = 'yes' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
            $thepage = "updatedelivery.php?stilltrack=no&message=the delivery is complete&deliveryid=$theid";
        } else if($todo == 'verify'){
            $myop = "UPDATE deliveries SET state = 'verified' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
            $myop = "UPDATE deliverylogs SET state = 'successful' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        } else if($todo == 'fail'){
            $myop = "UPDATE deliveries SET state = 'failed' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
            $myop = "UPDATE deliverylogs SET state = 'failed' WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        } else if($todo == 'delete'){
            $myop = "DELETE FROM deliveries WHERE deliveryserial='$theid'";
            include("../actions/getdata.php");
        }else {
            echo "invalid request";
        }
    }
?>

    <!-- this is basically a form for updating the values in a delivery record -->


    <div class="main-container">
		<div class="holder w3-text-white w3-center">
			<h4><i class="icon icon-refresh w3-spin"></i> <br>Processing <?php echo $todo?> request</h4>
			<div class="Loading"><div class="bar"></div></div>
			<span class="matimer w3-text-orange w3-hide">secs</span>
            <p></p>
            <div class="log">
                <span>processing data</span><br>
                <span>running query</span></br>
            </div>
		</div>
	</div>
</body>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript">
	thelocation = "<?php echo $thepage;?>";

	loader();
</script>

</html>