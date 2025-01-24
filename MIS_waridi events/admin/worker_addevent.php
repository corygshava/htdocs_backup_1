<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<?php
    // Include the database connection file
    include '../actions/connect.php';

    // Function to generate a random 4-letter string
    function generateRandomString($length = 4) {
        return substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890', ceil($length/strlen($x)) )),1,$length);
    }

    // Check if all required POST variables are set
    if (isset($_POST['eventname']) && isset($_POST['eventdate']) && isset($_POST['starttime']) &&
        isset($_POST['endtime']) && isset($_POST['ticketprice']) && isset($_POST['description']) &&
        isset($_POST['venue']) && isset($_POST['themecolor'])) {
        
        // Assign POST variables to PHP variables
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $ticketprice = $_POST['ticketprice'];
        $description = $_POST['description'];
        $venue = $_POST['venue'];
        $themecolor = $_POST['themecolor'];
        
        // Generate random strings for eventkey and eventcode
        $eventkey = generateRandomString();
        $eventcode = generateRandomString();

        // Prepare and execute the SQL statement
        $sql = "INSERT INTO events (eventname, eventcreator, eventdate, starttime, endtime, ticketcost, description, venue, themecolor, eventkey, eventcode) 
                VALUES ( '$eventname', '$curuser', '$eventdate', '$starttime', '$endtime', '$ticketprice', '$description', '$venue', '$themecolor', '$eventkey', '$eventcode')";
        if ($conn->query($sql)) {
            echo "Event added successfully.";
        } else {
            echo "Error: Could not execute query: $conn->error";
        }
    } else {
        echo "Error: All required fields must be provided.";
    }

    header("refresh: 2.5; index.php");
?>
