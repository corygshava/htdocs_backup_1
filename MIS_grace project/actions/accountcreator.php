<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFS : create account</title>
</head>
<body>
    <span>processing account creation</span>

    <?php
        include 'connect.php';

        if (isset($_POST['uname']) && isset($_POST['upass'])) {
            $uname = $_POST['uname'];
            $upass = $_POST['upass'];

            // Check if username already exists
            $sql = "SELECT * FROM users WHERE username = '$uname'";
            $result = $conn -> query($sql);

            if ($result->num_rows > 0) {
                echo "<script>alert('User already exists, try a different username');</script>";
            } else {
                // Insert new user
                $thedate = date("d-m-y h:i:s");
                $insertSql = "INSERT INTO users (usertype, username, userpassword, datecreated) VALUES ('sponsor', '$uname', '$upass', '$thedate')";
                if ($conn -> query($insertSql)) {
                    if (isset($_COOKIE['curusertype']) && $_COOKIE['curusertype'] == 'admin') {
                        echo "<script>alert('Record added successfully');</script>";
                        header('refresh: 2.5;../admin/');
                        echo "<br>redirecting...";
                        exit();
                    } else {
                        echo "<script>alert('User added successfully. Please log in using the entered details.');</script>";
                        header('refresh: 2.5;../login.php');
                        echo "<br>redirecting...";
                        exit();
                    }
                } else {
                    echo "<script>alert('Error adding user: " . $conn->error . "');</script>";
                }
            }
        } else {
            echo "<script>alert('Please fill in both username and password');</script>";
        }

        header('refresh: 2.5;../newuser.php');
        echo "redirecting...";
    ?>
</body>
</html>