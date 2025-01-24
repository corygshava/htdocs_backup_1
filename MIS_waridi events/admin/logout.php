<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Processing log out</title>
</head>
<body>
    <div class="serverlog">
    <?php

        setcookie("curuser", "", time() - 3600, "/");
        setcookie("curusertype", "", time() - 3600, "/");
        setcookie("curevent", "", time() - 3600, "/");
        // setcookie("curuserid", "", time() - 3600, "/");


        $processtxt = "processing logout";
        echo "<p>$processtxt</p>";
        $theloc = '../index.php';
        header("refresh:2.3;url=$theloc");
        ?>
        <p>go to <a href="../login.php">login</a></p>
    </div>
</body>
</html>