<?php

    if(isset($_GET['student_id'])){
        // cases table has the fields (case_id 	student_id 	student_name 	case_description 	case_state)
        // get data is student_id, student_name, case_description
        $student_id = $_GET['student_id'];
        $student_name = $_GET['student_name'];
        $case_description = $_GET['case_description'];
        echo "data retreived";

        // $sql = "";

        include('../connect.php');
        $stmt = $conn->prepare("INSERT INTO cases (case_id, student_id, student_name, case_description, case_state) VALUES (NULL, ?, ?, ?, 'pending') ");
        $stmt -> bind_param("sss",$student_id,$student_name,$case_description);
        $stmt->execute();
        echo "<br>record updated";
    } else {
        echo "data not found";
    }

    header("Location: ../dashboard.php");
?>