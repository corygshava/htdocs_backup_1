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

    <style>
        header{
            margin: 25px 5%;
        }
    </style>

    <title>Available events</title>
</head>
<body>
    
<?php
// Include the database connection file
include '../actions/connect.php';

// Check if the curevent parameter is set in the GET request
if (isset($_GET['curevent'])) {
    // Get the curevent (eventid) from the GET request
    $eventid = $_GET['curevent'];

    // Prepare the SQL statement to retrieve event information
    $sqlEventInfo = "SELECT * FROM events WHERE eventid = '$eventid'";

    // Execute the SQL statement
    $resultEventInfo = $conn->query($sqlEventInfo);

    if ($resultEventInfo->num_rows > 0) {
        // Fetch event data
        $eventInfo = $resultEventInfo->fetch_assoc();

        $eventid = $eventInfo['eventid'];
        $eventname = $eventInfo['eventname'];
        $eventdate = $eventInfo['eventdate'];
        $starttime = $eventInfo['starttime'];
        $endtime = $eventInfo['endtime'];
        $ticketcost = $eventInfo['ticketcost'];
        $description = $eventInfo['description'];
        $venue = $eventInfo['venue'];
        $themecolor = $eventInfo['themecolor'];
        $eventkey = $eventInfo['eventkey'];
        $eventcode = $eventInfo['eventcode'];
        $errortxt = "";
    } else {
        $errortxt = "No event found with the provided Event ID.";
    }
} else {
    $errortxt = "No Event ID provided.";
}

?>
    <header class="theme<?php echo $themecolor;?> roundsmall">
        <h1><?php echo $eventname;?></h1>
    </header>

    <div class="content">
        <hr>
        <div class="datasect">
            <div class="w3-row">
                <div class="w3-col m6">
                    <div>
                        <h3>event date</h3>
                        <p><?php echo $eventdate;?></p>
                    </div>
                    <div>
                        <h3>event duration</h3>
                        <p>starts at <b class="themetxt"><?php echo $starttime;?></b></p>
                        <p>ends at <b class="themetxt"><?php echo $endtime;?></b></p>
                    </div>
                </div>
                <div class="w3-col m6">
                    <div>
                        <h3>Venue</h3>
                        <p><?php echo $venue;?></p>
                    </div>
                    <div>
                        <h3>ticket price</h3>
                        <p><b><?php echo $ticketcost;?></b></p>
                    </div>

                    <div>
                        <h3>Event key</h3>
                        <p><b><?php echo $eventkey;?></b></p>
                    </div>
                </div>
            </div>
    
            <div>
                <h3>Description</h3>
                <p><?php echo $description;?></p>
            </div>
    
            <?php
                if($curusertype == 'client'){
                    $sql = "SELECT * FROM bookings WHERE eventid = '$eventid' AND cname = '$curuser'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0){
                        ?>
            <div class="options">
                <a href="client_my_events.php" class="theme<?php echo $themecolor;?>">event booked</a>
            </div>
                        <?php
                    } else {
            ?>
            <div class="options">
                <a href="worker_bookevent.php?eventid=<?php echo $eventid;?>" class="theme<?php echo $themecolor;?>">sign up</a>
            </div>

            <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>