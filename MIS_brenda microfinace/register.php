<?php
    $dontredirect = true;
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Dashboard</title>
</head>
<body>
    <?php
        if(true){
    ?>
    <!-- in case no one is logged in -->
    <div class="w3-center">
        <div class="loginContainer content w3-text-white round">
            <form action="actions/add customer.php" method="post">
                <h2>Register new client</h2>
                <input type="text" name="customername" placeholder="enter your username here" required>
                <input type="tel" name="customercontact" placeholder="enter your phone number here" maxlength="13" required>
                <input type="password" name="customerpassword" placeholder="enter your password here" required>
                <button type="reset" class="w3-black w3-hover-purple">clear <i class="fa fa-trash"></i></button>
                <button type="submit" class="w3-black w3-hover-purple">submit <i class="fa fa-paper-plane"></i></button>

                <br>
                <a href="index.php" class="w3-text-blue">already have an account?</a>
            </form>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>