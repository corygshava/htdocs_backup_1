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

    <title>pay loan</title>
</head>
<body>
    <?php
        if(isset($_GET['loanid']) && $curuser != "" && isset($_GET['loanamt'])){
            $loannum = $_GET['loanid'];
            $loanamt = $_GET['loanamt'];
    ?>
    <header class="w3-center w3-text-white">
        <h1>pay a loan</h1>
    </header>

    <div class="w3-center">
        <div class="content card formdata round" style="margin: 25px 0 12px 0 !important;">
            <form action="actions/payloan.php" method="post">
                <input type="number" name="amountpaid" max="<?php echo $loanamt;?>" placeholder="enter amount here">
                <input type="hidden" name="loanholder" value="<?php echo $curuser;?>">
                <input type="hidden" name="loannum" value="<?php echo $loannum;?>">
                <input type="text" name="paymentcode" placeholder="enter the transaction code here"><br>
                <button class="w3-btn themebtn hover1 w3-black w3-hover-purple">submit <i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    <?php
        } else {
            ?>
    <div class="w3-center">
        <div class="content card formdata round w3-text-white" style="margin: 25px 0 12px 0 !important;">
    <?php
            echo "<span>invalid request format</span><br>";
    ?>
            <a href="loans.php?req=all" class="themebtn2 hover2 w3-black" style="display: inline-block;">go back</a>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>