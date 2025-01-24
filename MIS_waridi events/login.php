<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Waridi events : login</title>
</head>
<body>
    <div class="content">
        <div class="login-container">
            <h2>User Login</h2>
            <form action="actions/handlelogin.php" method="post">
                <label for="uname">Username</label>
                <input name="uname" type="text" placeholder="enter Username here" required>
                <label for="upass">Password</label>
                <input name="upass" type="password" placeholder="enter Password here" required>
                <button type="submit">Login</button>
                <a href="newuser.php">create account</a>
            </form>
        </div>
    </div>
</body>
</html>
