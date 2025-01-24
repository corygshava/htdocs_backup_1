<?php

    $greeting = "user dashboard";
    $currentusername = '';
    $usertype = 'unknown';
    $userclass = 'empty';

    if(isset($_COOKIE['username'])){
        $currentusername = $_COOKIE['username'];
        $greeting = "welcome $currentusername";

        include('userdetails.php');

        $usertype = $theUserRole;
        $userclass = $theUserClass;
    } else {
        header("Location: login.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>user dashboard</title>

    <style>
        header{
            padding: 25px 12px;
        }
    </style>
</head>
<body>
    <header class="w3-blue">
        <h1><?php echo $greeting;?></h1>
        <span class="w3-tag w3-white w3-hover-black"><?php echo $usertype;?></span>
        <br>
        <div class="w3-container w3-padding-32">
            <a href="logout.php" class="w3-btn w3-black">logout</a>
        </div>
    </header>

    <?php
        if($usertype == "admin"){
            include('helpers/admin_dashboard.php');
        } else if ($usertype == "teacher"){
            include('helpers/teacher_dashboard.php');
        } else {
            include('helpers/discipline_dashboard.php');
        }
    ?>
</body>