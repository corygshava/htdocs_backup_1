<?php
include 'connect.php';

if (isset($_POST['uname']) && isset($_POST['upass'])) {
    $uname = $_POST['uname'];
    $upass = $_POST['upass'];

    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username = $uname";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('User already exists, try a different username');</script>";
    } else {
        // Insert new user
        $insertSql = "INSERT INTO users (usertype, username, userpassword) VALUES ('sponsor', ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ss", $uname, $upass);
        if ($insertStmt->execute()) {
            if (isset($_COOKIE['curusertype']) && $_COOKIE['curusertype'] == 'admin') {
                echo "<script>alert('Record added successfully'); setTimeout(function() { window.location.href = 'index.html'; }, 3000);</script>";
            } else {
                echo "<script>alert('User added successfully. Please log in using the entered details.');</script>";
            }
        } else {
            echo "<script>alert('Error adding user: " . $conn->error . "');</script>";
        }
    }
    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Please fill in both username and password');</script>";
}
?>
