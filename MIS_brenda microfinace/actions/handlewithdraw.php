<?php
    // Include the database connection file
    include "connect.php";

    // Check if depoholder, depoamt, and transactioncode are set and not empty
    if(isset($_POST['withdraw_amount']) && isset($_POST['saveid']) && isset($_POST['withdraw_holder'])) {

        $withdrawamount = $_POST['withdraw_amount'];
        $thesaveid = $_POST['saveid'];
        $withdrawholder = $_POST['withdraw_holder'];

        // find the savings record
        // update the savings amount
        // add a new record to the withdrawals table
        $sql = "SELECT saveamt FROM savings WHERE saveid='$thesaveid'";
        $theresult = $conn->query($sql);

        // Execute the query
        if ($theresult) {
            $row = $theresult->fetch_assoc();
            $curamt = $row['saveamt'];
            $curamt = $curamt - $withdrawamount;

            $myop = "UPDATE savings SET saveamt = '$curamt' WHERE saveid='$thesaveid'";
            $theresult = $conn->query($myop);

            $thedate = date("y-m-d h:i:s");
            $myop = "INSERT INTO withdrawals (wdamt, wdholder, wddate) VALUES ('$withdrawamount','$withdrawholder','$thedate')";
            $theresult = $conn->query($myop);

            if($theresult){
                echo '<script>alert("your withdrawal was processed successfully");</script>';
            } else {
                echo '<script>alert("Error processing withdrawal data: ' . $conn->error . '");</script>';
            }
        } else {
            echo '<script>alert("Error fetching savings data: ' . $conn->error . '");</script>';
        }
    } else {
        echo '<script>alert("Error: Please provide all required information.");</script>';
    }

    // Close connection
    $conn->close();

    echo "redirecting...";
    header("refresh: 1.2 ../savings.php?req=savings");
?>