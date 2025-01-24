<?php
    /*
        checks if there is a post method variable called "requesttype"
            (if there is take the values (contact,feedbacktype,feedbackmessage) which were also in the post method
            include connect.php
            add the values to a table sessions
            notify the user if the query worked or failed)
        if there is no such variable inform the user of invalid data request
    */
?>

<?php
$outputText = '';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if there is a POST method variable called "requesttype"
if (isset($_POST['requesttype'])) {
    // Extract the values from the POST method
    $contact = $_POST['telephone'];
    $feedbackType = $_POST['requesttype'];
    $feedbackMessage = $_POST['themessage'];

    echo $contact.$feedbackType.$feedbackMessage;
    
    // Include the connect.php file
    include('connect.php');
    
    // Insert the values into the sessions table
    // $stmt = $conn->prepare("INSERT INTO feedback (feedbackid, contact, feedbacktype, feedbackmessage) VALUES (NULL,?, ?, ?)");
    $stmt = $conn->prepare("INSERT INTO `feedback` (`feddbackid`, `contact`, `feedbacktype`, `feedbackmessage`) VALUES (NULL, ?, ?, ?)");
    
    if($stmt){
        $stmt->bind_param("sss", $contact, $feedbackType, $feedbackMessage);
        
        // Execute the query
        if ($stmt->execute()) {
            $outputText= "Query executed successfully. Data added to sessions table.";
        } else {
            $outputText= "Query execution failed. Data not added to sessions table.";
        }
    } else {
        $outputText = "Error: ". mysqli_stmt_error($stmt);
    }

    // Close the connection
    $conn->close();
} else {
    // Notify the user of invalid data request
    $outputText= "Invalid data request. Please provide the required variables.";
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
    <div class="w3-bar w3-black w3-top nav w3-card-4">
        <a href="#" class="w3-bar-item"><img src="images/Femi logo.png" alt="femi logo"></a>
        <a href="index.php" class="w3-bar-item w3-button w3-hover-text-blue">home</a>
        <a href="sessionBooking.php" class="w3-bar-item w3-button w3-hover-text-blue">book a session</a>
        <a href="contacts.php" class="w3-bar-item w3-button w3-hover-text-blue">contact us</a>
    </div>

    <div class="login-holder w3-container">
        <div class="w3-center">
            <h1>Feedback recieved</h1>
            <p><?php echo $outputText;?></p>
            <div class="w3-padding-32">
                <a href="index.html" class="w3-btn w3-black w3-blue-hover mybtn w3-hover-blue">homepage</a>
                <a href="sessionBooking.html" class="w3-btn w3-black w3-blue-hover mybtn w3-hover-blue">book a session</a>
            </div>
        </div>
    </div>

    <footer class="w3-padding-32 w3-black w3-bottom">
        <div class="w3-container">
            Femi.com
        </div>
    </footer>
</body>
</html>