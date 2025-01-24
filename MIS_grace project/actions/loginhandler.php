<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFS : login handler</title>
</head>
<body>
    <span>processing login</span>

    <?php
        include 'connect.php';

        if (isset($_POST['uname']) && isset($_POST['upass'])) {
            $uname = $_POST['uname'];
            $upass = $_POST['upass'];

            // Check if username exists
            $sql = "SELECT * FROM users WHERE username = '$uname'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                if ($row['userpassword'] === $upass) {
                    // echo "<script>alert('Login successful');</script>";
                    setcookie("curuser", $uname, time() + (86400 * 7), "/"); // 7 days expiry
                    setcookie("curusertype", $row['usertype'], time() + (86400 * 7), "/"); // 7 days expiry
                    // header('refresh: 2.5;../admin/');
                    $theloc = '../admin/';
                    $restext = 'login successful';
                    $processtxt = "attempting login";
                    include '../components/loader.php';
                    exit();
                } else {
                    echo "<script>alert('Incorrect password');</script>";
                }
            } else {
                echo "<script>alert('User not found');</script>";
            }
        } else {
            echo "<script>alert('Please fill in both username and password');</script>";
        }

        header('refresh: 2.5;../login.php');
        echo "<br>redirecting...";
    ?>

</body>
</html>