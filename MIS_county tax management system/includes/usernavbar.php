<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="user_dashboard.php">County Tax Management System</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!--<ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Home</a></li>
                </ul>-->

    <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="toggleShow('.dropdown-1')">
                <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user dropdown-1" data-shown="0">
                <li><a href="update_profile.php"><i class="fa fa-gears fa-fw"></i> Update Profile</a>
                </li>
                <li class="divider"></li>
                <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Update Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="user_dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="make_payment.php" ><i class="fa fa-dollar fa-fw"></i> Make Payment</a>
                </li>
                <li>
                    <a href="payment_reports.php"><i class="fa fa-clipboard fa-fw"></i> Payment Reports</a>
                </li>
                <li>
            </ul>
        </div>
    </div>
</nav>