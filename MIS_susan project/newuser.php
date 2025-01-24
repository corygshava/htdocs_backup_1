<?php
	include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">

	<title>new user</title>
</head>
<body>
    <?php
    	include 'elements/navbar.php';
    ?>

    <div class="formholder">
        <div class="theform">
            <h1 class="w3-center">Add new user</h1>
            <form action="actions/adduser.php" method="post">
                <div class="flexresponsive row">
                    <div class="mobi">
                        <div class="npt">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" id="uname" placeholder="enter your Username here">
                        </div>
                    </div>
                    <div class="mobi">
                        <div class="npt">
                            <label for="upass">password</label>
                            <input type="password" name="upass" id="upass" placeholder="enter the password here">
                        </div>
                    </div>
                </div>
                <div class="w3-center container">
                    <button class="themebtn">add user <i class="fa fa-send"></i></button>
                </div>
            </form>
        </div>
    </div>

    <?php
        include 'elements/footer.php';
    ?>

</body>
</html>