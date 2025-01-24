<?php
require "../actions/functions.php";


// Check if both filename and linetowrite are provided via GET
if (isset($_GET['filename']) && isset($_GET['linetowrite'])) {
    $serial = ($_GET['filename']);
    $theline = ($_GET['linetowrite']);
    $thedate = date("y-m-d h:i:s");

    $myop = "UPDATE deliverylogs SET lastupdatedate = '$thedate',lastlocation='$theline' WHERE deliveryserial='$serial'";
    include("../actions/getdata.php");

    echo "lastdate: <b>$thedate</b>, lastlocation: <b>$theline</b>";
    echo "logged successfully";
} else {
    echo "Please provide both filename and linetowrite via the form.";
}
?>