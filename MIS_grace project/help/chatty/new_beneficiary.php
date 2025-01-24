<?php
include 'connect.php';

if (!isset($_COOKIE['curusertype'])) {
    echo "<script>alert('No user type found. Please log in.'); window.location.href = 'index.html';</script>";
    exit;
}

$curusertype = $_COOKIE['curusertype'];

if ($curusertype == 'admin') {
    // Check if all POST variables are present
    $required_fields = ['bname', 'age', 'gender', 'BCnumber', 'Description', 'medicalstatus', 'amountrequired', 'residence'];
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field])) {
            echo "<script>alert('Missing $field. Please provide all required information.'); window.location.href = 'index.html';</script>";
            exit;
        }
    }

    // Assign POST variables to variables
    $bname = $_POST['bname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $BCnumber = $_POST['BCnumber'];
    $description = $_POST['Description'];
    $medicalstatus = $_POST['medicalstatus'];
    $amountrequired = $_POST['amountrequired'];
    $residence = $_POST['residence'];

    // Insert new record into beneficiaries table
    $startdate = date('Y-m-d');
    $enddate = date('Y-m-d', strtotime('+4 years'));
    $sql = "INSERT INTO beneficiaries (bname, age, gender, BCnumber, Description, medicalstatus, amountrequired, startdate, enddate, residence) 
            VALUES ('$bname', '$age', '$gender', '$BCnumber', '$description', '$medicalstatus', '$amountrequired', '$startdate', '$enddate', '$residence')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New beneficiary added successfully.'); setTimeout(function(){ window.location.href = 'index.html'; }, 2000);</script>";
    } else {
        echo "<script>alert('Error adding beneficiary: " . $conn->error . "'); window.location.href = 'index.html';</script>";
    }
} else {
    echo "<script>alert('You are not allowed to access this page.'); window.location.href = 'index.html';</script>";
}

$conn->close();
?>
