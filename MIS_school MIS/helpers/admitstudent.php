<?php
// students table fields (student_id 	student_name 	student_class 	student_fees 	student_required_fees )
    echo "attempting to admit student<br>";

    if(isset($_POST['student_name'])){
        $student_name = $_POST['student_name'];
        $student_class = $_POST['student_class'];
        $student_fees = $_POST['student_fees'];
        $student_total_fees = $_POST['student_total_fees'];

        include('../connect.php');

        $stmt = $conn->prepare("SELECT * FROM students WHERE student_name = ?");
        $stmt->bind_param("s", $student_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // update the record if it exists
            $stmt = $conn->prepare("UPDATE `students` SET `student_id` = '0', `student_name` = ?, `student_class` = ?, `student_fees` = ?, `student_required_fees` = ? WHERE `student_name` = ?; ");
            $stmt -> bind_param("sssss",$student_name,$student_class,$student_fees,$student_total_fees,$student_name);
            $stmt->execute();
            echo "record updated";
        } else {
            // Insert the new user into the "users" table
            $stmt = $conn->prepare("INSERT INTO `students` (`student_id`, `student_name`, `student_class`, `student_fees`, `student_required_fees`) VALUES (NULL, ?, ?, ?, ?)");
            $stmt -> bind_param("ssss",$student_name,$student_class,$student_fees,$student_total_fees);
            $stmt->execute();
            echo "record added";
        }
    } else {
        echo "name not found";
    }

    echo "<br>returnin to dashboard....";
    sleep(3);
    header("Location:../dashboard.php");
?>