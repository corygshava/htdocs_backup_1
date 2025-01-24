<?php
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" href="favicon.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">

    <title>deposit funds</title>
</head>
<body>
    <?php
        include 'elements/navbar.php';
    ?>

    <div class="formholder">
        <div class="theform">
            <h1 class="w3-center">New deposit</h1>
            <form action="actions/newdeposit.php" method="post">
                <div class="flexresponsive row">
                    <div class="mobi">
                        <div class="npt">
                            <label for="tcode">transaction code</label>
                            <input type="text" name="tcode" id="tcode" placeholder="enter transaction code" required>
                        </div>
                        <div class="npt">
                            <label for="damt">How much</label>
                            <input type="number" name="damt" id="damt" placeholder="enter amount in ksh" required>
                        </div>
                    </div>
                </div>
                <div class="npt2 w3-center">
                    <button class="themebtn">add funds <i class="fa fa-send"></i></button>
                </div>
            </form>
        </div>
    </div>

    <?php
        include 'elements/footer.php';
    ?>

</body>
</html>