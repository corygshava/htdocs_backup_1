<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login handler</title>
</head>
<body>

    <!-- 

        deletes all coockies and redirects to login

    -->

    <div>
        successfully loged out<br>
    </div>

<?php
    require "functions.php";
    endSession();

    header("Refresh:1; url = ../login.html");
?>
</body>
</html>