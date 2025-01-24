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

    <title>withdraw</title>
</head>
<body>
    <header class="w3-center w3-text-white">
        <h1>withdraw from savings</h1>
    </header>

    <?php
        if($curuser != ""){
            include 'actions/connect.php';

            $myop = "SELECT saveamt,saveid FROM savings WHERE saveholder='$curuser'";
            $result = $conn->query($myop);

            if($result){
                $row = $result->fetch_assoc();
                $savingscash = $row['saveamt'];
                $saveid = $row['saveid'];
    ?>

    <div class="w3-center">
        <div class="content card formdata round w3-text-white w3-center" style="margin: 25px 0 12px 0 !important;">
            <div style="font-size: 25px;">
                <span>Amount available : </span><b class="w3-text-blue" id="maxamt"><?php echo $savingscash;?></b>
            </div>

            <hr>

            <form action="actions/handlewithdraw.php" method="post">
                <label>amount to withdraw</label><br>
                <input type="number" name="withdraw_amount" max="<?php echo $savingscash;?>" placeholder="enter amount here">
                <input type="hidden" name="saveid" value="<?php echo $saveid;?>">
                <input type="hidden" name="withdraw_holder" value="<?php echo $curuser;?>"><br>
                <button class="w3-btn themebtn hover1 w3-black w3-hover-purple">submit <i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

    <?php
        } else {
            echo "<script>alert(\"an error occured while trying to get your savings information : {$conn->error}\");</script>";
        }
        } else {
            echo "<script>alert(\"you have to log in first\");</script>";
        }
    ?>
</body>
</html>