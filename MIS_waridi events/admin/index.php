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
    <link rel="stylesheet" href="../css/dash.css">
    <link rel="stylesheet" href="../css/eventer.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <title>User dashboard</title>
</head>
<body>
    <?php
        if($curusertype == "client"){
    ?>
    <!-- client / attendee dashboard -->

    
    <nav class="w3-bar w3-text-white containerbg">
        <a class="" href="#">
            <i class="fa fa-dashboard"></i>
            <b>Client Dashboard</b>
        </a>

        <a href="#" class="w3-right">
            <b><i style="font-family: cursive !important;">Waridi Event Management system</i></b>
        </a>
    </nav>

    <div class="content">
        <div class="w3-row">
            <div class="w3-col m3 menubar">
                <header class="themebg">
                    <h2>Welcome <b><?php echo $curuser;?></b></h2>
                    <b><?php echo $curusertype?></b>
                </header>

                <div class="sidepanel">
                    <h4>Menu</h4>
                    <a href="#" onclick="switchcats(0,this.dataset.destination,'')" data-destination="client_list_events" class="current">Available events</a>
                    <a href="#" onclick="switchcats(1,this.dataset.destination,'')" data-destination="client_my_events">My events</a>
                    <a href="#" onclick="switchcats(2,this.dataset.destination,'')" data-destination="client_eventkey">Enter event key</a>
                    <a href="logout.php">logout</a>
                </div>
            </div>
            <div class="w3-col m9 contentbar">
                <iframe class="theframe" src="client_list_events.php" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    

    <?php
        } else {
            $sql = "SELECT eventname FROM events WHERE eventid = '$curevent'";
            $res = $conn->query($sql);
            $row = $res->fetch_assoc();
            $eventname = $row['eventname'];
    ?>
    <!-- event planner dashboard -->

    <nav class="w3-bar w3-text-white containerbg">
        <a class="" href="#">
            <i class="fa fa-dashboard"></i>
            <b>Planner Dashboard</b>
        </a>

        <a href="#" class="w3-right">
            <b><i style="font-family: cursive !important;">Waridi Event Management system</i></b>
        </a>
    </nav>

    <div class="content">
        <!-- if no event has been chosen -->

        <?php
            if($curevent == ''){
        ?>

        <div class="eventor w3-center w3-hided">
            <h2>Select event</h2>

            <div class="eventoptions">
                <a class="themebtn" href="admin_newevent.php">New event</a>
            </div>

            <div class="eventsholder">
                <?php
                    include '../components/listevents.php';
                ?>
            </div>
        </div>

        <?php
            } else {
        ?>

        <div class="w3-row">
            <div class="w3-col m3 menubar">
                <header class="themebg">
                    <h2>Welcome <b><?php echo $curuser;?></b></h2>
                    <b>Event planner</b>
                    <hr>
                    <p>
                        current event :<br>
                        <b><?php echo $eventname;?></b>
                    </p>
                </header>

                <div class="sidepanel">
                    <h3>Options</h3>
                    <a href="admin_clearevent.php" onclick="switchcats(0,this.dataset.destination,'')" data-destination="client_list_events">clear event session</a>
                    <a href="#" onclick="switchcats(1,this.dataset.destination,'curevent=<?php echo $curevent;?>')" data-destination="eventdata" class="current">event info</a>
                    <h4>Performers</h4>
                    <a href="#" onclick="switchcats(2,this.dataset.destination,'')" data-destination="view_performers">view performers</a>
                    <a href="#" onclick="switchcats(3,this.dataset.destination,'')" data-destination="add_performer">add performers</a>
                    <h4>vendors</h4>
                    <a href="#" onclick="switchcats(4,this.dataset.destination,'')" data-destination="view_vendors">view vendors</a>
                    <a href="#" onclick="switchcats(5,this.dataset.destination,'')" data-destination="add_vendor">add vendor</a>
                    <h4>tasks</h4>
                    <a href="#" onclick="switchcats(6,this.dataset.destination,'')" data-destination="view_tasks">view tasks</a>
                    <a href="#" onclick="switchcats(7,this.dataset.destination,'')" data-destination="add_task">add task</a>
                    <h4>Attendees</h4>
                    <a href="#" onclick="switchcats(8,this.dataset.destination,'')" data-destination="view_attendees">view attendees</a>
                    <!-- <h4>Feedback records</h4>
                    <a href="#" onclick="switchcats(9,this.dataset.destination,'')" data-destination="view_feedback">view feeback records</a> -->
                    <h4>Account options</h4>
                    <a href="logout.php">logout</a>
                </div>
            </div>
            <div class="w3-col m9 contentbar">
                <iframe class="theframe" src="client_list_events.php" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <?php
            }
        }
    ?>
    <!-- common stuff -->
    
    <script src="../js/dashboard.js"></script>
    <script>
        setframeHeight();

        switchcats(2,'view_performers','');
    </script>
</body>
</html>