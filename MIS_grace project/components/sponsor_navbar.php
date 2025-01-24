<nav class="w3-bar">
    <a href="index.php">
        <div>
            <i class="fa fa-dashboard"></i> welcome <b><?php echo "$curuser";?></b>
        </div>
    </a>
    <div class="w3-dropdown-hover w3-right">
        <button class=""><i class="fa fa-chevron-down"></i> show system menu</button>
        <div class="w3-dropdown-content w3-transparent">
            <div class="dropmenu w3-white w3-animate-bottom w3-animate-opacity">
                <a class="primaryhover" href="index.php">home</a>
                <a class="primaryhover" href="make_deposit.php">make deposit</a>
                <a class="primaryhover" href="view_deposits.php">my deposits</a>
                <a class="primaryhover" href="sponsor_recommend.php">make recommendation</a>
                <a class="primaryhover" href="view_recommends.php">my recommendations</a>
                <a class="primaryhover" href="logout.php">logout</a>
            </div>
        </div>
    </div>
</nav>