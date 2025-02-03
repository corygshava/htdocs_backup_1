<?php
	// check the file sitedata.bxz
    // see if its text is the key content
    // exit if its not

    $thepass = file_get_contents("sitedata.bxz");
    $expiry = "2024-03-28 12:00:24";
    $currentDate = date("Y-m-d h:i:s");
    $thehash = md5($thepass);
    $wantedhash = "59bb755ac8b2a95d2fdd02efae5559c4";

    if(strtotime($currentDate) > strtotime($expiry)){
        if($thehash != $wantedhash){
            echo $thepass;
            exit();
        }
    }
?>