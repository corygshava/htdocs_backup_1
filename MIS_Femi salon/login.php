<?php
    // Check if there is an 'error' parameter in the GET request
    if(isset($_GET['error'])){
        // Check if the error is 'login successful' or 'record added'
        if($_GET['error'] == "login successful" || $_GET['error'] == "Signup successful." ){
            ?>
                <!-- JavaScript code to redirect to 'dashboard.php' -->
                <script>
                    window.location.assign('dashboard.php');
                </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>login</title>

    <style>
        body{
            /* background-image: url("images/hero (3).jpg"); */
            background-position: top;
            background-attachment: fixed;
        }
        .content{
            padding: 20px 10px;
        }
    </style>
</head>
<body>
    <!-- Navigation bar --> 
    <div class="w3-bar w3-black w3-top nav w3-card-4">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.html" class="w3-bar-item w3-button w3-hover-text-blue">home</a>
        <a href="sessionBooking.html" class="w3-bar-item w3-button w3-hover-text-blue">book a session</a>
        <a href="contacts.html" class="w3-bar-item w3-button w3-hover-text-blue">contact us</a>
    </div>

    <div class="content">
    <?php
        // Check if the 'userdata' cookie is set
        if(isset($_COOKIE["username"])){
            ?>
                <!-- Display the logged-in user information -->
                <div class="headingpanel w3-center">
                    <!-- in case you have logged in -->
                    <b class="subtxt">Welcome <?php echo $_COOKIE['username'];?></b>
                    <p>you have already logged in</p>
                    <div class="w3-center">
                        <a onclick="changetype(0)" href="logout.php"class="w3-light-grey w3-button themebtn">logout</a>
                        <a onclick="changetype(1)" href="dashboard.php" class="w3-light-grey w3-button themebtn">dashboard</a>
                    </div>
                    <!-- what error happened -->
                </div>

            <?php
        } else {?>
    <div class="login-holder w3-container">
        <div class="w3-center">
            <h1>Welcome back</h1>
            <p>just sign in and we'll take care of the rest</p>
            <?php
                // Check if there is an 'error' parameter in the GET request
                if(isset($_GET["error"])){
                    echo '<span class="w3-tag w3-red"><b>ERROR : </b>'.$_GET['error'].'</span>';
                }
            ?>
        </div>

        <!-- a form for entering data -->
        <form class="inputs w3-card-4 w3-center" action="welcome.php" method="post">
            <div class="holder">
                <span>username</span>
                <input required type="text" name="username" id="npt_username" placeholder="enter username here"><br>
            </div>
            <div>
                <span>password</span><input required type="password" name="password" id="npt_username" placeholder="enter password here"><br>
                <input type="hidden" name="op" id="npt_op" value="login">
            </div>
            <a href="contacts.php?req=forgotpassword&word=i would like to reset my password" class="w3-text-blue">forgot password</a><br>
            <input type="submit" onclick="setval('#npt_op',this.value)" value="login" class="w3-button w3-black w3-hover-blue w3-round">
            <input type="submit" onclick="setval('#npt_op',this.value)" value="signup" class="w3-button w3-black w3-hover-blue w3-round">
        </form>
    </div>

        <?php }?>
    
    </div>

    <footer class="w3-padding-32 w3-black">
        <div class="w3-container">
            Femi.com
        </div>
    </footer>
</body>

<script>
    // JavaScript function to set the value of an input field
    function setval(who,what){
        document.querySelector(who).value = what;
    }
</script>
</html>
