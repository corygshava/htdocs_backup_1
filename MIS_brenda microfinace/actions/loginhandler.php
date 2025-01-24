<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/styles.css">

    <title>Dashboard</title>
</head>
<body>

<?php
    // Include the database connection file
    include "connect.php";

    $mymsg = "";

    // Check if username, password, and usertype are set and not empty
    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['usertype']) && !empty($_POST['usertype'])) {

        // Sanitize input
        $username = $conn->real_escape_string($_POST['username']);
        $password = $conn->real_escape_string($_POST['password']);
        $usertype = $conn->real_escape_string($_POST['usertype']);

        echo "trying to log in as <b>$usertype</b>";
        
        // Initialize variables for current user and user type
        $current_username = "";
        $current_usertype = "";

        // Check user type
        if ($usertype == "client") {
            // Check if the entered username and password exist in the customers table
            $sql = "SELECT * FROM customers WHERE custname='$username' AND custpassword='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                // Set cookies for current username and user type
                $current_username = $username;
                $current_usertype = "client";

                // set login cookies
                setcookie("curusername", $current_username, time() + (86400 * 30), "/"); // 86400 = 1 day
                setcookie("curusertype", $current_usertype, time() + (86400 * 30), "/"); // 86400 = 1 day

                echo '<script>alert("Login successful.");</script>';
            } else {
                $sql = "SELECT * FROM customers WHERE custname='$username'";
                $result = $conn->query($sql);

                if($result->num_rows != 0){
                    $mymsg = "wrong password";
                } else {
                    $mymsg = "username not found";
                }

                echo '<script>alert("'.$mymsg.'");</script>';
            }
        } elseif ($usertype == "administrator") {
            // Check if the entered username and password exist in the users table
            $sql = "SELECT * FROM users WHERE username='$username' AND userpassword='$password'";
            $result = $conn->query($sql);

            if($result){
                if ($result->num_rows == 1) {
                    // Set cookies for current username and user type
                    $current_username = $username;
                    $current_usertype = "administrator";
                    setcookie("curusername", $current_username, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("curusertype", $current_usertype, time() + (86400 * 30), "/"); // 86400 = 1 day
                    echo '<script>alert("Login successful.");</script>';
                }
            } else {

                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = $conn->query($sql);

                if($result->num_rows != 0){
                    $mymsg = "wrong password";
                } else {
                    $mymsg = "username not found";
                }

                echo '<script>alert("'.$mymsg.'");</script>
                <br>you can <a href="../index.php" class="w3-text-blue">retry logging in</a>';
                exit();
            }
        } else {
            echo '<script>alert("Invalid user type.");</script>';
        }
    } else {
        echo '<script>alert("Error: Please provide username, password, and user type.");</script>';
    }

    // Close connection
    $conn->close();

    header('refresh: 2.1 ../index.php');
    echo "<br>redirecting in 2 seconds";
?>

</body>
</html>