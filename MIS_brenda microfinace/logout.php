<?php
    include 'actions/checksession.php';
    $mylog = "[$curuser] : logged out";

    setcookie("curusername", "invalid", time() - (86400 * 30), "/"); 
    setcookie("curusertype", "invalid", time() - (86400 * 30), "/"); 

    header('refresh: 3.2; url = index.php');
    echo "$mylog<br>redirecting in 3 seconds";
?>