<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">

    <?php
        include('commonstyles.php');
    ?>
</head>
<body>

    <div class="menupanel w3-top"><a class="w3-btn w3-black" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> back</a></div>

<?php
/*
sessions has fields (sessionid	userid	user_contact	session_date	session_state	session_price	session_service	session_verification_code)
look for records where the session_date is todays date
display records in a table like manner
*/

require_once '../connect.php'; // Include the connect.php file

// Get today's date
$today = date('Y-m-d');

// Fetch records from the sessions table for today's date
$sql = "SELECT * FROM sessions WHERE session_date = '$today' AND session_state = 'verified'";
$result = $conn->query($sql);

echo '<div class="w3-container w3-padding-32 w3-center">';

if ($result && $result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Session ID</th><th>User ID</th><th>User Contact</th><th>Session Date</th><th>Session State</th><th>Session Price</th><th>Session Service</th><th>Session Verification Code</th></tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['sessionid'] . '</td>';
        echo '<td>' . $row['userid'] . '</td>';
        echo '<td>' . $row['user_contact'] . '</td>';
        echo '<td>' . $row['session_date'] . '</td>';
        echo '<td>' . $row['session_state'] . '</td>';
        echo '<td>' . $row['session_price'] . '</td>';
        echo '<td>' . $row['session_service'] . '</td>';
        echo '<td>' . $row['session_verification_code'] . '</td>';
        $theusername = $_COOKIE['username'];
        $theid = $row['sessionid'];
        if($row['session_state'] == "verified"){
            echo "<div><form action=\"marksession.php\"><input type=\"hidden\" name=\"sessionid\"value=\"$theid\"><input type=\"hidden\" name=\"username\"value=\"$theusername\"><button type=\"submit\">mark as done</button></button></form></div>";
        }
        echo '</tr>';
    }
    
    echo '</table>';
} else {
    echo 'No records found for today.';
}

echo "</div>";

?>

</body>
</html>