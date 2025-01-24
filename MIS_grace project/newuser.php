<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Form</title>
</head>
<body>
    <div class="content">
        <div class="login-container">
            <h1>Create Account</h1>
            <hr>
            <p>enter details to add account</p>
            <form action="actions/accountcreator.php" method="post">
                <input type="hidden" name="usertype" value="sponsor">
                <input type="text" name="uname" placeholder="Username" required>
                <input type="password" name="upass" placeholder="Password" required>
                <button type="submit">add account <i class="fa fa-send"></i></button>
                <a href="login.php" class="themelink">i have an account</a>
            </form>
        </div>
    </div>
    
    <?php
    include 'components/footer.php';
    ?>
</body>
</html>
