<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){  
    header('location:index.php');

}else{
    $id_number = $_SESSION['id_number'];
    include('includes/config.php');
    $sel=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$id_number'");
    $cols=mysqli_fetch_assoc($sel);
    if (isset($_POST['submit'])) {
        $name=mysqli_real_escape_string($db, trim($_POST['name']));
        $email=mysqli_real_escape_string($db, trim($_POST['email']));
        $location=mysqli_real_escape_string($db, trim($_POST['location'])); 
        $phone=mysqli_real_escape_string($db, trim($_POST['phone_number']));        

        $ins=mysqli_query($db, "UPDATE `users` SET `username`='$name',`email`='$email',`location`='$location', `phone`='$phone' WHERE `id_number`='$id_number'");

        if ($ins) {
            $msg="Details succesfully updated";
            $sel=mysqli_query($db, "SELECT * FROM `users` WHERE `id_number`='$id_number'");
            $cols=mysqli_fetch_assoc($sel);
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

        <title>County Tax Management System- Update Profile</title>

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
                    <h1 class="page-header">Update Profile</h1>
                </div>
                <!-- /.col-lg-12 -->                                    
                <div class="col-md-10">
                    <!-- start of error and success messages -->
                            <?php if($error){?><div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                        else if($msg){?><div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                            <!-- end of error and success messages -->
                    <div class="panel panel-default">
                            <div class="panel-heading">User Info</div>
                            <div class="panel-body">
                        <form method="post" name="chngpwd" class="s-autoform-vii s-center" onSubmit="return valid();">
                            <input type="text" id="name" placeholder="Enter user name" name="name" required>
                            <input type="email" id="email" placeholder="Enter email address" name="email" required>
                            <input type="Number" id="id_number" placeholder="Enter id number" name="id_number" required disabled>
                            <input type="Number" id="phone_number" placeholder="Enter phone number" name="phone_number" required>
                            <input type="text" id="location" placeholder="Enter your location" name="location">
                            <button type="submit" class="btn btn-info" name="submit">Save Changes</button>
                        </form>
                        <!--?php echo '<input type="text" value="'.$cols['username'].'" id="name" placeholder="Enter user name" name="name" required>
                            <input type="email" class="form-control" value="'.$cols['email'].'" id="email" placeholder="Enter email address" name="email" required>
                            <input type="Number" class="form-control" value="'.$cols['id_number'].'" id="id_number" placeholder="Enter id number" name="id_number" required disabled>
                            <input type="Number" class="form-control" value="'.$cols['phone'].'" id="phone_number" placeholder="Enter phone number" name="phone_number" required>
                            <input type="text" class="form-control" value="'.$cols['location'].'" id="location" placeholder="Enter your location" name="location">
                        <div class="form-group">        
                          <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-info" name="submit">Save Changes</button>
                          </div>
                        </div>'?>
                        value="<?php echo $cols['username'] ?>"
                        value="<?php echo $cols['email'] ?>"
                        value="<?php echo $cols['id_number'] ?>"
                        value="<?php echo $cols['phone'] ?>"
                        value="<?php echo $cols['location'] ?>"-->
                        </div>
                    </div>
                </div>
            </div>
                            
            </div>
            <!-- /#page-wrapper -->

        <!-- /#wrapper -->

        <?php include 'includes/userscripts.php';?>

    </body>
</html>
