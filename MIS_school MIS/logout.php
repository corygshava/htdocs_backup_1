<?php
    include('cookies.php');
    handlelogout();

    echo "logout successful<br>redirecting you back to login";
    header("refresh: 2; login.php");
?>