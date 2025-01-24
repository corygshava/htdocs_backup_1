<?php
$curuser = "";
$curusertype = "";
$redirection = "index.php";
$mycol = "#0033ff";

if(isset($redirectto)){$redirection = $redirectto;}

    if(!(isset($_COOKIE["username"]))){
        if(isset($extraurl)){
            $extraurk += "login.php";
            header("Refresh:1.2; url = $extraurl");
        } else {
            header("Refresh:1.2; url = login.php?notify=sorry you have to log in first&type=error");
        }
    } else {
        $curuser = $_COOKIE["username"];
        $curusertype = isset($_COOKIE["usertype"]) ? $_COOKIE["usertype"] : "normal";
        $redirection = "dashboard.php";

        if(isset($recommendeduser)){
            if($_COOKIE["usertype"] != $recommendeduser){
                if(isset($extraurl)){
                    $extraurl = $extraurl.$redirection;
                    header("Refresh:1.2; url = $extraurl?notify=sorry you are not authorised to access that page&type=error");
                } else {
                    header("Refresh:1.2; url = $redirection?notify=sorry you are not authorised to access that page&type=error");
                }
            }
        }

        $mycol = $curusertype == "client" ? "#009fff" : "#ff9800";
        $hovcol = $curusertype == "client" ? "#02f3ff" : "#fffb02";
    }

    echo "<style>:root{--themecol:$mycol;--hovcolor: $hovcol;}</style>";
?>