<?php
session_start();
// error_reporting(0);
if (isset($_POST['email'])) {
    include('../includes/config.php');
    echo "<br>processing login";
    // error_reporting(0);
    if ($_POST['email'] &&
        $_POST['password']) {
        $email = $_POST['email']; 
        $password = md5($_POST['password']);

        $res=mysqli_query($db,"SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$password'");
        $cols=mysqli_fetch_assoc($res);
        $admin_name=$cols['username'];
        $num=mysqli_num_rows($res);
        if ($num==1) {
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['email'] = $email;
          

            
            echo '<script type="text/javascript">
                        alert("login successful, welcome '.$admin_name.'");
                      </script>';
            header("location:dashboard.php");
        }else{?>
          <script type="text/javascript">
            alert("Invalid username or password");
          </script>


        <?php
            echo "<br>Login failed";
            header("refresh: 1.2, index.php");

        }
    }
} else {
    echo "attempting login []";
    echo "<br>Login failed : invalid data";
    header("refresh: 1.2, index.php");
}
 ?>