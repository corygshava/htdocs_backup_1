<?php
    $curuser = "";
    $curusertype = "";
    $redirection = "index.php";

    if(isset($redirectto)){$redirection = $redirectto;}

    if(!(isset($_COOKIE["curusername"]))){
        if(!isset($dontredirect)){
            echo '<script>alert("no current session detected");</script>';
            header("Refresh:1.2; url = login.php");
        }
    } else {
        $curuser = $_COOKIE["curusername"];
        $redirection = "index.php";
    }
?>