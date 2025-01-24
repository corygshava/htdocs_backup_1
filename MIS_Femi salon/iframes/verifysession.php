<?php

    /*
        considering connect.php is one folder above
        look for a record in the table sessions where userid is theid ($_GET['theid'])
        and replace the session_verification_code field with thecode ($_GET['thecode'])
    */


    if(isset($_GET['thecode'])){
        include('../connect.php'); // Include the connect.php file

        $theid = $_GET['theid'];
        $thecode = $_GET['thecode'];

        // Update the record in the sessions table
        $sql = "UPDATE sessions SET session_verification_code = '$thecode' WHERE sessionid = '$theid'";

        if ($conn->query($sql) === TRUE) {
            echo "Session Record updated successfully.<br>";
            echo "updating table";
        }
        $sql = "UPDATE sessions SET session_state = 'verified' WHERE sessionid = '$theid'";

        if ($conn->query($sql) === TRUE) {
            echo "Session Record updated successfully.<br>";
            echo "updating table";
            sleep(2);
            header('refresh:5 url=customerinterface.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }


        // echo "verifying your session";
    } else {
        echo "invalid access key";
    }
?>


<body>
    <div class="menupanel w3-top"><a class="w3-btn w3-black" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> back</a></div>
</body>
