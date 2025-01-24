<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/login.css">
    
    <title>CFS : Make Deposit</title>
</head>
<body>
    <?php
        include '../components/sponsor_navbar.php';
    ?>

    <div class="content">
        <div class="login-container">
            <h1>Make deposit</h1>
            <hr>
            <p>enter deposit details</p>
            <form action="processdeposit.php" method="post">
                <input type="hidden" name="username" value="<?php echo $curuser;?>">
                <input type="text" name="vcode" placeholder="Enter verification code" required>
                <input type="number" name="theamt" placeholder="enter amount here" required>
                <button type="submit">submit deposit <i class="fa fa-send"></i></button>
            </form>
        </div>
    </div>

    <?php
        include '../components/footer.php';
    ?>
</body>
</html>