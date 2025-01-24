<?php
    include 'connect.php';

    if (!isset($_COOKIE['curuser']) || !isset($_COOKIE['curusertype'])) {
        echo "<script>alert('No active user found. Please log in.');</script>";
        exit;
    }

    $curusertype = $_COOKIE['curusertype'];

    if ($curusertype == 'admin') {
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
