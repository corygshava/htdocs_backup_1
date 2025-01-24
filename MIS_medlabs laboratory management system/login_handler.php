<?php
    require "actions/functions.php";

    // redirects if there is no input to process

    if(!(isset($_POST["operation"]))){
        ?>
            <script>location.assign("index.php");</script>
        <?php
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login handler</title>
</head>
<body>


    <?php
        $errorText = "none";
        $usertype = "lab technician";
        $task = $_POST["operation"];
        $enteredUsername = $_POST["username"];
        $enteredPassword = $_POST["password"];

        echo "$enteredUsername and [$enteredPassword]";

        echo "processing <b>$task</b> operation <br>";

        $totalrows = 0;
        $record;

        if($task == "signup"){
            echo "processing signup<br>";

            echo "beginning signup procedure<br>";
            $myop = "SELECT * FROM users WHERE username='".$enteredUsername."'";
            $showresult = true;
            echo $myop."<br>";

            echo "running getter code<br>";

            include('actions/getdata.php');

            if($result->num_rows == 0){
                $myop = "INSERT INTO users (Userid, Username, Password, Usertype) VALUES (NULL, '$enteredUsername', '$enteredPassword', 'normal')";
                $result = $mysqli -> query($myop);

                startsession($enteredUsername,$usertype);
            } else {
                $errorText = "username already exists, log in instead";
            }

            /* checks if there is a record with the provided username
            if there is, return to login with a get member error="username already exists"
            if there isnt, add a new user record and set session cookie for currentuser and usertype*/
        } else {
            echo "processing login <br>";

            // check in users' table

            $myop = "SELECT * FROM users WHERE username='$enteredUsername' AND password='$enteredPassword'";
            $showresult = false;
            include('actions/getdata.php');

            if($result->num_rows != 0){
                $errorText = "none";
            } else {
                $errorText = "invalid details, please try again";
            }

            // check in doctors' table

            if($errorText != "none"){
                $usertype = "doctor";

                $myop = "SELECT * FROM doctors WHERE DoctorName='$enteredUsername' AND password='$enteredPassword'";
                $showresult = false;
                include('actions/getdata.php');

                if($result->num_rows == 0){
                    $errorText = "invalid credentials, please try again";
                } else {
                    $errorText = "none";
                }
            }
        }

        if($errorText == "none"){
            echo "$task successful <br>";

            if($enteredUsername == "admin"){$usertype = "admin";}
            startsession($enteredUsername,$usertype);
            header("Refresh:1.2; url = dashboard/");
        } else {
            echo "$task unsuccessful <br>";

            header("Refresh:1.2; url = login.html?error=$errorText");
            exit;
        }
    ?>


</body>
</html>