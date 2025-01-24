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
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/eventer.css">
    <link rel="stylesheet" href="../css/forms.css">

    <title>New event</title>
</head>
<body>

    <?php
        include '../actions/connect.php';

        $curevent = isset($curevent) ? $curevent : 0;
        $getdata = "SELECT starttime,endtime FROM events WHERE eventid = '$curevent'";
        $result = $conn->query($getdata);
        $row = $result->fetch_assoc();
        $starttime = $row['starttime'];
        $endtime = $row['endtime'];
    ?>


    <div class="content">
        <div class="formholder">
            <div class="heading w3-center">
                <h2>Add new performer</h2>
                <p>Enter details to register a new performer</p>
                <hr>
            </div>
            <form class="theform" action="worker_addperformer.php" method="post">
                <div class="w3-center">
                    <p>keep in mind the current event goes from <b><?php echo $starttime;?></b> up to <b><?php echo $endtime;?></b></p>
                </div>
                
                <div class="w3-row">
                    <div class="w3-col m6">
                        <div>
                            <label for="name">name</label><br>
                            <input type="text" name="name" placeholder="enter performer name" required>
                        </div>
                        <div>
                            <label for="role">role</label><br>
                            <input type="text" name="role" placeholder="What will the performer do" required>
                        </div>
                    </div>
                    <div class="w3-col m6">
                        <div>
                            <label for="starttime">shift start</label><br>
                            <input type="time" name="starttime" placeholder="performance start" required>
                        </div>
                        <div>
                            <label for="endtime">shift end</label><br>
                            <input type="time" name="endtime" placeholder="performance end" required>
                        </div>
                    </div>
                </div>

                <div class="buttons w3-center">
                    <button class="themebtn" type="submit">add performer</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>