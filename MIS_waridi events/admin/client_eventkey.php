<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/eventer.css">
    <link rel="stylesheet" href="../css/login.css">

    <title>Available events</title>
</head>
<body>
    <div class="content" style="padding: 0;">
        <div class="login-container" style="margin: 12px 0;">
            <h2>Enter event key</h2>
            <p>Enter the key to find the event</p>
            <form action="client_findevent.php" method="post">
                <label for="Ekey">Event key</label>
                <input name="Ekey" type="text" placeholder="enter the key here" required>
                <button type="submit">find event</button>
            </form>
        </div>
    </div>
</body>
</html>