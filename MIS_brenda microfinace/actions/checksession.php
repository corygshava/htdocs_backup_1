<?php
    $curuser = "";
    $curusertype = "";
    $redirection = "index.php";

    if(isset($redirectto)){$redirection = $redirectto;}

    if(!(isset($_COOKIE["curusername"]))){
        if(!isset($dontredirect)){
            echo '<script>alert("start a session first");</script>';
            header("Refresh:1.2; url = index.php");
        }
    } else {
        $curuser = $_COOKIE["curusername"];
        $curusertype = $_COOKIE["curusertype"];
        $redirection = "index.php";
    }
?>