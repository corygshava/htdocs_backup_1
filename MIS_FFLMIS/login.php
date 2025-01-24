<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/iconic.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/new_styles.css">
    <link rel="stylesheet" href="css/common.css">

    <title>user login</title>

    <style>
        body{overflow:hidden !important;}
        .title{font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;}
    </style>
</head>
<body>
    <!-- <nav class="w3-bar w3-white w3-card">
        <a href="Javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a class="w3-bar-item pagetitle">login page</a>
    </nav> -->

    <!-- <video src="media/vids/pexels-marian-croitoru-6543307 (720p).mp4" class="custombg" autoplay loop></video> -->
    <!-- <img src="media/images/pexels-david-dibert-1117210.jpg" alt="" class="custombg"> -->

    <div class="w3-half side left">
        <header class="headingpanel w3-center w3-text-white">
            <h3 class="title w3-text-orange" data-value="Freight Forwarders Logistics Management System">---------------------------------------</h3>
            <b class="mytag w3-black w3-hide">User login</b>
        </header>

        <div class="tabbers w3-center">
            <button class="w3-btn thebtn active" onclick="switchTabs('.main', 0, '.thebtn')">log in</button>
            <button class="w3-btn thebtn" onclick="switchTabs('.main', 1, '.thebtn')">new account</button>
        </div>

        <!-- in case there was an error logging in -->
        <div class="main" id="olduser" style="padding: 12px 5px 150px 5px;">
            <div class="login_form w3-center floating-section w3-text-white">
                <div>
                    <h2><i class="icon icon-user"></i></h2>
                    <p class="logintext">Enter your details below to log in</p>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red w3-button"><b></b></span>
                </div>

                <form action="login_handler.php?act=login" class="w3-center myform" method="post">

                    <div class="input_holder">
                        <input type="text" name="username" placeholder="enter username here" required>
                    </div>

                    <div class="input_holder">
                        <input type="password" name="password" id="pw" placeholder="enter password here" required>
                    </div>

                    <div class="input_holder">
                        <button type="submit" class="w3-btn w3-hover-blue w3-black themebtn" onclick="registername()">login</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="main w3-hide" id="newuser" style="padding: 12px 5px 150px 5px;">
            <div class="login_form w3-center floating-section w3-text-white">
                <div>
                    <h2><i class="icon icon-user"></i></h2>
                    <p class="logintext">Enter your details below to sign up a new user</p>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red w3-button"><b></b></span>
                </div>

                <form action="login_handler.php?act=signup" class="w3-center myform" method="post">

                    <div class="input_holder">
                        <input type="text" name="username" placeholder="enter username here" required>
                    </div>

                    <div class="input_holder">
                        <input type="password" name="password" id="pww" placeholder="enter password here" required>
                    </div>
                    <div class="input_holder">
                        <input type="phoneContact" name="userphoneContact" placeholder="enter phone contact here" required>
                    </div>

                    <div class="input_holder">
                        <select name="userrole">
                            <option value="client">client</option>
                            <option value="Driver">Driver</option>
                        </select>
                    </div>

                    <div class="input_holder">
                        <button type="submit" class="w3-btn w3-hover-blue w3-black themebtn" onclick="registername()">login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

<script src="js/app.js"></script>
<script src="js/utility.js"></script>
<script>
    textfun(".title", 2);
    textfun(".logintext", 20);

    function registername() {
        let thenpt = document.forms[0].username;
        sessionStorage.setItem("currentUser",thenpt.value);
    }

    setbackgroundImage("");
</script>

<?php
    include("elements/errorbubble.php");
?>
</html>