<?php
    // Include the database connection
    include 'connect.php';

    $restxt = "the code didnt run";
    $toredirect = '../managefarmers.php';

    // Function to sanitize input variables
    function sanitize_input($conn, $data) {
        return mysqli_real_escape_string($conn, $data);
    }

    // Check if the required POST variables have been passed
    if (isset($_POST['f_id'], $_POST['fname'], $_POST['fcontact'], $_POST['femail'], $_POST['flocation'])) {
        
        // Sanitize the POST variables
        $f_id = sanitize_input($conn, $_POST['f_id']);
        $fname = sanitize_input($conn, $_POST['fname']);
        $fcontact = sanitize_input($conn, $_POST['fcontact']);
        $femail = sanitize_input($conn, $_POST['femail']);
        $flocation = sanitize_input($conn, $_POST['flocation']);

        // Update the record in the Farmers table
        $sql = "UPDATE Farmers 
                SET Name = '$fname', Phone_contact = '$fcontact', email = '$femail', location = '$flocation' 
                WHERE Id = '$f_id'";

        if ($conn->query($sql) === TRUE) {
            $restext = "Farmer record updated successfully.";
            $opres = 'true';
        } else {
            $restext = "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $restext = "Required POST variables are missing.";
    }

    // Close the database connection
    $conn->close();

    include '../elements/loader.php';
?>
