<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        /* enables items to have round corners */
        .round{
            border-radius:12px;
        }

        iframe{
            width:100%;
            height: 360px;
            max-height: 720px;
        }
    </style>
    <title>user dashboard</title>
</head>
<body>

    <!-- Navigation bar -->
    <div class="w3-container w3-padding-32 w3-center">
        <div class="w3-bar round w3-card">
            <a class="w3-bar-item w3-hover-blue w3-button w3-black w3-padding-32" href="admin_sessionmanager.php?key=123">session managements</a>
            <a class="w3-bar-item w3-hover-blue w3-button w3-black w3-padding-32" href="admin_usermanager.php?key=123">user management</a>
            <a class="w3-bar-item w3-hover-blue w3-button w3-black w3-padding-32" href="admin_workermanager.php?key=123">worker management</a>
            <a class="w3-bar-item w3-hover-blue w3-button w3-black w3-padding-32" href="admin_feedbackmanager.php?key=123">feedback management</a>
        </div>
    </div>
</body>
</html>