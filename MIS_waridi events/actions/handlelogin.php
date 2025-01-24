<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Processing login</title>
</head>
<body>
    <div class="serverlog">
    <?php
        include 'connect.php';

        $theloc = "../login.php";

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
                    echo "<p>$restext</p>";
                } else {
                    echo "<p>Incorrect password</p>";
                }
            } else {
                echo "<p>User not found</p>";
            }
        } else {
            echo "<p>Please fill in both username and password</p>";
        }

        header("refresh: 3.5;$theloc");
        echo "<br>redirecting...";
    ?>
    </div>
</body>
</html>