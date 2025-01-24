<?php
    /*
        considering the following {connect.php is on the same folder
        the table sessions has fields (sessionid, userid, user_contact ,session_date ,session_state ,session_price ,session_service)
        there are these post member variables (thedate,thestate,theuserid,thecontact,theservice)}

        store all values of the postmembers in variables
        print values of the postmembers in the format (variable : value)
        check the number of records where session_date is equal to the post member variable thedate
        if there is more than 5, print an error that the day is overbooked
        otherwise do the following{
            add a record to the table sessions
            set that the value for session_price is 0
            set that the value for session_state is pending
        }
    */
    $verdict = "working on your query";

    
?>

<?php
require_once 'connect.php'; // Include the connect.php file

// Store values of POST members in variables
$thedate = $_POST['thedate'];
$thestate = $_POST['thestate'];
$theuserid = $_POST['theuserid'];
$thecontact = $_POST['thecontact'];
$theservice = $_POST['theservice'];
$theprice = $_POST['theprice'];

// Print values of POST members
$outTxt = '';
$outTxt = $outTxt.'<a href="#" class="w3-bar-item w3-button">'."date: " . $thedate . "</a>";
$outTxt = $outTxt.'<a href="#" class="w3-bar-item w3-button">'."session state: " . $thestate . "</a>";
$outTxt = $outTxt.'<a href="#" class="w3-bar-item w3-button">'."your userid: " . $theuserid . "</a>";
$outTxt = $outTxt.'<a href="#" class="w3-bar-item w3-button">'."your contact: " . $thecontact . "</a>";
$outTxt = $outTxt.'<a href="#" class="w3-bar-item w3-button">'."chosen service: " . $theservice . "</a>";

// Check the number of records where session_date is equal to thedate
$sql = "SELECT COUNT(*) AS count FROM sessions WHERE session_date = '$thedate'";
$result = $conn->query($sql);
$iserror = false;

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $count = $row['count'];

    // Check if there are more than 5 records
    if ($count > 5) {
        $verdict = "Error: The day is overbooked.";
        $iserror = true;
    } else {
        // Add a record to the sessions table
        $sql = "INSERT INTO sessions (userid, user_contact, session_date, session_state, session_price, session_service) VALUES ('$theuserid', '$thecontact', '$thedate', 'pending', $theprice, '$theservice')";
        
        if ($conn->query($sql) === TRUE) {
            $verdict = "Record added successfully.";
        } else {
            $verdict = "Error adding record: " . $conn->error;
            $iserror = true;
        }
    }
} else {
    $verdict = "Error occurred while checking availability.";
    $iserror = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>welcome user</title>
</head>
<body>
    <div class="w3-bar w3-black w3-top nav w3-card-4 w3-hide">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.php" class="w3-bar-item w3-button w3-hover-text-blue">home</a>
        <a href="sessionBooking.php" class="w3-bar-item w3-button w3-hover-text-blue">book a session</a>
        <a href="contacts.php" class="w3-bar-item w3-button w3-hover-text-blue">contact us</a>
    </div>

    <div class="login-holder w3-container">
        <div class="w3-center">
            <h1>Session saved</h1>
            <p><?php echo $verdict;?></p>

            <div class="w3-dropdown-hover">
                <button class="w3-button">your data</button>
                <div class="w3-dropdown-content w3-bar-block w3-border">
                    <?php echo $outTxt;?>
                </div>
            </div> 
            <?php
            if(!$iserror){
                echo '
                <div class="w3-padding-32">
                    <a href="dashboard.php" class="w3-btn w3-black w3-blue-hover mybtn w3-hover-blue">dashboard</a>
                </div>';
            } else {
                echo '
                    <div class="w3-padding-32">
                    <a href="sessionbooking.php" class="w3-btn w3-black w3-blue-hover mybtn w3-hover-blue">try again</a>
                </div>';
            }
            ?>
        </div>
    </div>

    <footer class="w3-padding-32 w3-black w3-bottom">
        <div class="w3-container">
            Femi.com
        </div>
    </footer>
</body>
</html>