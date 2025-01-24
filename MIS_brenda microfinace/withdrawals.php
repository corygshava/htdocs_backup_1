<?php
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

    <script src="js/superscript.js"></script>
    <title>withdrawals</title>
</head>
<body>
    <?php
        if(isset($_GET['req'])){
            $thereq = $_GET['req'];
            if($curusertype == "administrator"){
    ?>

    <!-- for admin -->
    <header class="w3-center w3-text-white">
        <h1>All withdrawals</h1>
    </header>

    <?php
        include 'dashboard/showwithdrawals.php';
    ?>

    <?php
        } elseif ($curusertype == "client") {
    ?>

    <!-- for client -->
    <header class="w3-center w3-text-white">
        <h1>Your withdrawals</h1>
    </header>

        <?php
            include 'dashboard/showwithdrawals.php';
        ?>

    <?php
        }
    }
    ?>

    <div class="w3-center">
        <button class="themebtn3 hover2" onclick="print();">Print document</button>
    </div>
</body>
</html>