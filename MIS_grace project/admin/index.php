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

    <title>Dashboard</title>
</head>
<body>
    <?php
        if($curusertype == "sponsor"){
    ?>
    <!-- code for sponsor UI -->

    
    <?php
        include '../components/sponsor_navbar.php';
    ?>

    <div class="content">
        <?php
            include 'sponsor_summary.php';
        ?>

        <div class="w3-row">
            <div class="w3-col m6">
                <div class="menu">
                    <h2>Options</h2>
                    <a href="make_deposit.php">make deposit</a><br>
                    <a href="view_deposits.php">my deposits</a><br>
                    <a href="sponsor_recommend.php">make recommendation</a><br>
                    <a href="view_recommends.php">my recommendations</a><br>
                </div>
            </div>
            <div class="w3-col m6">
                <div class="menu">
                    <h2>Account Actions</h2>
                    <a href="logout.php">logout</a>
                </div>
            </div>
        </div>
    </div>
    

    <!-- ------------------------------------------------ -->
    <?php
        } else {
    ?>
    <!-- code for admin UI -->

    
    <?php
        include '../components/admin_navbar.php';
    ?>

    <div class="content">
        <?php
            include 'admin_summary.php';
        ?>

        <div class="w3-row">
            <div class="w3-col m4">
                <div class="menu">
                    <h2>Funds</h2>
                    <a href="make_deposit.php">add deposit</a><br>
                    <a href="view_deposits.php">all deposits</a><br>
                    <a href="view_deposits.php?filter=pending">pending deposits</a><br>
                    <a href="admin_givefunds.php">allocate funds</a><br>
                    <a href="admin_transactions.php">transactions</a><br>
                </div>
            </div>
            <div class="w3-col m4">
                <div class="menu">
                    <h2>Beneficiary Options</h2>
                    <a href="admin_addbeneficiary.php">Register new Beneficiary</a><br>
                    <a href="view_beneficiaries.php">view beneficiaries</a><br>
                    <a href="view_recommends.php?filter=pending">pending recommendations</a><br>
                    <a href="view_recommends.php?filter=all">all recommendations</a><br>
                </div>
            </div>
            <div class="w3-col m4">
                <div class="menu">
                    <h2>User Options</h2>
                    <a href="view_users.php">list sponsors</a><br>
                    <a href="../newuser.php">register new user</a><br>
                    <a href="logout.php">log out</a><br>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
    ?>

    <?php
        include '../components/footer.php';
    ?>

    <script src="../js/SuperScript.js"></script>
</body>
</html>