<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <title>CFS : login</title>
</head>
<body>
    <div class="content">
        <div class="login-container">
            <h1>System Login</h1>
            <hr>
            <p>enter details to Login</p>
            <form action="actions/loginhandler.php" method="post">
                <input type="hidden" name="usertype" value="sponsor">
                <input type="text" name="uname" placeholder="Username" required>
                <input type="password" name="upass" placeholder="Password" required>
                <button type="submit">Login</button>
                <a href="newuser.php" class="themelink">make a new account</a>
            </form>
        </div>
    </div>

    <?php
    include 'components/footer.php';
    ?>
</body>
</html>
