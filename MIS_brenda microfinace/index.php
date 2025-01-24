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
        $userinfo = "
            <h1>welcome <b>$curuser</b></h1>
            logged in as <b class=\"secondarybg w3-tag\">$curusertype</b>
            <br><a href=\"logout.php\" class=\"themebtn3 w3-grey w3-hover-red\" style=\"font-size: 17px;\">logout</a>
        ";

        if($curuser == ""){
    ?>
    <!-- in case no one is logged in -->
    <div class="w3-center">
        <div class="loginContainer content w3-text-white round">
            <form action="actions/loginhandler.php" method="post">
                <h2>Log in</h2>
                <input type="hidden" name="actiontype" value="login" placeholder="enter your username here">
                <label for="usertype">log in as : </label>
                <select name="usertype" class="w3-black">
                    <option value="client">Client</option>
                    <option value="administrator">Administrator</option>
                </select>
                <input type="text" name="username" placeholder="enter your username here" required>
                <input type="password" name="password" placeholder="enter your password here" required>
                <button type="reset" class="w3-black w3-hover-purple">clear <i class="fa fa-close"></i></button>
                <button type="submit" class="w3-black w3-hover-purple">submit <i class="fa fa-paper-plane"></i></button>
                <br>
                <a href="register.php" class="w3-text-blue">register a new account</a>
            </form>
        </div>
    </div>
    <?php
        } elseif ($curusertype == "administrator") {
    ?>
    <!-- in case the admin is logged in -->

    <div id="adminInterface" class="w3-hided">
        <header class="w3-purple w3-center">
            <?php echo $userinfo;?>
        </header>

        <nav class="options">
            <a class="w3-btn themebtn navbtn hover1 active" onclick="switchcats(0,this.dataset.mylink,this.dataset.payload)" data-mylink="summary" data-payload="">User summary</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(1,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=all">all Loans</a>
            <div class="w3-dropdown-hover">
                <button class="w3-btn themebtn hover1 w3-black">Loan filters <i class="fa fa-arrow-down"></i></button>
                <div class="w3-dropdown-content w3-black themebtn" style="margin-top: 0 !important;">
                    <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(2,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=pending approval">loans pending approval</a>
                    <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(3,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=rejected">rejected loans</a>
                    <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(4,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=unpaid">unpaid loans</a>
                    <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(5,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=pending verification">loans pending verification</a>
                    <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(6,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=paid">paid loans</a>
                </div>
            </div>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(7,this.dataset.mylink,this.dataset.payload)" data-mylink="withdrawals" data-payload="req=all">withdrawals</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(8,this.dataset.mylink,this.dataset.payload)" data-mylink="customers" data-payload="req=all">Customers</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(9,this.dataset.mylink,this.dataset.payload)" data-mylink="savings" data-payload="req=savings">Savings</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(10,this.dataset.mylink,this.dataset.payload)" data-mylink="savings" data-payload="req=deposits">deposits</a>
        </nav>

        <div>
            <iframe src="summary.php" class="theframe"></iframe>
        </div>
    </div>
   
    <?php
        } else {
            include 'actions/connect.php';

            // check if the user is banned
            $myop = "SELECT COUNT(*) as counted FROM customers WHERE custstatus = 'banned' AND custname = '$curuser'";
            $myresult = $conn->query($myop);
            $myrow = $myresult->fetch_assoc();

            if($myrow['counted'] == 0){
    ?>
    <!-- in case the customer is logged in -->

    <div class="clientInterface w3-hided">
        <header class="primarybg2 w3-text-white w3-center">
            <?php echo $userinfo;?>
        </header>

        <nav class="options">
            <a class="w3-btn themebtn navbtn hover1 active" onclick="switchcats(0,this.dataset.mylink,this.dataset.payload)" data-mylink="summary" data-payload="req=all">my summary</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(1,this.dataset.mylink,this.dataset.payload)" data-mylink="loans" data-payload="req=all">my Loans</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(2,this.dataset.mylink,this.dataset.payload)" data-mylink="savings" data-payload="req=savings">my savings</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(3,this.dataset.mylink,this.dataset.payload)" data-mylink="savings" data-payload="req=deposits">my deposits</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(4,this.dataset.mylink,this.dataset.payload)" data-mylink="withdrawals" data-payload="req=mine">my withdrawals</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(5,this.dataset.mylink,this.dataset.payload)" data-mylink="deposit" data-payload="req=deposits">deposit</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(6,this.dataset.mylink,this.dataset.payload)" data-mylink="withdraw" data-payload="req=all">withdraw</a>
            <a class="w3-btn themebtn navbtn hover1" onclick="switchcats(7,this.dataset.mylink,this.dataset.payload)" data-mylink="getloan" data-payload="req=all">new loan</a>
        </nav>

        <div>
            <iframe src="summary.php" class="theframe"></iframe>
        </div>
    </div>

    <?php
        } else {
            echo "<header class=\"w3-red w3-center\">
            $userinfo
        </header>";
            echo "<script>alert(\"[{$myrow['counted']} ] you have been banned and your details forwarded to CRB for non compliance with our policy\")</script>";
            exit();
        }
    }
    ?>

    <footer class="w3-black" style="padding:12px 20px;">
        &copy; Brenda's microfinace project
    </footer>

    <script src="js/dashboard.js"></script>
    <script>
        setframeHeight();
    </script>
</body>
</html>