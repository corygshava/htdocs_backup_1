<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Clearing event session</title>
</head>
<body>
    <div class="serverlog">
        <!-- this basically just clears the curevent cookie -->
        <?php
            setcookie("curevent", "--", time() - 3600, "/");
            echo "<p>current event session cleared</p>";
            echo "redirecting....";
            header("refresh:1.4;index.php");
        ?>
        <p>go to <a href="index.php">Dash</a></p>
    </div>
</body>
</html>