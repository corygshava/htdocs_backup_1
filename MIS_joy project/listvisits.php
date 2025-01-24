<!-- 
    will include code for checking if theres a filter that has been passed
-->

<?php
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>List of visits</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>

    <div class="tableholder">
        <?php
    // Include database connection file
    include "actions/connect.php";

    $tablestarter = '
        <table class="w3-table-all w3-bordered">
            <tr class="themebg tablehead">
                <th>Visit Serial</th>
                <th>Patient ID Number</th>
                <th>Facility Used</th>
                <th>Visit Date</th>
                <th>Visit Status</th>
                <th>Date Verified</th>
                <th>Actions</th>
            </tr>';
    
    // Check if the value for 'thevisitdata' has been passed via GET
    if(isset($_GET['thevisitdata'])) {
        // Sanitize the input to prevent SQL injection
        $thevisitdata = mysqli_real_escape_string($conn, $_GET['thevisitdata']);

        // Query to select records where visitserial matches thevisitdata
        $query = "SELECT * FROM visits WHERE visitserial = '$thevisitdata'";
        
        // Execute the query
        $result = mysqli_query($conn, $query);
        
        // Check if there are any records where visitserial matches thevisitdata
        if(mysqli_num_rows($result) > 0) {
            echo '<h2 class="w3-center">Visits with Visit Serial: ' . $thevisitdata . '</h2>';
            echo $tablestarter;
            
            // Fetch and display the records
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr class="w3-border-bottom themebg2-hover">';
                echo '<td>' . $row['visitserial'] . '</td>';
                echo '<td>' . $row['patientidnumber'] . '</td>';
                echo '<td>' . $row['facilityused'] . '</td>';
                echo '<td>' . $row['visitdate'] . '</td>';
                echo '<td>' . $row['visitstatus'] . '</td>';
                echo '<td>' . $row['dateverified'] . '</td>';
                echo '<td>' . getactions($row['visitstatus'],$row['visitid'],$row['visitserial']) . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            // If no records match visitserial, query records where patientidnumber matches thevisitdata
            $query = "SELECT * FROM visits WHERE patientidnumber = '$thevisitdata'";
            
            // Execute the query
            $result = mysqli_query($conn, $query);
            
            // Check if there are any records where patientidnumber matches thevisitdata
            if(mysqli_num_rows($result) > 0) {
                echo '<h2 class="w3-center">Visits for Patient ID Number: ' . $thevisitdata . ' ('.mysqli_num_rows($result).')</h2>';
                echo $tablestarter;
                
                // Fetch and display the records
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="w3-border-bottom themebg2-hover">';
                    echo '<td>' . $row['visitserial'] . '</td>';
                    echo '<td>' . $row['patientidnumber'] . '</td>';
                    echo '<td>' . $row['facilityused'] . '</td>';
                    echo '<td>' . $row['visitdate'] . '</td>';
                    echo '<td>' . $row['visitstatus'] . '</td>';
                    echo '<td>' . $row['dateverified'] . '</td>';
                    echo '<td>' . getactions($row['visitstatus'],$row['visitid'],$row['visitserial']) . '</td>';
                    echo '</tr>';
                }
                
                echo '</table>';
            } else {
                echo 'No visits found for the provided visit serial or patient ID number.';
            }
        }
    } else {
        // If 'thevisitdata' is not provided, list all records
        $query = "SELECT * FROM visits";
        
        // Execute the query
        $result = mysqli_query($conn, $query);
        
        // Check if there are any records
        if(mysqli_num_rows($result) > 0) {
            echo '<h2 class="w3-center">All Visits</h2>';
            echo $tablestarter;
            
            // Fetch and display the records
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr class="w3-border-bottom themebg2-hover">';
                echo '<td>' . $row['visitserial'] . '</td>';
                echo '<td>' . $row['patientidnumber'] . '</td>';
                echo '<td>' . $row['facilityused'] . '</td>';
                echo '<td>' . $row['visitdate'] . '</td>';
                echo '<td>' . $row['visitstatus'] . '</td>';
                echo '<td>' . $row['dateverified'] . '</td>';
                echo '<td>' . getactions($row['visitstatus'],$row['visitid'],$row['visitserial']) . '</td>';
                echo '</tr>';
            }
            
            echo '</table>';
        } else {
            echo 'No visits found.';
        }
    }

    // Close database connection
    mysqli_close($conn);

    function getactions($status,$vid,$vserial)
    {
        $res = "";
        switch ($status) {
            case 'pending clearance':
                $res = '<a href="addstatement.php?visitserial='.$vserial.'" class="w3-button w3-round w3-black">add doctor\'s remarks</a>';
                break;
            default:
                $res = '<a href="doctorsremarks.php?visitserial='.$vserial.'" class="w3-button w3-round w3-black">doctor\'s remarks</a>';
                break;
        }

        return $res;
    }
?>

    </div>

    <?php
        include 'components/printwidget.php';
        include 'components/footer.php';
    ?>
</body>
</html>