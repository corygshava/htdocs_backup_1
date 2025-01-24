<?php
    // Include database connection file
    include "connect.php";

    $thepage = '../listusers.php';
    $redirect_delay = 3;


    // Check if userid is provided via POST
    if(isset($_GET['userid'])) {
        // Sanitize the input to prevent SQL injection
        $userid = mysqli_real_escape_string($conn, $_GET['userid']);

        // Query to check if the userid exists in the users table
        $check_query = "SELECT COUNT(*) AS total FROM users";
        $check_result = mysqli_query($conn, $check_query);

        if($check_result) {
            $row = mysqli_fetch_assoc($check_result);
            $total_users = $row['total'];

            if($total_users > 1) {
                $delete_query = "DELETE FROM users WHERE userid = '$userid'";
                $delete_result = mysqli_query($conn, $delete_query);
                
                if($delete_result) {
                    echo "User with userid $userid deleted successfully.";
                } else {
                    echo "Error deleting user.";
                }
            } else {
                echo "At least one record must remain in the users table.";
            }
        } else {
            echo "Error executing query.";
        }
    } else {
        echo "No userid provided.";
    }

    // Close database connection
    mysqli_close($conn);

    include 'smartredirect.php';
?>
