
<?php
    $curpage = isset($curpage) ? $curpage : "Dashboard";
?>

<style>
    a.active{
        background-color: #333333 !important;
        color: #fff !important;
    }
</style>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.php">County Tax Management System- Admin</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <!-- <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="#"><i class="fa fa-home fa-fw"></i> Home</a></li>
    </ul> -->

    <ul class="nav navbar-right navbar-top-links">
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="toggleShow('.dropper')">
                <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['admin_name']; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user dropper" data-shown="0">
                <li><a href="change_password.php"><i class="fa fa-gear fa-fw"></i> Update Password</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- /.navbar-top-links -->


    <div class="navbar-default sidebar" role="navigation" data-curpage="<?php echo "$curpage";?>">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="register_user.php"><i class="fa fa-user-plus fa-fw"></i> <span>Register User</span></a>
                </li>
                <li>
                    <a href="registered_users.php"><i class="fa fa-group fa-fw"></i> <span>Registered Users</span></a>
                </li>
                <li>
                    <a href="users_payment_reports.php"><i class="fa fa-clipboard fa-fw"></i><span>Payment Reports</span></a>
                </li>
               
            </ul>
        </div>
    </div>
</nav>