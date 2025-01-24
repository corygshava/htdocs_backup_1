<?php
    if(isset($_GET['case_id'])){
        echo "data retreived";
        $case_id = $_GET['case_id'];
        $case_punishment = $_GET['case_punishment'];

        include('../connect.php');
        $stmt = $conn->prepare("UPDATE cases SET case_state = 'resolved', case_punishment = ? WHERE case_id = ?");
        $stmt -> bind_param("ss",$case_punishment,$case_id);
        $stmt->execute();
        echo "<br>record updated";
    } else {
        echo "data missing";
    }

    header("Location: ../dashboard.php");
?>