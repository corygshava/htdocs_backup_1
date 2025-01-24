<?php

    setcookie("curuser", "", time() - 3600, "/");
    setcookie("curusertype", "", time() - 3600, "/");
    // setcookie("curuserid", "", time() - 3600, "/");

    // header("refresh:2.3;url=");
    
    $processtxt = "processing logout";
    $timeout = 1.78;
    $theloc = '../index.php';
    include '../elements/loader.php';
?>