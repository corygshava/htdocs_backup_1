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

    <title>new loan</title>
</head>
<body>
    <header class="w3-center w3-text-white">
        <h1>Get a new loan</h1>
    </header>

    <div class="w3-center">
        <div class="content card formdata round w3-text-white" style="margin: 25px 0 52px 0 !important;">
            <form action="actions/newloan.php" method="post">
                <span style="font-size: 25px;">loan limit: <b>50,000</b></span>
                <hr class="w3-border-dark-grey">
                <label for="amount">loan amount</label><br>
                <input type="number" name="loanamount" max="50000" placeholder="enter amount here" required><br>
                <label for="Guarantor1">Guarantor 1</label><br>
                <input type="text" name="Guarantor1" max="500" placeholder="enter the first Guarantor's contact here" required><br>
                <label for="Guarantor2">Guarantor 2</label><br>
                <input type="text" name="Guarantor2" max="500" placeholder="enter the second Guarantor's contact here" required><br>
                <label for="Guarantor3">Guarantor 3</label><br>
                <input type="text" name="Guarantor3" max="500" placeholder="enter the third Guarantor's contact here" required><br>
                <input type="hidden" name="loanstatus" value="pending approval">
                <input type="hidden" name="loanholder" value="<?php echo "$curuser";?>">

                <button class="w3-btn themebtn hover1 w3-black w3-hover-purple">submit <i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</body>
</html>