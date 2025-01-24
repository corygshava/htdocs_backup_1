<?php
session_start();
error_reporting(0);
if (isset($_POST['login'])) {
    include('includes/config.php');
    error_reporting(0);
    if ($_POST['id_number'] &&
        $_POST['password']) {
        $id_number = $_POST['id_number']; 
        $password = $_POST['password'];
        $new_password=md5($password);

        $getdataQuery = "SELECT * FROM `users` WHERE `id_number`='$id_number' AND `password`='$new_password'";
        $res=mysqli_query($db,$getdataQuery);
        $cols=mysqli_fetch_assoc($res);
        $username=$cols['username'];
        $num=mysqli_num_rows($res);

        if ($num==1) {
            echo "found it";
            $_SESSION['username'] = $username;
            $_SESSION['id_number'] = $id_number;

            //if user is using default password take him to update password            
                if ($password==$id_number) {
                    header("location:change_password.php");
                }else{
                    header("location:user_dashboard.php");
                }
        }else{?>
          <script type="text/javascript">
            // alert("Invalid username or password");
            alert("[<?php echo "$getdataQuery"; ?>]")
          </script>

        <?php

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

        <title>CTMS User Login</title>

        <!-- Bootstrap Core CSS 
        <link rel="stylesheet" type="text/css" href="assets/BS4/css/bootstrap.min.css">-->

        <!--s-styler pro-->
        <link href="assets/S-styler/s-auto-packed.css" rel="stylesheet">
        <link href="assets/S-styler/s-styler.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body{background-image:url('assets/pics/back1.png');background-attachment: fixed;background-size: 100% auto;color: #fff;}
            fieldset{border:none;}
        </style>
    </head>
    <body>

        
        <div class="s-padding-tiny s-bl-m s-center">
            <h1>C.T.M.S</h1>
        </div>
        <div class="s-distance-large s-half-centered s-white">
            <form role="form" method="post" class="s-autoform-iv s-center" style="border-radius: 20px;">
                <i class="fa fa-4x fa-user"></i>
                <p>Please Sign In to continue to County tax management System</p>
                <fieldset class="s-text-left">
                        <input placeholder="ID Number" name="id_number" type="text" autofocus>
                        <input placeholder="Password" name="password" type="password" value=""><br>
                        <!-- <label class="s-hide">
                            <input name="remember" type="checkbox" value="Remember Me" class="s-i-b">
                            <b class="s-i-b">remember me</b>
                        </label> -->
                    <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Login</button>
                </fieldset>
                <!-- <a href="#" class="s-r-m s-padding-tiny s-round-tiny">forgot password</a>
                <a href="#" class="s-g-m s-padding-tiny s-round-tiny">new account</a> -->
            </form>
        </div>
    <footer class="s-bl-m s-padding-small s-center">
        <b>note: </b>Default password is your ID Number
    </footer>
        </div>
        

        <?php include 'includes/userscripts.php';?>

    </body>
</html>
