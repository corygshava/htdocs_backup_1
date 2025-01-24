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

    <title>Document</title>
</head>
<body>
    <?php
        include 'actions/checksession.php';
        $thereq = isset($_GET['req']) ? $_GET['req'] : "savings";
        $criteria = ($curusertype == "administrator") ? "all" : $curuser;

        if($curusertype == "administrator"){
    ?>

    <!-- for admin -->
    <header class="w3-center w3-text-white">
        <h1>All <?php echo "$thereq";?></h1>
    </header>

    <?php
        if($thereq != "deposits"){
            include 'dashboard/showsavings.php';
        } else {
            include 'dashboard/showdeposits.php';
        }
    ?>

    <?php
        } elseif ($curusertype == "client") {
    ?>

    <!-- for client -->
    <header class="w3-center w3-text-white">
        <h1>Your <?php echo "$thereq";?></h1>
    </header>

    <?php
        if($thereq != "deposits"){
            include 'dashboard/showsavings.php';
        } else {
            include 'dashboard/showdeposits.php';
        }
    }
    ?>

    <div class="w3-center">
        <button class="themebtn3 hover2" onclick="print();">Print document</button>
    </div>
</body>
</html>