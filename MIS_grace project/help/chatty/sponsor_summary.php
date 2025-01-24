<?php
    include 'connect.php';

    if (!isset($_COOKIE['curuser'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curuser = $_COOKIE['curuser'];

    // Retrieve userid from users table
    $sql = "SELECT userid FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $curuser);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "<script>alert('User not found');</script>";
        exit;
    }

    $row = $result->fetch_assoc();
    $theid = $row['userid'];

    // Function to execute a query and return the count
    function getCount($conn, $sql, $param) {
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("i", $param);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count;
    }

    // Function to execute a query and return the sum
    function getSum($conn, $sql, $param) {
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("i", $param);
        $stmt->execute();
        $stmt->bind_result($sum);
        $stmt->fetch();
        $stmt->close();
        return $sum;
    }

    // Get counts and sums
    $totalDeposits = getCount($conn, "SELECT COUNT(*) FROM deposits WHERE userid = ?", $theid);
    $pendingDeposits = getCount($conn, "SELECT COUNT(*) FROM deposits WHERE userid = ? AND status = 'pending'", $theid);
    $verifiedDeposits = getCount($conn, "SELECT COUNT(*) FROM deposits WHERE userid = ? AND status = 'verified'", $theid);
    $totalRecommendations = getCount($conn, "SELECT COUNT(*) FROM recommendations WHERE userid = ?", $theid);
    $approvedRecommendations = getCount($conn, "SELECT COUNT(*) FROM recommendations WHERE userid = ? AND status = 'approved'", $theid);
    $rejectedRecommendations = getCount($conn, "SELECT COUNT(*) FROM recommendations WHERE userid = ? AND status = 'rejected'", $theid);
    $verifiedDepositsSum = getSum($conn, "SELECT SUM(depoamount) FROM deposits WHERE userid = ? AND status = 'verified'", $theid);

    // Store results in variables
    $totalDeposits;
    $pendingDeposits;
    $verifiedDeposits;
    $totalRecommendations;
    $approvedRecommendations;
    $rejectedRecommendations;
    $verifiedDepositsSum;

    $conn->close();
?>
