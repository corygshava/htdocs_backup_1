
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

    <title>List of appointments</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>

    <div class="tableholder">

<?php
    // Include database connection file
    include "actions/connect.php";

    // Query to fetch all records from the appointments table
    if(isset($_GET['filter'])){
        $filter = $_GET['filter'];
        if($filter != "today"){
            $query = "SELECT * FROM appointments WHERE appointmentstatus = '$filter'";
        } else {
            $today = date("y-m-d");
            $query = "SELECT * FROM appointments WHERE DATE(appointmentdate) = '$today'";
        }
        $theheading = 'appointments : '.$_GET['filter'];
    } elseif(isset($_POST['search'])){
        $filter = $_POST['search'];
        $query = "SELECT * FROM appointments WHERE patientidnumber LIKE '%$filter%'";
        $theheading = 'appointments (search results)';
    } else {
        $query = "SELECT * FROM appointments";
        $theheading = "All appointments";
    }

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Display table header
        echo '
        <h1 class="w3-center">'.$theheading.'</h1>
        <table class="w3-table-all w3-bordered">
            <tr class="themebg tablehead">
            <th>appointmentid</th>
            <th>Appointment Serial</th>
            <th>Appointment Date</th>
            <th>Facility</th>
            <th>Patient ID Number</th>
            <th>Appointment Status</th>
            <th>Actions</th>
            </tr>';

    // Check if there are any records
    if(mysqli_num_rows($result) > 0) {
        
        // Display records
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="w3-border-bottom themebg2-hover">';
            echo '<td>' . $row['appointmentid'] . '</td>';
            echo '<td>' . $row['appointmentserial'] . '</td>';
            echo '<td>' . $row['appointmentdate'] . '</td>';
            echo '<td>' . $row['facility'] . '</td>';
            echo '<td>' . $row['patientidnumber'] . '</td>';
            echo '<td>' . $row['appointmentstatus'] . '</td>';
            echo '<td>' . getactions($row['appointmentstatus'],$row['appointmentid'],$row['appointmentserial']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';

        echo '<div class="w3-center"> showing '.mysqli_num_rows($result).' record(s)</div>';
    } else {
        // If no records found, display message
        echo '<td class="w3-center" colspan="7">No appointments found.</td>';
    }

    // Close database connection
    mysqli_close($conn);

    function getactions($status,$theid,$serial){
        $res = "nada";
        switch ($status) {
            case 'pending':
                $res = '<a href="actions/updateappointment.php?theappointmentserial='.$serial.'" class="w3-button w3-round w3-black">register as visit</a>
                    <a href="actions/expireappointment.php?theappointmentserial='.$serial.'" class="w3-button w3-round w3-black">mark as expired</a>
                    <a href="actions/cancelappointment.php?theappointmentserial='.$serial.'" class="w3-button w3-round w3-black">cancel</a>';
                break;
            case 'expired':
                $res = '<a href="actions/deleteappointment.php?theappointmentserial='.$serial.'"class="w3-button w3-round w3-black">delete</a>';
                break;
            default:
                $res = "--";
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