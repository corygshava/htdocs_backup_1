<?php

    $result = Array();

    include("connect.php");

    if(isset($myop)){
        $result = $conn -> query($myop);
    }

?>