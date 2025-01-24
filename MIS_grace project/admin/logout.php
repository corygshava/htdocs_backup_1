<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFS : logout</title>
</head>
<body>
    <?php

        setcookie("curuser", "", time() - 3600, "/");
        setcookie("curusertype", "", time() - 3600, "/");
        // setcookie("curuserid", "", time() - 3600, "/");

        // header("refresh:2.3;url=");
        
        $processtxt = "processing logout";
        $timeout = 1.78;
        $theloc = '../index.php';
        include '../components/loader.php';
    ?>

</body>
</html>