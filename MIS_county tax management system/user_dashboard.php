<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['id_number'])){  
    header('location:index.php');

}else{

    include('includes/config.php');
    $id_number=$_SESSION['id_number'];
    $sel=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$id_number'");
    $num=mysqli_num_rows($sel);
    $cols=mysqli_fetch_assoc($sel);
    $date=date('m/d/Y');

    $sel2=mysqli_query($db, "SELECT * FROM `payments` WHERE `user_id_number`='$id_number'");
    $cols2=mysqli_fetch_assoc($sel2);
    $valid_untill=$cols2['valid_untill'];

    $date1=date_create("$date");
    $date2=date_create("$valid_untill");
    $diff=date_diff($date1,$date2);
    $ans=$diff->format("%R%a");
    $int = (int)$ans;

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

        <title>County Tax Management System- User</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!--s-styler pro-->
        <link href="assets/S-styler/s-auto-packed.css" rel="stylesheet">
        <link href="assets/S-styler/s-styler.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

                <?php include 'includes/usernavbar.php'; ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                <div class="col-lg-8">
                <!-- start of error and success messages -->
                    <?php if($int==-1){?>
                    <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Please pay your tax on time. We have not received yesterday's tax </div>
                    <?php }else if($int<0){$int=-$int;?>
                    <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    Please pay your tax on time. We have not received your payment for the last <strong><?php echo htmlentities($int); ?> days</strong></div>
                    <?php }else if($int==0){?>
                    <div class="alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Please pay your tax on time. We have not received your today's payment </div>
                    <?php }?>
                <!-- end of error and success messages -->
                </div>
            </div>

               <div class="row">
                <div class="col-lg-4">
                        <div class="panel panel-success s-card">
                            <div class="s-bl-m s-padding-small">
                                User Info
                            </div>
                            <div class="panel-body">
                                <h5><b>Name: </b><?php echo $cols['username']; ?></h5>
                                <h5><b>Email: </b><?php echo $cols['email']; ?></h5>
                                <h5><b>ID Number: </b><?php echo $cols['id_number']; ?></h5>
                                <h5><b>Phone Number: </b><?php if (empty($cols['phone'])) {
                                    echo "<i>Not provided</i>";
                                }else {
                                    echo $cols['phone'];
                                }  ?></h5>
                                <h5><b>Location: </b><?php if (empty($cols['location'])) {
                                    echo "<i>Not provided</i>";
                                }else {
                                    echo $cols['location'];
                                }  ?></h5>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>

                    <div class="col-lg-4">
                        <div class="panel panel-success s-card">
                            <div class="s-g-m s-padding-small">
                                Payment Info
                            </div>
                            <div class="panel-body">
                                <h5><b>Payment Status: </b>
                                    <?php 
                                    if (mysqli_num_rows($sel2)==1) {
                                        if ($cols2['valid_untill']<=$date) {
                                            echo "Expired";
                                        }else {
                                            echo "Active";
                                        }
                                    }else {
                                        echo "Never paid";
                                    } ?></h5>
                                <h5><b>Active package: </b><?php 
                                 if (mysqli_num_rows($sel2)==1) {
                                    $package=$cols2['payment_type'];
                                        echo $package;
                                    }else {
                                        echo "None";
                                    }?></h5>
                                <h5><b>Package last paid: </b><?php 
                                if (mysqli_num_rows($sel2)==1) {
                                        echo date("M jS, Y", strtotime($cols2['date_payed']));
                                    }else {
                                        echo "Not yet paid";
                                    } ?></h5>
                                <h5><b>Amount paid: </b><?php 
                                if (mysqli_num_rows($sel2)==1) {
                                       echo 'Ksh ' . $cols2['amount'];                                        
                                    }else {
                                        echo "Not yet paid";
                                    } ?></h5>
                                <h5><b>Package valid untill: </b><?php 
                                if (mysqli_num_rows($sel2)==1) {
                                        if ($cols2['valid_untill']<=$date) {
                                            echo "Invalid as from " . date("M jS, Y", strtotime($cols2['valid_untill']));  
                                        }else {
                                           echo date("M jS, Y", strtotime($cols2['valid_untill']));                                        
                                        }
                                    }else {
                                        echo "Not yet paid";
                                    } ?></h5>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                </div>
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'includes/userscripts.php';?>

    </body>
</html>
