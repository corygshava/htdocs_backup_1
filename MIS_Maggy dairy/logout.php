<?php
    $restxt = "the code didn't run";
    $toredirect = 'index.php';

    setcookie("curusername", "", time() - 3600, "/");
    setcookie("curusertype", "", time() - 3600, "/");
    setcookie("curuserid", "", time() - 3600, "/");

    $processtxt = "processing logout";

    $restxt = "logout successful";
    $opres = "true";

    echo "logging you out";

    header('refresh:0.2;url=elements/loader.php');
?>