<?php
    if(isset($_GET["error"])){
        $myerror = $_GET["error"];
        echo "<script>alert('$myerror')</script>";
    }

    if(isset($_GET["message"])){
        $myerror = $_GET["message"];
        echo "<script>alert('$myerror')</script>";
    }
?>