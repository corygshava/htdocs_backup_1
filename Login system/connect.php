<?php
    if (!isset($mydb)) {
        echo "specify database first";
    } else {
        $connect = mysqli_connect("localhost","user","123");
        $db = mysqli_select_db($connect,$mydb);
    }
?>