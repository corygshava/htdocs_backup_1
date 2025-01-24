<?php

    if(isset($_GET['adminuser']) && isset($_GET['useractivity'])){
        $adminname = $_GET['adminuser'];
        $timecode = date("d-m-y h:i:s");
        $theact = $_GET['useractivity'];

        $myop = "INSERT INTO adminactivities (timestamp,username,activitydetail) VALUES ('$timecode','$adminname','$theact')";
        include("../actions/getdata.php");

        echo "[$timecode] activity for $adminname recorded successfully ($theact)";
    } else {
        echo "invalid parameters";
        exit;
    }

?>