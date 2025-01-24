<?php
// Check if the cookie named "username" is set
if (isset($_COOKIE['username'])) {
    // Set the cookie value as the desired username
    $desiredUsername = $_COOKIE['username'];
    
    // Include the userdata.php file
    include('userdata.php');
} else {
    // Notify the user
    echo "Cookie 'username' is not set. Please login first.<br>redirecting to login<br>";
    
    // Redirect to login.php after 5 seconds
    sleep(5);
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* enables items to have round corners */
        .round{
            border-radius:12px;
        }

        iframe{
            width:100%;
            height: 360px;
            max-height: 720px;
        }
    </style>
    <title>user dashboard</title>
</head>
<body>
    <!-- Navigation bar -->
    <div class="w3-bar w3-black nav w3-card-4">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.php" class="w3-bar-item w3-button w3-text-blue active">your dashboard</a>
        <a href="index.php" class="w3-bar-item w3-button w3-hover-text-blue">home</a>
        <a href="sessionBooking.php" class="w3-bar-item w3-button w3-hover-text-blue">book a session</a>
        <a href="contacts.php" class="w3-bar-item w3-button w3-hover-text-blue">contact us</a>
    </div>

    <header class="w3-container w3-center w3-padding-32 w3-light-grey"> 
        <h1><b>WELCOME : <?php echo $desiredUsername?></b></h1>
        <p>Welcome to your dashboard (currently viewing as )<span class="w3-tag"><?php $desiredUsername=$_COOKIE['username'];include('userdata.php');echo $storedUserRole;?></span></p>
    </header>

    <div class="w3-container">


    <?php if($storedUserRole == "customer"){?>
    <div class="w3-container w3-center w3-padding-32" id="useractions">
            <h2>actions</h2>
            <div class="w3-bar round w3-card">
                <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey active" href="sessionbooking.php">book session</a>
                <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="logout.php">logout</a>
                <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="contacts.php">send feedback</a>
                <!-- <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="#about">About</a> -->
            </div>
        </div>
        <h1 class="w3-center">Your sessions</h1>
        <iframe src="iframes/customerinterface.php" frameborder="0"></iframe>

    </div>

    <?php
        } else if($storedUserRole == "worker"){
    ?>
        <div class="w3-container w3-center w3-padding-32" id="useractions">
            <h2>actions</h2>
            <div class="w3-bar round w3-card">
                <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="logout.php">logout</a>
                <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="contacts.php">send feedback</a>
            </div>
        </div>
        <h1 class="w3-center">todays sessions</h1>
        <iframe src="iframes/workerinterface.php" frameborder="0"></iframe>

    </div>
    <?php
        } else if($storedUserRole == "admin"){
    ?>

    <!-- admin interface code -->

    <div class="w3-container w3-center w3-padding-32" id="useractions">
        <h2>actions</h2>
        <div class="w3-bar round w3-card">
            <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="logout.php">logout</a>
            <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="sessionbooking.php">test session booking</a>
            <a class="w3-bar-item w3-hover-light-grey w3-button w3-grey " href="contacts.php">test feedback system</a>
        </div>
    </div>

    <h1 class="w3-center">your interface</h1>
    <iframe src="iframes/admininterface.php" frameborder="0" class="w3-border w3-border-grey"></iframe>
    <?php
        }
    ?>

    </div>
    <footer class="w3-padding-32 w3-black">
        <div class="w3-container">
            Femi.com
        </div>
    </footer>
</body>
</html>