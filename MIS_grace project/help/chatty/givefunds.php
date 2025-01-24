<?php
include 'connect.php';

if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
    echo "<script>alert('No active user found. Please log in.');</script>";
    exit;
}

$curusertype = $_COOKIE['curusertype'];

if ($curusertype == 'admin') {
    // Calculate available cash from verified deposits
    $sql = "SELECT SUM(depoamount) AS availablecash FROM deposits WHERE status = 'verified'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $availablecash = $row['availablecash'];
    } else {
        $availablecash = 0;
    }

    echo "<h2>Total Available Cash: $availablecash</h2>";

    // List all beneficiaries
    $sql = "SELECT * FROM beneficiaries";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Birth Certificate Number</th>
                    <th>Description</th>
                    <th>Medical Status</th>
                    <th>Amount Required</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Last Fund Date</th>
                    <th>Residence</th>
                    <th>Actions</th>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['bname']}</td>
                    <td>{$row['age']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['BCnumber']}</td>
                    <td>{$row['Description']}</td>
                    <td>{$row['medicalstatus']}</td>
                    <td>{$row['amountrequired']}</td>
                    <td>{$row['startdate']}</td>
                    <td>{$row['enddate']}</td>
                    <td>{$row['lastfunddate']}</td>
                    <td>{$row['residence']}</td>
                    <td><button onclick=\"allocateFunds({$row['BCnumber']}, {$row['amountrequired']})\">Allocate Funds</button></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
} else {
    echo "You are not allowed to access this page.";
}

$conn->close();
?>

<script>
function allocateFunds(bcNumber, amountRequired) {
    // This function would handle the allocation of funds via AJAX or a form submission
    alert(`Allocate funds to beneficiary with BC Number ${bcNumber} for amount ${amountRequired}`);
}
</script>
