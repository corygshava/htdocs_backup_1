<?php
    // Check if there is an 'error' parameter in the GET request
    if(isset($_GET['response'])){
        // Check if the error is 'login successful' or 'record added'
        if($_GET['response'] == "login successful" || $_GET['response'] == "Signup successful." ){
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
        .holder input{
            padding: 12px;
            width:70%;
            margin:12px 0;
        }
    </style>
</head>
<body>
    <?php
        // Check if the 'userdata' cookie is set
        if(isset($_COOKIE["username"])){
            ?>
                <!-- Display the logged-in user information -->
                <div class="headingpanel w3-center">
                    <!-- in case you have logged in -->
                    <b class="subtxt"><?php echo $_COOKIE['username'];?></b>
                    <p>has already logged in</p>
                    <div class="w3-center">
                        <a href="dashboard.php"class="w3-light-grey w3-button themebtn w3-blue">your dashboard</a>
                        <a href="logout.php"class="w3-light-grey w3-button themebtn w3-blue">logout</a>
                    </div>
                    <!-- what error happened -->
                </div>

            <?php
        } else {?>
    <div class="theform w3-container">
        <div class="w3-center">
            <h1>Teachers sign in</h1>
            <?php
                // Check if there is an 'error' parameter in the GET request
                if(isset($_GET['response'])){
                    echo '<span class="w3-tag w3-red"><b>ERROR : </b>'.$_GET['response'].'</span>';
                }
            ?>
        </div>

        <!-- a form for entering data -->
        <form class="w3-padding-32 w3-center" action="logincode.php" method="post">
            <div class="holder">
                <input required type="text" name="username" id="npt_username" placeholder="enter username here"><br>
            </div>
            <div class="holder w3-hide">
                <select name="student_class" required onchange="changefee(this.value);">
                    <option value="form 1" name="item1" data-price="15000" selected>form 1</option>
                    <option value="form 2" name="item2" data-price="20000">form 2</option>
                    <option value="form 3" name="item3" data-price="25000">form 3</option>
                    <option value="form 4" name="item4" data-price="30000">form 4</option>
                </select>
            </div>
            <div class="holder">
                <input required type="password" name="password" id="npt_username" placeholder="enter password here"><br>
                <input type="hidden" name="operation" id="npt_op" value="login">
                <input type="hidden" name="usertype" id="npt_op" value="teacher">
            </div>
            <input type="submit" onclick="setval('#npt_op','signup')" value="add account" class="w3-button w3-grey w3-hover-blue">
            <input type="submit" onclick="setval('#npt_op','login')" value="log in" class="w3-button w3-grey w3-hover-blue">
            <br>
            <!-- <a href="contacts.php?req=forgotpassword&word=i would like to reset my password" class="w3-text-blue">forgot password</a><br> -->
        </form>
    </div>

        <?php }?>
</body>

<script>
    // JavaScript function to set the value of an input field
    function setval(who,what){
        document.querySelector(who).value = what;
    }
</script>
</html>
