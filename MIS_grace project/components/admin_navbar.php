<nav class="w3-bar">
    <a href="index.php">
        <div>
            <i class="fa fa-dashboard"></i> welcome <b><?php echo $curuser;?></b>
        </div>
    </a>
    <div class="w3-dropdown-hover w3-right">
        <button class=""><i class="fa fa-chevron-down"></i> funds options</button>
        <div class="w3-dropdown-content w3-transparent">
            <div class="dropmenu w3-white w3-animate-bottom w3-animate-opacity">
                <a class="primaryhover" href="make_deposit.php">add deposit</a>
                <a class="primaryhover" href="view_deposits.php">all deposits</a>
                <a class="primaryhover" href="view_deposits.php?filter=pending">pending deposits</a>
                <a class="primaryhover" href="admin_givefunds.php">allocate funds</a>
                <a class="primaryhover" href="admin_transactions.php">transactions</a>
            </div>
        </div>
    </div>
    <div class="w3-dropdown-hover w3-right">
        <button class=""><i class="fa fa-chevron-down"></i> Beneficiary options</button>
        <div class="w3-dropdown-content w3-transparent">
            <div class="dropmenu w3-white w3-animate-bottom w3-animate-opacity">
                <a class="primaryhover" href="admin_addbeneficiary.php">Register new Beneficiary</a>
                <a class="primaryhover" href="view_beneficiaries.php">view beneficiaries</a>
                <a class="primaryhover" href="view_recommends.php?filter=pending">pending recommendations</a>
                <a class="primaryhover" href="view_recommends.php?filter=all">all recommendations</a>
            </div>
        </div>
    </div>
    <div class="w3-dropdown-hover w3-right">
        <button class=""><i class="fa fa-chevron-down"></i> user options</button>
        <div class="w3-dropdown-content w3-transparent">
            <div class="dropmenu w3-white w3-animate-bottom w3-animate-opacity">
                <a class="primaryhover" href="view_users.php">list sponsors</a>
                <a class="primaryhover" href="../newuser.php">register new user</a>
                <a class="primaryhover" href="logout.php">log out</a>
            </div>
        </div>
    </div>
</nav>