<?php
    // Include the database connection
    include 'connect.php';

    $restxt = "the code didnt run";
    $toredirect = '../managefarmers.php';

    // Check if the required POST variables have been passed
    if (isset($_POST['fname'], $_POST['fcontact'], $_POST['femail'], $_POST['flocation'])) {
        
        // Sanitize the POST variables
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $fcontact = mysqli_real_escape_string($conn, $_POST['fcontact']);
        $femail = mysqli_real_escape_string($conn, $_POST['femail']);
        $flocation = mysqli_real_escape_string($conn, $_POST['flocation']);
        $date_added = date('Y-m-d H:i:s');  // Current date and time

        // Insert the data into the Farmers table
        $sql = "INSERT INTO Farmers (Name, Phone_contact, email, location, date_added) 
                VALUES ('$fname', '$fcontact', '$femail', '$flocation', '$date_added')";

        if ($conn->query($sql) === TRUE) {
            $restext = "New farmer record added successfully.";
            $opres = 'true';
        } else {
            $restext = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Required POST variables are missing.";
    }

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
