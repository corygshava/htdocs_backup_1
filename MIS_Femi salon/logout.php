<?php
    include('cookies.php');
    // handlelogout();
    deleteCookie('username');

    echo "logout successful<br>redirecting you back to login";
    sleep(5);
    header("Location: login.php");
?>