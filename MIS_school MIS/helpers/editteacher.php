<?php

    if(isset($_POST['teacher_name'])){
        $teacher_id = $_POST['teacher_id'];
        $teacher_name = $_POST['teacher_name'];
        $teacher_class = $_POST['teacher_class'];
        $teacher_type = $_POST['teacher_type'];
        echo "<br>data received";

        include('../connect.php');
        $stmt = $conn->prepare("UPDATE `users` SET `user_name` = ?, `user_type` = ?, `user_class` = ? WHERE `user_id` = ?");
        $stmt -> bind_param("ssss",$teacher_name,$teacher_type,$teacher_class,$teacher_id);
        $stmt->execute();
        echo "<br>record updated";
    } else {
        echo "<br>invalid request";
    }

    sleep(2);
    header("Location:../dashboard.php");
?>