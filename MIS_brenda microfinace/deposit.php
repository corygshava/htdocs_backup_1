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

    <title>deposit</title>
</head>
<body>
    <?php
        if($curusertype == "client"){
            include 'actions/connect.php';

            $myop = "SELECT saveamt,saveid FROM savings WHERE saveholder='$curuser'";
            $result = $conn->query($myop);

            if($result){
                $row = $result->fetch_assoc();
                $savingscash = $result->num_rows ? $row['saveamt'] : 0;
                $saveid = $result->num_rows ? $row['saveid'] : 0;
            }
    ?>
    <header class="w3-center w3-text-white">
        <h1>deposit savings</h1>
    </header>

    <div class="w3-center">
        <div class="content card formdata round w3-text-white" style="margin: 25px 0 12px 0 !important;">
            <div style="font-size: 25px;">
                <span>Amount in savings : </span><b class="w3-text-blue" id="maxamt"><?php echo $savingscash;?></b>
            </div>

            <hr>

            <form action="actions/handledeposits.php" method="post">
                <label>amount to deposit</label><br>
                <input type="number" name="depoamt" max="50000" placeholder="enter amount here" required><br>
                <input type="hidden" name="depoholder" value="<?php echo $curuser;?>" required>
                <label>transaction code</label><br>
                <input type="text" name="transactioncode" placeholder="enter the transaction code here" required><br>
                <button class="w3-btn themebtn hover1 w3-black w3-hover-purple">submit <i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
    <?php
        } else {
    ?>
    <div class="w3-center">
        <div class="content card formdata round" style="margin: 25px 0 12px 0 !important;">
            <div style="font-size: 25px;">
                <span>Only clients can access this page</span>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</body>
</html>