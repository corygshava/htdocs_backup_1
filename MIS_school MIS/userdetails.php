<?php
    include('connect.php');

    // Check if the desired username is already set, if not, set it
    if (!isset($currentusername)) {
        $currentusername = "random user"; // Replace with the desired username to check
    }
    
    // Declare the variables before the if statement
    $row = null;
    $theUsername = null;
    $theUserRole = null;
    $theUserId = null;
    $theUserClass = null;
    
    // Prepare and execute the SQL query
    $stmt = $conn->prepare("SELECT user_name, user_type, user_id,user_class FROM users WHERE user_name = ?");
    $stmt->bind_param("s", $currentusername);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Access the record values
        $theUsername = $row["user_name"];
        $theUserRole = $row["user_type"];
        $theUserId = $row["user_id"];
        $theUserClass = $row["user_class"];
    } else {
        echo "nada";
    }
    
    // Close the connection
    $conn->close();
    ?>
    