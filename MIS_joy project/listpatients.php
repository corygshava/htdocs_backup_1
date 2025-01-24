
<?php
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/tables.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>List of patients</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>

    <div class="tableholder">

    <?php
        // Include database connection file
        include "actions/connect.php";

        if(isset($_GET['filter'])){
            echo '<h1 class="w3-center">search results</h1>';
        } else {
            echo '<h1 class="w3-center">List of patients</h1>';
        }

        // HTML table structure
        echo '<table class="w3-table-all w3-bordered">
            <tr class="themebg tablehead">';
        echo '<th>recordnumber</th>
                <th>id number</th>
                <th>patient name</th>
                <th>patient Contact</th>
                <th>patient Age</th>
                <th>patient Gender</th>
                <th>registration date</th>
                <th>last visit</th>
                <th>Actions</th>
            </tr>';

        // Check if the 'filter' variable exists in GET
        if(isset($_GET['filter'])) {
            // Sanitize the input to prevent SQL injection
            $filter = mysqli_real_escape_string($conn, $_GET['filter']);
            
            // Query to fetch records matching the filter
            $query = "SELECT patientid, idnumber, patientname, patientContact, registrationdate, lastvisit, age, gender FROM patients WHERE idnumber LIKE '%$filter%'";
        } else {
            // Query to fetch all records
            $query = "SELECT patientid, idnumber, patientname, patientContact, registrationdate, lastvisit, age, gender FROM patients";
        }

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if query executed successfully
        if($result) {
            if(mysqli_num_rows($result) == 0){
                $thequery = "SELECT patientid, idnumber, patientname, patientContact, registrationdate, lastvisit, age, gender FROM patients WHERE patientname LIKE '%$filter%'";
                $result = mysqli_query($conn, $thequery);
            }

            if(mysqli_num_rows($result) > 0){
                // Fetch and display data
                while($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="w3-border-bottom themebg2-hover">';
                    echo '<td>' . $row['patientid'] . '</td>';
                    echo '<td>' . $row['idnumber'] . '</td>';
                    echo '<td>' . $row['patientname'] . '</td>';
                    echo '<td>' . $row['patientContact'] . '</td>';
                    echo '<td>' . $row['age'] . '</td>';
                    echo '<td>' . $row['gender'] . '</td>';
                    echo '<td>' . $row['registrationdate'] . '</td>';
                    echo '<td>' . $row['lastvisit'] . '</td>';
                    echo '<td>
                        <a href="newvisit.php?thepatient='.$row['idnumber'].'" class="w3-button w3-round w3-black">new visit</a>
                        <a href="listvisits.php?thevisitdata='.$row['idnumber'].'" class="w3-button w3-round w3-black">my visits</a>
                        <a href="newappointment.php?patientid='.$row['idnumber'].'" class="w3-button w3-round w3-black">book appointment</a>
                    </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr class="w3-border-bottom themebg2-hover" data-guarantors="+25400000000_no#+2543223_yes">
                    <td colspan="7" class="w3-center"><i>no records found</i></td>
                </tr>';
            }
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }

        // Close database connection
        mysqli_close($conn);

        // Close the table
        echo '</table>';
    ?>
    </div>

    <?php
        include 'components/printwidget.php';
        include 'components/footer.php';
    ?>
</body>
</html>