<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == "login successful" || $_GET['error'] == "record added" ){
            ?>
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
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>user login</title>
</head>
<body>
    
    <!-- in case there was an error logging in -->
    <div class="main" id="newuser">
        <?php 
            // checks if there is a user logged in
            if(isset($_COOKIE['username'])){
            ?>

            <div class="headingpanel w3-center">
                <span class="title">Eastleigh car hire</span><br>
                <b class="subtxt">Welcome <?php echo $_COOKIE['username'];?></b>
                <p>you have already logged in</p>
                <div class="w3-center">
                    <a onclick="changetype(0)" href="logout.php"class="w3-light-grey w3-button themebtn">logout</a>
                    <a onclick="changetype(1)" href="dashboard.php" class="w3-light-grey w3-button themebtn">dashboard</a>
                </div>
                <!-- what error happened -->
            </div>

            <?php
            } else {
        ?>
        <div class="headingpanel w3-center">
            <span class="title">Eastleigh car hire</span><br>
            <b class="subtxt">Welcome user</b>
            <p>please log in to access our services</p>
            <!-- what error happened -->
            <?php if(isset($_GET['error'])){
                $error = $_GET['error'];
                echo '<span class="errtext w3-text-red w3-button"><b>Error : </b>',$error,'</span>';}?>
        </div>

        <div class="w3-center">
            <a onclick="changetype(0)" class="formbtns w3-btn themebtn w3-hover-blue w3-blue">i am a New user</a>
            <a onclick="changetype(1)" class="formbtns w3-btn themebtn">i have an account</a>
        </div>
        <div class="inputs1">
            <form action="login_handler.php" class="w3-center myform" method="post">
                <input type="hidden" name="op" value="signup">
                <input type="text" name="username" placeholder="enter username here" required>
                <input type="password" name="password" id="" placeholder="enter password here" required>
                <button type="submit" class="w3-btn w3-hover-blue w3-light-grey themebtn">submit data</button>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
</body>

<script src="js/app.js"></script>
<script>
    function changetype(n) {
        let theval = n == 1 ? "login" : "signup";
        console.log(theval);

        for (let x = 0; x < formbtns.length; x++) {
            formbtns[x].className = "formbtns w3-btn themebtn";
        }

        formbtns[n].className += " w3-blue";
        document.forms[0].op.value = theval;
        document.forms[0].querySelector("button").innerText = "click here to "+ theval;
    }

    changetype(0);
</script>
</html>