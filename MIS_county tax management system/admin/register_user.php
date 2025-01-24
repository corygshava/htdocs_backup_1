<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['admin_name'])){  
    header('location:index.php');

}else{
    include('../includes/config.php');
    date_default_timezone_set("Africa/Nairobi");
    $time=date("h:ia");
    $date=date('m/d/Y');
    if (isset($_POST['submit'])) {
        $name=mysqli_real_escape_string($db, trim($_POST['name']));
        $phone=mysqli_real_escape_string($db, trim($_POST['phone']));
        $id_number=mysqli_real_escape_string($db, trim($_POST['id_number']));
        $password=md5($id_number);

        $ins=mysqli_query($db, "INSERT INTO `users`(`id`, `username`, `email`, `password`, `location`, `id_number`, `phone`) VALUES ('','$name','','$password','','$id_number','$phone')");

        if ($ins) {
            $msg="User has been added successfully";
        }else {
            $error="Something went wrong. Please try again";

        }
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

            <?php $curpage="register user";include 'admin_navbar.php';?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Register User</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="col-lg-10">
                    

                <!-- start of error and success messages -->
                <?php if($error){?><div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
            else if($msg){?><div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                <!-- end of error and success messages -->
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                User Info
                            </div>
                            <div class="panel-body">                                  
                             <div class="container">
                                  <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="name">Name:</label>
                                      <div class="col-sm-6">
                                        <input type="text" class="form-control" id="name" placeholder="Enter user name" name="name" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="phone">Phone Number:</label>
                                      <div class="col-sm-6">
                                        <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" required>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-sm-2" for="phone">ID Number:</label>
                                      <div class="col-sm-6">
                                        <input type="Number" class="form-control" id="id_number" placeholder="Enter id number" name="id_number" required>
                                      </div>
                                    </div>
                                    <div class="form-group">        
                                      <div class="col-sm-offset-2 col-sm-6">
                                        <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                                                   
                                
                            </div>
                            <div class="panel-footer">
                                <center>
                                <?php echo date("D M jS, Y", strtotime($date)); ?> 
                                </center>
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'admin_scripts.php';?>

    </body>
</html>
