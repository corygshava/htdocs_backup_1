<?php
    $curuser = "";
    $curusertype = "";
    $redirection = "login.php";

    if(isset($redirectto)){$redirection = $redirectto;}

    if(!(isset($_COOKIE["curusername"]))){
        if(!isset($dontredirect)){
            echo '<script>alert("no current session detected");</script>';
            header('location: elements/loader.php');
            exit();
        }
    } else {
        $curuser = $_COOKIE["curusername"];
        $redirection = "index.php";
    }
?>