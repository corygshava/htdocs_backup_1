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
    <div class="backbtn w3-right"><a class="w3-btn w3-black" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> back</a></div>


<?php
    /*
        considering{
            connect.php is one folder up
            table sessions has the fields(sessionid	userid	user_contact	session_date	session_state	session_price	session_service	session_verification_code	session_servicer 	)
            the table element has the classname "w3-table w3-bordered"
        }
        check if there is a get member variable called 'key' and if its set to '123'
        if it is{
            open a table called sessions and display all the records where session_state is set to 'pending' in a table like manner
            if there is none print a message accordingly
            print a line break
            open a table called sessions and display all the records where session_state is set to 'verified' in a table like manner
            if there is none print a message accordingly
            print a line break
            open a table called sessions and display all the records where session_state is set to 'serviced' in a table like manner
            if there is none print a message accordingly
        }
        otherwise{
            print error message
        }
    */
?>


<?php
require_once '../connect.php'; // Include the connect.php file

if (isset($_GET['key']) && $_GET['key'] === '123') {
    // Fetch records from the sessions table with session_state = 'pending'
    $pendingSql = "SELECT * FROM sessions WHERE session_state = 'pending'";
    $pendingResult = $conn->query($pendingSql);

    // Fetch records from the sessions table with session_state = 'verified'
    $verifiedSql = "SELECT * FROM sessions WHERE session_state = 'verified'";
    $verifiedResult = $conn->query($verifiedSql);

    // Fetch records from the sessions table with session_state = 'serviced'
    $servicedSql = "SELECT * FROM sessions WHERE session_state = 'serviced'";
    $servicedResult = $conn->query($servicedSql);

    echo '<h2>Pending Sessions</h2>';
    if ($pendingResult && $pendingResult->num_rows > 0) {
        echo '<table class="w3-table w3-bordered">';
        echo '<tr><th>Session ID</th><th>User ID</th><th>User Contact</th><th>Session Date</th><th>Session State</th><th>Session Price</th><th>Session Service</th><th>Session Verification Code</th><th>Session Servicer</th></tr>';

        while ($row = $pendingResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['sessionid'] . '</td>';
            echo '<td>' . $row['userid'] . '</td>';
            echo '<td>' . $row['user_contact'] . '</td>';
            echo '<td>' . $row['session_date'] . '</td>';
            echo '<td>' . $row['session_state'] . '</td>';
            echo '<td>' . $row['session_price'] . '</td>';
            echo '<td>' . $row['session_service'] . '</td>';
            echo '<td>' . $row['session_verification_code'] . '</td>';
            echo '<td>' . $row['session_servicer'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No pending sessions found.';
    }

    echo '<br>';

    echo '<h2>Verified Sessions</h2>';
    if ($verifiedResult && $verifiedResult->num_rows > 0) {
        echo '<table class="w3-table w3-bordered">';
        echo '<tr><th>Session ID</th><th>User ID</th><th>User Contact</th><th>Session Date</th><th>Session State</th><th>Session Price</th><th>Session Service</th><th>Session Verification Code</th><th>Session Servicer</th></tr>';

        while ($row = $verifiedResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['sessionid'] . '</td>';
            echo '<td>' . $row['userid'] . '</td>';
            echo '<td>' . $row['user_contact'] . '</td>';
            echo '<td>' . $row['session_date'] . '</td>';
            echo '<td>' . $row['session_state'] . '</td>';
            echo '<td>' . $row['session_price'] . '</td>';
            echo '<td>' . $row['session_service'] . '</td>';
            echo '<td>' . $row['session_verification_code'] . '</td>';
            echo '<td>' . $row['session_servicer'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No verified sessions found.';
    }

    echo '<br>';

    echo '<h2>Serviced Sessions</h2>';
    if ($servicedResult && $servicedResult->num_rows > 0) {
        echo '<table class="w3-table w3-bordered">';
        echo '<tr><th>Session ID</th><th>User ID</th><th>User Contact</th><th>Session Date</th><th>Session State</th><th>Session Price</th><th>Session Service</th><th>Session Verification Code</th><th>Session Servicer</th></tr>';

        while ($row = $servicedResult->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['sessionid'] . '</td>';
            echo '<td>' . $row['userid'] . '</td>';
            echo '<td>' . $row['user_contact'] . '</td>';
            echo '<td>' . $row['session_date'] . '</td>';
            echo '<td>' . $row['session_state'] . '</td>';
            echo '<td>' . $row['session_price'] . '</td>';
            echo '<td>' . $row['session_service'] . '</td>';
            echo '<td>' . $row['session_verification_code'] . '</td>';
            echo '<td>' . $row['session_servicer'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No serviced sessions found.';
    }
} else {
    echo 'Error: Invalid key or key is missing.';
}
?>
</body>