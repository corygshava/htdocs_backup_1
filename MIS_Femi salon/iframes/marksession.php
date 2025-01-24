<?php
    /*
        considering{
            connect.php is up one folder
        }
        check if there is a get member called 'sessionid'{
            then set a variable for the get member called 'sessionid'
            set another variable for get member called 'username'
            check the table 'sessions' for a record where the field sessionid is the same as the sessionid variable
            update the field 'session_state' to 'serviced' and the field 'session_servicer' to the username variable
        } if not {
            print an error message
        }
        
    */
?>

<?php
require_once '../connect.php'; // Include the connect.php file

if (isset($_GET['sessionid'])) {
    $sessionid = $_GET['sessionid'];
    $username = $_GET['username'];

    // Check if the record exists in the sessions table
    $sql = "SELECT * FROM sessions WHERE sessionid = '$sessionid'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Update the session_state and session_servicer fields
        $updateSql = "UPDATE sessions SET session_state = 'serviced', session_servicer = '$username' WHERE sessionid = '$sessionid'";
        if ($conn->query($updateSql) === TRUE) {
            echo "Record updated successfully.<br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "No record found for the given session ID.";
    }
} else {
    echo "incorrect access mode";
}


echo "<br>loading table...";
sleep(5);
header("refresh=5 url=workerinterface.php");
?>
