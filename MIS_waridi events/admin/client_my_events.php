<?php
    $prefix = "../";
    include '../actions/checksession.php';
    include '../actions/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/eventer.css">

    <title>Available events</title>
</head>
<body>
    <header>
        <h1>Events you'll be attending</h1>
    </header>

    <div class="content">
        <div class="eventsholder">

<?php
    $sql = "SELECT eventid FROM bookings WHERE cname = '$curuser'";
    $res = $conn->query($sql);

    while($row = $res->fetch_assoc()){
        $getevent = "SELECT eventid,eventname,description,themecolor FROM events WHERE eventid = '{$row['eventid']}'";
        $res2 = $conn->query($getevent);
        $data = $res2->fetch_assoc();

        $eventid = $data['eventid'];
        $eventname = $data['eventname'];
        $description = $data['description'];
        $shorten = substr($description, 0,35);
        $themecolor = $data['themecolor'];


        echo "
            <a class=\"eventguy theme$themecolor\" href=\"eventdata.php?curevent=$eventid\">
                <div class=\"caption\">
                    <span class=\"heading\">$eventname</span>
                    <hr>
                    <p>$shorten ....</p>
                </div>
                <button class=\"w3-display-topright w3-black w3-hover-white w3-btn\"><b class=\"tag\">Attending</b></button>
            </a>
        ";
    }

?>
<!-- 
            <a class="eventguy theme1" href="eventdata.php">
                <div class="caption">
                    <span class="heading">Colors fest</span>
                    <hr>
                    <p>this is an event celebrating colors in all their glory ....</p>
                </div>
                <button class="w3-display-topright w3-black w3-hover-white w3-btn"><b class="tag">Attending</b></button>
            </a> -->
        </div>
    </div>
</body>
</html>