<?php

    if(isset($_POST['student_name'])){
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $student_class = $_POST['student_class'];
        $student_fees = $_POST['student_fees'];
        $student_total_fees = $_POST['student_total_fees'];
        echo "<br>data received";

        include('../connect.php');
        $stmt = $conn->prepare("UPDATE students SET `student_name` = ?, `student_class` = ?, `student_fees` = ?, `student_required_fees` = ? WHERE `student_id` = ?");
        $stmt -> bind_param("sssss",$student_name,$student_class,$student_fees,$student_total_fees,$student_id);
        $stmt->execute();
        echo "<br>record updated";
    } else {
        echo "<br>invalid request";
    }

    sleep(2);
    header("Location:../dashboard.php");
?>