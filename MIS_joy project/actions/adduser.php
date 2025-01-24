<?php
    // Include the file that handles database connection
    include 'connect.php';

    $thepage = "../newuser.php";

    // Check if username and password are sent via POST
    if(isset($_POST['thename']) && isset($_POST['thepassword'])) {
        // Sanitize input to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $_POST['thename']);
        $password = mysqli_real_escape_string($conn, $_POST['thepassword']);
        $today = date('y-m-d h:i:s');
        
        // Check if the username already exists in the users table
        $check_query = "SELECT * FROM users WHERE username = '$username'";
        $check_result = mysqli_query($conn, $check_query);
        
        if(mysqli_num_rows($check_result) > 0) {
            // Username already exists, inform the user
            echo "Username already exists. Please try a different username.";
        } else {
            // Username doesn't exist, insert the new record
            $insert_query = "INSERT INTO users (username, userpassword,datecreated) VALUES ('$username', '$password','$today')";
            if(mysqli_query($conn, $insert_query)) {
                // Insert successful, inform the user
                echo "User successfully added.";
                $thepage = "../listusers.php";
            } else {
                // Insert failed, inform the user
                echo "Error: " . mysqli_error($conn);
            }
        }
    } else {
        // Username or password not provided via POST, inform the user
        echo "Username and password are required.";
    }

    // Close the database connection
    mysqli_close($conn);

    include 'smartredirect.php';
?>
