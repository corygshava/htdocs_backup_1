<?php
$thepage = "monitordelivery.php?notify=Journey log updated successfuly&type=good";
$todo = "Message";

if(isset($_GET['message']) && isset($_GET['deliveryid'])){
    $serial = $_GET['deliveryid'];
    $prevlogs = "";
    $newlogs = $_GET['message'];
    $timecode = date("d-m-y h:i:s");
    $thepage = $thepage."&deliveryid=$serial";

    if(isset($_GET['stilltrack'])){$thepage = "../all deliveries.php";}

    $myop = "SELECT logs FROM deliverylogs WHERE deliveryserial='$serial'";
    include("../actions/getdata.php");

    if($result -> num_rows > 0){
        while($row = $result->fetch_row()){$prevlogs = $row[0]."";}
    }

    $newlogs = $prevlogs."[$timecode] $newlogs|";
    $myop = "UPDATE deliverylogs SET logs = '$newlogs' WHERE deliveryserial='$serial'";
    include("../actions/getdata.php");
} else {
    $extra = "";
    if(!isset($_GET['deliveryid'])){
        $extra = "A delivery ID is required";
    } else{
        $extra = "A message is required";
    }
    // header("Refresh:1.2; url = monitordelivery.php?notify=provide the necessary data to use this feature&type=error");
    $thepage = "../dashboard.php?notify=$extra&type=error";
}
?>

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
    <title>Sending Delivery message</title>
</head>
<body>
    <div class="main-container">
        <div class="holder w3-text-white w3-center">
            <h4><i class="icon icon-refresh w3-spin"></i> <br>Processing <?php echo $todo?> request</h4>
            <div class="Loading"><div class="bar"></div></div>
            <span class="matimer w3-text-orange w3-hide">secs</span>
            <p></p>
            <div class="log">
                <span>processing data</span><br>
                <span>running query</span></br>
                <!-- <span><?php echo $newlogs;?></span> -->
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