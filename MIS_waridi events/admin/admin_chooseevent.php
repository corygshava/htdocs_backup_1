<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Selecting event</title>
</head>
<body>
    <div class="serverlog">
        <!-- this basically just sets the curevent cookie -->

        <?php
            if(isset($_GET['eventid'])){
                include '../actions/connect.php';
                $curevent = $_GET['eventid'];
                setcookie("curevent", "$curevent", time() + (3600 * 24 * 30), "/");

                $getname = "SELECT eventname FROM events WHERE eventid = $curevent";
                $result = $conn->query($getname);
                $row = $result->fetch_assoc();
                $evname = $row['eventname'];

                echo "<p>chosen event : <b>$evname</b></p>";
                echo "redirecting";
            } else {
                echo '<p>go to <a href="index.php">Dash</a></p>';
            }

            header("refresh: 1.5; index.php");
        ?>
    </div>
</body>
</html>