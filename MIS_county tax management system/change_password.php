<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){  
    header('location:index.php');
}else{
    include('includes/config.php');
 $id_number=$_SESSION['id_number'];
// Code for change password 
if(isset($_POST['submit'])) {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$confirmpassword=md5($_POST['confirmpassword']);
$error="";

if ($newpassword!=$confirmpassword) {
    $error="Your password does not match";
}
if (empty($error)) {
    $check=mysqli_query($db,"SELECT * FROM `users` WHERE `id_number`='$id_number'");
    $cols=mysqli_fetch_assoc($check);
    $db_pass=$cols['password'];
if ($password==$db_pass) {
    $update=mysqli_query($db,"UPDATE `users` SET `password`='$newpassword' WHERE `id_number`='$id_number'");
    if ($update) {
        $msg="Password updated successfully";
    }else{
        $error="Something went wrong. Please try again";
    }
    
}else{
    $error="Current password does not match the one previously set";
   }
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

        <title>County Tax Management System- Update Password</title>

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
                        <h1 class="page-header">Update Password</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-md-10">
                                <div class="panel panel-default">
                                    <div class="s-bl-m s-padding-small">Change password</div>
                                    <div class="panel-body">
                                        <form method="post" name="chngpwd" class="s-autoform-vii s-center" onSubmit="return valid();">
                                    <!-- start of error and success messages -->
                                            <?php if($error){?><div class="alert alert-danger alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                                        else if($msg){?><div class="alert alert-success alert-dismissable">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                                            <!-- end of error and success messages -->
                                                    <input type="password" name="password" id="password" placeholder="enter current password" required>
                                                    <input type="password" name="newpassword" id="newpassword" placeholder="enter new password" required>
                                                    <input type="password" name="confirmpassword" id="confirmpassword" placeholder="retype the new password here" required></br>
                                                    <button class="btn btn-primary" name="submit" type="submit">Save changes</button>
                                                    <div id="error_msg"></div>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                </div>
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'includes/userscripts.php';?>
    </body>
</html>
