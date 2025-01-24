<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="favicon.png" type="image/png">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>County Tax Management System- Admin Login</title>

        <!-- Custom Icons -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <?php
    if(isset($_POST['email'])){
        echo "found";
    } else {
        echo "notfound";
    }
?>
        <form method="post" action="handleLogin.php">
            <input class="form-control" placeholder="E-mail" name="email" type="email">
            <input class="form-control" placeholder="Password" name="password" type="password">
            <input type="hidden" name="login" value="itsbegun">
        </form>

            <button type="submit">Login</button>
        <!-- jQuery -->
        <!-- <script src="../js/jquery.min.js"></script> -->

    </body>
</html>
