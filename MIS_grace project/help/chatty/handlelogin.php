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
            // Check if password matches
            if ($row['userpassword'] === $upass) {
                echo "<script>alert('Login successful');</script>";
                setcookie("curuser", $uname, time() + (86400 * 30), "/"); // 30 days expiry
                setcookie("curusertype", $row['usertype'], time() + (86400 * 30), "/"); // 30 days expiry
            } else {
                echo "<script>alert('Incorrect password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    } else {
        echo "<script>alert('Please fill in both username and password');</script>";
    }
?>
