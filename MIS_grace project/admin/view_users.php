<?php
    $prefix = "../";
    include '../actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/tables.css">

    <title>CFS : list users</title>
</head>
<body>
    <?php
        if ($curusertype == 'admin') {
            include '../components/admin_navbar.php';
    ?>

    <div class="content">
        <div class="tableholder">
            <div class="w3-center">
                <h2>All users</h2>
                <hr>
                <p>Here are all your users</p>
            </div>

            <?php
include '../actions/connect.php';

// Retrieve all records from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class=\"w3-table w3-border w3-white\">
            <tr class=\"themebg w3-text-white\">
                <th>User ID</th>
                <th>User Type</th>
                <th>Username</th>
            </tr>";
    
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr class=\"w3-border-bottom\">
                <td>{$row['userid']}</td>
                <td>{$row['usertype']}</td>
                <td>{$row['username']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No records found.";
}

$conn->close();
?>

<?php
    } else {
        echo "<h2>Only admins can access this page</h2>";
    }
?>

        </div>

        <div class="bottomopt">
            <button class="w3-text-white" onclick="print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>

    <?php
        include '../components/footer.php';
    ?>
</body>
</html>