<?php 
    include 'connect.php';

    $restxt = "the code didn't run";
    $toredirect = '../deposits.php';

    // Check if POST variables are set
    if (isset($_POST['tcode']) && isset($_POST['damt'])) {
        $tcode = mysqli_real_escape_string($conn, $_POST['tcode']);
        $damt = mysqli_real_escape_string($conn, $_POST['damt']);

        // Prepare current date and time
        $date_done = date('Y-m-d H:i:s');

        // Add new record to deposits table
        $insert_query = "INSERT INTO deposits (transaction_code, depo_amt, date_done) VALUES ('$tcode', '$damt', '$date_done')";
        
        if ($conn->query($insert_query) === TRUE) {
            $restxt = "Deposit record added successfully.";
            $opres = 'true';
        } else {
            $restxt = "Error adding deposit record: " . $conn->error;
        }
    } else {
        $restxt = "required variables werent passed";
    }

    // echo "what the fuss";
    $toredirect = isset($opres) ? '../deposits.php' : '../deposit_funds.php';

    include '../elements/loader.php';
?>