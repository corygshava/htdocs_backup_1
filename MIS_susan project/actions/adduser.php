<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../userslist.php';

    // Check if uname and upass are passed via POST
    if (isset($_POST['uname']) && isset($_POST['upass'])) {
        $uname = mysqli_real_escape_string($conn, $_POST['uname']);
        $upass = mysqli_real_escape_string($conn, $_POST['upass']);
        $thedate = date('Y-m-d H:i:s');

        // Check if the username already exists in the users table
        $query_check = "SELECT * FROM users WHERE username = '$uname'";
        $result_check = mysqli_query($conn, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            // Username already exists, inform the user
            $restxt = "Username already exists, please try a different one.";
        } else {
            // Username does not exist, insert new record
            $query_insert = "INSERT INTO users (Username, Password, Date_added) VALUES ('$uname', '$upass','$thedate')";
            if (mysqli_query($conn, $query_insert)) {
                // Inform the user of a successful registration
                $restxt = "User registered successfully.";
                $opres = 'true';
            } else {
                // Error inserting the new user
                $restxt = "There was an error registering the user.";
            }
        }
    } else {
        // POST variables not set
        $restxt = "Please provide both a username and password.";
    }

    $toredirect = isset($opres) ? '../userslist.php' : '../newuser.php';

    include '../elements/loader.php';
?>
