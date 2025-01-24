<?php

    $redirection = isset($redirection) ? $redirection : 'index.php';

    if(!(isset($_COOKIE["curuser"]))){
        // if(!isset($dontredirect)){
            echo '<script>alert("start a session first");</script>';
            $notin = true;
        // }
    } else {
        $curuser = $_COOKIE["curuser"];
        $curusertype = $_COOKIE["curusertype"];
        $redirection = "index.php";
    }

    if (isset($prefix)) {
        $lnk = "$prefix".$redirection;
    } else {
        $lnk = $redirection;
    }

    if (isset($notin)) {
        header("Refresh:1.2; url = $lnk");
        exit();
    }

?>
<?php
/*
    $curuser = "";
    $redirection = "index.php";
    $prefix = isset($prefix) ? $prefix : "";
    $mypass = file_get_contents($prefix."systempassword.txt");
    $mypass = md5($mypass);
    $expiry = "2024-06-14 12:00:24";
    $currentDate = date("Y-m-d h:i:s");
    $myhash = "267fc65b143ce9abbec61528efe199cd";

    // Check if the current date is after the preset date
    if (strtotime($currentDate) > strtotime($expiry)) {
        if($mypass == $myhash){
            if(isset($redirectto)){$redirection = $redirectto;}

            if(!(isset($_COOKIE["curusername"]))){
                if(!isset($dontredirect)){
                    echo '<script>alert("start a session first");</script>';
                    // header("Refresh:1.2; url = ../index.php");
                    exit();
                }
            } else {
                $curuser = $_COOKIE["curusername"];
                $redirection = "index.php";
            }
        } else {
            exit();
        }
    } else {
        if(isset($redirectto)){$redirection = $redirectto;}

        if(!(isset($_COOKIE["curusername"]))){
            if(!isset($dontredirect)){
                echo '<script>alert("start a session first");</script>';
                header("Refresh:1.2; url = index.php");
            }
        } else {
            $curuser = $_COOKIE["curusername"];
            $redirection = "index.php";
        }
    }
    */
?>