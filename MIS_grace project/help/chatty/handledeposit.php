<?php
include 'connect.php';

if (!isset($_POST['vcode']) || !isset($_POST['amount'])) {
    echo "<script>alert('Please provide both the code and the amount');</script>";
    exit;
}

$vcode = $_POST['vcode'];
$amount = $_POST['amount'];

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

// Insert new deposit record
$insertSql = "INSERT INTO deposits (userid, depoamount, depodate, code, status) VALUES (?, ?, NOW(), ?, 'pending')";
$insertStmt = $conn->prepare($insertSql);
if ($insertStmt === false) {
    die("Prepare failed: " . $conn->error);
}
$insertStmt->bind_param("iis", $theid, $amount, $vcode);

if ($insertStmt->execute()) {
    echo "<script>alert('Deposit added successfully'); setTimeout(function() { window.location.href = 'index.php'; }, 4000);</script>";
} else {
    echo "<script>alert('Error adding deposit: " . $conn->error . "');</script>";
}

$stmt->close();
$insertStmt->close();
$conn->close();
?>
