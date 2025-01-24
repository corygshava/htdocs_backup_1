<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/new_styles.css">
    <link rel="stylesheet" type="text/css" href="css/iconic.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
    <title>login handler</title>
</head>
<body>


<?php
    require "actions/functions.php";

    // redirects if there is no input to process

    if(!(isset($_GET["act"]))){
            ?>
                <script>location.assign("index.php");</script>
            <?php
            exit;
        }
    ?>

    <?php
        $errorText = "none";
        $logtxt = "";
        $thepage = "login.php";

        $task = $_GET["act"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $usercontact = "";
        $usertype = "";
        if(isset($_POST["userphoneContact"])){$usercontact = $_POST["userphoneContact"];}
        if(isset($_POST["userrole"])){$usertype = $_POST["userrole"];}


        $logtxt = $logtxt."<span>processing <b>$task</b> operation </span><br>";

        $totalrows = 0;
        $record;

        if($task == "signup"){
            $logtxt = $logtxt."<span>processing signup</span><br>";

            $logtxt = $logtxt."beginning signup procedure<br>";

            $myop = "SELECT * FROM users WHERE username='".$username."'";
            $showresult = false;

            $logtxt = $logtxt."<br>";

            include('actions/getdata.php');

            if($result->num_rows == 0){
                $myop = "INSERT INTO users (ID, username, password, contact, usertype) VALUES (NULL, '$username', '$password', '$usercontact', '$usertype') ";
                $result = $mysqli -> query($myop);

                startsession($username,$usertype);
            } else {
                $errorText = "username already exists, log in instead";
            }

            /* checks if there is a record with the provided username
            if there is, return to login with a get member error="username already exists"
            if there isnt, add a new user record and set session cookie for currentuser and usertype*/
        } else {
            $logtxt = $logtxt."processing login <br>";

            // check in users' table

            $myop = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $showresult = false;
            include('actions/getdata.php');

            if($result->num_rows != 0){
                $errorText = "none";

                if ($result->num_rows > 0) {
                    // Fetch the result into an associative array
                    $row = $result->fetch_assoc();
                    $usertype = $row["usertype"];
                }
            } else {
                $errorText = "invalid details, please try again";
            }
        }

        if($errorText == "none"){
            $logtxt = $logtxt."$task successful <br>";

            startsession($username,$usertype);
            $thepage = "dashboard.php?notify=login successful&thetype=good";
        } else {
            $logtxt = $logtxt."$task unsuccessful <br>";

            $thepage = "login.php?notify=$errorText&thetype=error";
        }

        include 'utility/loader.php';
    ?>
</body>

<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript">
	thelocation = "<?php echo $thepage?>";

	loader();
</script>

</html>