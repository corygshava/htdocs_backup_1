<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Processing account creation</title>
</head>
<body>
    <div class="serverlog">

    <?php
        include 'connect.php';

        $thepage = "../newuser.php";

        if (isset($_POST['utype']) && isset($_POST['uname']) && isset($_POST['ucontact']) && isset($_POST['upass'])) {
            $utype = $_POST['utype'];
            $uname = $_POST['uname'];
            $ucontact = $_POST['ucontact'];
            $upass = $_POST['upass'];

            // Check if username already exists
            $sql = "SELECT * FROM users WHERE username = '$uname'";
            $result = $conn -> query($sql);

            if ($result->num_rows > 0) {
                echo "<p>'User already exists, try a different username</p>";
            } else {
                // Insert new user
                $thedate = date("d-m-y h:i:s");
                $insertSql = "INSERT INTO users (username, userpassword, usertype, usercontact, dateadded) VALUES ('$uname', '$upass','$utype','$ucontact', '$thedate')";
                if ($conn -> query($insertSql)) {
                    echo "<p>'User added successfully. Please log in using the entered details.</p>";
                    $thepage = "../login.php";
                    echo "<br>redirecting...";
                } else {
                    echo "<p>'Error adding user : " . $conn->error . "</p>";
                }
            }
        } else {
            echo "<p>'Invalid request : Please fill in all details</p>";
        }

        header("refresh: 4.5;$thepage");
        echo "redirecting...";
    ?>
    </div>
</body>
</html>