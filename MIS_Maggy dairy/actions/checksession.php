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
        $curusertype = $_COOKIE["curusertype"];
        $curuserid = $_COOKIE["curuserid"];
        $redirection = "index.php";

        if(isset($restricted)){
            if($restricted == "true" && $curusertype != "admin"){
                echo '<script>alert("you arent allowed to view this page");</script>';
                header('location: index.php');
                exit();
            }
        }
    }

    $uname = $curuser;
    $utype = $curusertype;
?>