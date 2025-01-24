<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/w3.css">
    <title>Homepage</title>
</head>
<body>
    <div class="w3-bar w3-black w3-top nav w3-card-4">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.php" class="w3-bar-item w3-button w3-hover-text-blue active w3-text-blue">home</a>
        <a href="sessionBooking.php" class="w3-bar-item w3-button w3-hover-text-blue">book a session</a>
        <a href="contacts.php" class="w3-bar-item w3-button w3-hover-text-blue">contact us</a>
    </div>

    <header class="w3-dark-grey w3-display-container">
        <img src="images/hero (3).jpg" alt="banner image" style="width:100%;" class="w3-animate-opacity">
        <div class="w3-display-middle overlay">
            .
        </div>
        <div class="w3-display-middle">
            <span class="huge fancy">Femi Salon</span>
        </div>
    </header>

    <div class="main">
        <?php
        if(isset($_COOKIE['username'])){
            // this redirects to the dashboard in 5 seconds
            header("Refresh:5; url = dashboard.php");
            ?>
                <div class="w3-container w3-padding-32"><span>redirecting you to your dashboard</span></div>
            <?php
        } else {?>
        <div class="headingpanel w3-center">
            <h1>welcome</h1>
            <p>it appears you arent logged in. Once you log in we can begin finding out how best to serve you</p>

            <div class="buttons">
                <a href="login.php" class="w3-black w3-round w3-btn w3-hover-blue">Log in</a>
                <a href="login.php" class="w3-black w3-round w3-btn w3-hover-blue">Sign up</a>
            </div>
        </div>
        <?php } ?>
    </div>

    <footer class="w3-black w3-padding-64">

    </footer>
</body>
</html>