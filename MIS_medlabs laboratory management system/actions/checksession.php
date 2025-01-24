<?php
$curuser = "";
$curusertype = "";

    if(!(isset($_COOKIE["siteusername"]))){
        header("Refresh:1.2; url = ../login.html");
    } else {
        $curuser = $_COOKIE["siteusername"];
        $curusertype = $_COOKIE["siteusertype"];
    }
?>