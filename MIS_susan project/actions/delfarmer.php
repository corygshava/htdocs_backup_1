<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../managefarmers.php';

    // Check if the f_id POST variable has been passed
    if (isset($_POST['f_id'])) {
        $f_id = mysqli_real_escape_string($conn, $_POST['f_id']); // Sanitize the input

        // SQL query to delete the record from the Farmers table
        $sql = "DELETE FROM Farmers WHERE Id = '$f_id'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            $restxt = "Farmer deleted successfully.";
            $opres = 'true';  // Set operation result variable to true
        } else {
            $restxt = "Farmer deleting failed: " . $conn->error;
        }
    } else {
        $restxt = "Required POST variable f_id is missing.";
    }

    include '../elements/loader.php';
?>