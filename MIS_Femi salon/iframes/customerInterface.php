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

//set up variables to be used in userdata.php
$storedUserId = null;
$conn = null;
$desiredUsername = $_COOKIE['username'];
// Include the connect.php file
include('../connect.php');
include('../userdata.php');
include('../connect.php');

// Check if there is a record in the sessions table where userid = $desiredUsername
$stmt = $conn->prepare("SELECT * FROM sessions WHERE userid = ?");
$stmt->bind_param("s", $storedUserId);
$stmt->execute();

$result = $stmt->get_result();

// Check if there are any sessions booked
if ($result->num_rows > 0) {
    // Loop through the result and display the items in a table-like manner
    echo '<div class="w3-row tablerow w3-black">
    <div class="w3-col s2">
        <b>session date</b>
    </div>
    <div class="w3-col s2">
        <b>session state</b>
    </div>
    <div class="w3-col s2">
        <b>session price</b>
    </div>
    <div class="w3-col s3">
        <b>verification code</b>
    </div>
    
</div>';
    // echo "<tr><th>Session ID</th><th>Session Name</th><th>Date</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<div class=\"w3-row tablerow w3-light-grey w3-hover-grey\">";
        echo "<div class=\"w3-col s2\">" . $row["session_date"] . "</div>";
        echo "<div class=\"w3-col s2\">" . $row["session_state"] . "</div>";
        echo "<div class=\"w3-col s2\">" . $row["session_price"] . "</div>";
        if($row["session_verification_code"] == null || $row["session_verification_code"] == 'error'){
            echo '
                <div class="login-container">
                <form action="verifysession.php">
                <input type="hidden" placeholder="Password" name="theid" value="'.$row["sessionid"].'">
                <input type="text" placeholder="enter the Mpesa code here" name="thecode" required>
                <button type="submit" class="w3-button w3-black w3-hover-green">verify</button>
                </form>
            </div>
            ';
        } else {
            echo "<div class=\"w3-col s3\">" . $row["session_verification_code"] . "</div>";
        }
        echo "</div>";
    }
    
    echo "</div>";

    echo '<div class=\"w3-center w3-padding-32 w3-container\">
        <i>our admin will talk to you about your session from 1 - 3 hours of your session booking</i>
    </div>';
} else {
    $res = "No sessions booked.";
    echo "
        <div class=\"w3-center w3-padding-32 w3-container\">
            <i>$res</i>
        </div>";
}

// Close the connection
$conn->close();
?>

</body>
</html>