<?php
include 'connect.php';

if (isset($_POST['kidid'])) {
    $kidid = $_POST['kidid'];

    // Calculate total amount in treasury
    $sql = "SELECT SUM(depoamount) AS deposamt FROM deposits WHERE status = 'verified'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $deposamt = $row['deposamt'];
    } else {
        $deposamt = 0;
    }

    // Calculate total amount used
    $sql = "SELECT SUM(transamount) AS transamt FROM transactions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $transamt = $row['transamt'];
    } else {
        $transamt = 0;
    }

    // Calculate max available amount
    $maxamt = $deposamt - $transamt;

    // Check if beneficiary record exists
    $sql = "SELECT * FROM beneficiaries WHERE benid = $kidid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $togive = $row['amountrequired'];
        $kidname = $row['bname'];

        if ($maxamt >= $togive) {
            // Generate random code
            $thecode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 8);

            // Insert transaction record
            $today = date('Y-m-d');
            $sql = "INSERT INTO transactions (benid, bname, transamount, transdate, code) 
                    VALUES ($kidid, '$kidname', $togive, '$today', '$thecode')";
            if ($conn->query($sql) === TRUE) {
                echo "Funds allocated successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Inadequate funds.";
        }
    } else {
        echo "Beneficiary not found.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();

// Redirect to index.html after 3 seconds
header("refresh:3;url=index.html");
exit;
?>
