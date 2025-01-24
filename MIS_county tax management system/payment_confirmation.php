<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['id_number'])){  
    header('location:index.php');

}else{

    include('includes/config.php');
    $id_number=$_SESSION['id_number'];
    if (isset($_POST['submit'])) {        
        $sel=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$id_number'");
        $cols=mysqli_fetch_assoc($sel);
        date_default_timezone_set("Africa/Nairobi");
        $time=date("h:i:s");
        $todaysdate=date('y-m-d');
        $weekfrnow = date('y-m-d',strtotime($todaysdate . ' +1 day'));

        // echo "$todaysdate <br> $weekfrnow";

        $type=$_POST['type'];
        $mode=$_POST['mode'];
        $mpesa_code=$_POST['mpesa_code'];

        $amount_array = array  (
          array("daily",100,80,150,120,50,70,60,160,145,40,65,85,95,66,92),
          array("weekly",200,190,300,225,320,290,310,410,360,450,420,415,315,345,400),
          array("monthly",450,550,510,600,650,610,720,750,780,800,1100,1210,1350,900,950),          
          );
        $min=1;
        $max=15;
        $rand= rand($min,$max);

        if ($type=='daily') {
            //check if user has made payments before and use the previous price 
            $checkPayQuery = "SELECT * FROM `payments` WHERE `user_id_number`='$id_number' AND `payment_type`='daily'";
            $search=mysqli_query($db, $checkPayQuery);

            if (mysqli_num_rows($search)==1) {
                $fetch=mysqli_fetch_assoc($search);
                $amount=$fetch['amount'];
                $valid_untill = date('y-m-d', strtotime($fetch['valid_untill'] . ' +1 day'));

            }else{
                //if user has never paid before, generate a new amount
                $amount=$amount_array[0][$rand];
                $valid_untill = date('y-m-d', strtotime($todaysdate . ' +1 day'));

            }

            
        }elseif ($type=='weekly'){
            //check if user has made payments before and use the previous price if so
            $search=mysqli_query($db, "SELECT * FROM `payments` WHERE `user_id_number`='$id_number' AND `payment_type`='weekly'");
            if (mysqli_num_rows($search)==1) {
                $fetch=mysqli_fetch_assoc($search);
                $amount=$fetch['amount'];
                $valid_untill = date('y-m-d', strtotime($fetch['valid_untill'] . ' +1 week'));
            }else{
                //if user has never paid before, generate a new amount                    
                 $amount=$amount_array[1][$rand];
                 $valid_untill = date('y-m-d', strtotime($todaysdate . ' +1 week'));
            }
            

        }elseif ($type=='monthly') {
            //check if user has made payments before and use the previous price if so
            $search=mysqli_query($db, "SELECT * FROM `payments` WHERE `user_id_number`='$id_number' AND `payment_type`='weekly'");
            if (mysqli_num_rows($search)==1) {
                $fetch=mysqli_fetch_assoc($search);
                $amount=$fetch['amount'];
            }else{
                //if user has never paid before, generate a new amount                    
                 $amount=$amount_array[2][$rand];
            }
            
            //this will get last date of the month
            $valid_untill = date('m/t/Y',strtotime('today'));
        }

        // echo "valid untill : $valid_untill";

        //show the amount with 2 dp
        $final_amount= number_format((float)$amount, 2, '.', '');

        $addQuery = "INSERT INTO `payments_report`(`id`, `user_id_number`, `payment_type`, `payment_mode`, `date_payed`, `time_payed`, `valid_untill`, `amount`) VALUES ('','$id_number','$type','$mode','$todaysdate','$time','$valid_untill','$final_amount')";
        $ins=mysqli_query($db, $addQuery);

        echo "$addQuery";

        if ($ins) {
            //check if user made any payments and update, else insert it
            $check=mysqli_query($db,"SELECT * FROM `payments` WHERE `user_id_number`='$id_number'");            
            if (mysqli_num_rows($check)==1) {
                $update=mysqli_query($db, "UPDATE `payments` SET `payment_type`='$type',`payment_mode`='$mode',`date_payed`='$todaysdate',`time_payed`='$time',`valid_untill`='$valid_untill',`amount`='$final_amount' WHERE `user_id_number`='$id_number'");
            }else {
                $insert=mysqli_query($db, "INSERT INTO `payments`(`id`, `user_id_number`, `payment_type`, `payment_mode`, `date_payed`, `time_payed`, `valid_untill`, `amount`) VALUES ('','$id_number','$type','$mode','$todaysdate','$time','$valid_untill','$final_amount')");

            }
            $msg="You successfully deposited Ksh $final_amount to your $type tax account";
        }else{
            $error="Something went wrong, please try again later";
        }

        // $msg="Type: $type Mode: $mode $Mpesa: $mpesa_code Amount: $final_amount Date payed: $todaysdate Time Paid $time Validity: $valid_untill";
    }else{
        header('location:make_payment.php');
    }



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

        <title>Tax Management- User</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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

        <style type="text/css">
           body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
        </style>

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
                        <h1 class="page-header">Make Payment</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>   

                <!-- start of error and success messages -->
                <?php if($error){?><div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if($msg){?><div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <!-- end of error and success messages -->         
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'includes/userscripts.php';?>
   

    </body>
</html>
