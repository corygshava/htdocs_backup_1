<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Waridi events : sign up</title>
</head>
<body>
    <div class="content">
        <div class="login-container">
            <h2>Create new account</h2>
            <form action="actions/createaccount.php" method="post">
                <label for="utype">User type</label>
                <select name="utype">
                    <option value="event planner">Planner</option>
                    <option value="client">client</option>
                </select>
                <label for="uname">Username</label>
                <input name="uname" type="text" placeholder="enter Username here" required>
                <label for="ucontact">contact</label>
                <input name="ucontact" type="text" placeholder="enter phone number or email" required>
                <label for="upass">Password</label>
                <input name="upass" type="password" placeholder="enter Password here" required>
                <button type="submit">create account</button>
                <a href="login.php">log in</a>
            </form>
        </div>
    </div>
</body>
</html>
