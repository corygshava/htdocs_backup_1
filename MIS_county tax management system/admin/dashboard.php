<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_name'])){  
    header('location:index.php');

}else{
    include('../includes/config.php');
    date_default_timezone_set("Africa/Nairobi");
    $date=date('m/d/Y');
    $sel=mysqli_query($db, "SELECT * FROM `users`");
    $num=mysqli_num_rows($sel);

    $sel2=mysqli_query($db, "SELECT * FROM `payments` WHERE `valid_untill`<='$date'");
    $num2=mysqli_num_rows($sel2);

    $paying_sel=mysqli_query($db, "SELECT * FROM `payments` WHERE `payment_type`='daily'");
    $paying_sel1=mysqli_query($db, "SELECT * FROM `payments` WHERE `payment_type`='weekly'");
    $paying_sel2=mysqli_query($db, "SELECT * FROM `payments` WHERE `payment_type`='monthly'");

    $count=mysqli_num_rows($paying_sel);
    $count1=mysqli_num_rows($paying_sel1);
    $count2=mysqli_num_rows($paying_sel2);

}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="favicon.png" type="image/png">

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>County Tax Management System- Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

             <?php include 'admin_navbar.php';?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                    <?php
                    if ($num2>0) {?>
                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-exclamation fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num2; ?></div>
                                        <div>Passed validity date!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="passed_validity.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                        </div>

                    <?php
                    }

                     ?>                        
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $num; ?></div>
                                        <div>Registered Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="registered_users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count; ?></div>
                                        <div>Paying Daily Package</div>
                                    </div>
                                </div>
                            </div>
                            <a href="paying_daily.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count1; ?></div>
                                        <div>Paying Weekly Package</div>
                                    </div>
                                </div>
                            </div>
                            <a href="paying_weekly.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $count2; ?></div>
                                        <div>Paying Monthly Package</div>
                                    </div>
                                </div>
                            </div>
                            <a href="paying_monthly.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'admin_scripts.php';?>

    </body>
</html>
