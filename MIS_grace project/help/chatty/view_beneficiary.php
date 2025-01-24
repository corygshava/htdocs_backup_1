<?php
include 'connect.php';

if (isset($_GET['kidid'])) {
    $kidid = $_GET['kidid'];

    // Check if beneficiary record exists
    $sql = "SELECT * FROM beneficiaries WHERE benid = $kidid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $bname = $row['bname'];
        $age = $row['age'];
        $gender = $row['gender'];
        $BCnumber = $row['BCnumber'];
        $description = $row['Description'];
        $medicalstatus = $row['medicalstatus'];
        $amountrequired = $row['amountrequired'];
        $startdate = $row['startdate'];
        $enddate = $row['enddate'];
        $lastfunddate = $row['lastfunddate'];
        $residence = $row['residence'];
        
        // Now you can use these variables for further processing
    } else {
        echo "Beneficiary not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
