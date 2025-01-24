<!-- 
    consider{
        the database is called medlabs,
        the tables are to have the following format (<table class="w3-table w3-border-blue w3-border">),
        the rows are supposed to have the following format (<tr class="w3-light-grey w3-hover-grey w3-border">) except the first row which is (<tr class="w3-blue w3-hover-grey w3-border">)
        the table cells are supposed to have this format (<td style="padding:10px !important;">)
    }
    the idea is to make a php page that takes in a get variable called thetable

    then it runs a query that returns all fields in that table
    the idea is to produce a table where th elements have the name of the fields and the table contains all the records in that table
-->

<?php
    require "../actions/checksession.php";
    require "../actions/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/iconic.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>All referals</title>

    <style>
        .display{position:relative;overflow:hidden;}

        @media print{
            button,nav{display:none;}
            .display{height: 175px;}
        }
    </style>
</head>
<body>

    <?php
        $tableName = isset($_GET['thetable']) ? $_GET['thetable'] : 'invalid table name';

        // Check if the 'thetable' GET variable is set
        if (isset($_GET['thetable'])) {
            $tableName = $_GET['thetable'];
    ?>

    <nav class="w3-bar w3-white">
        <a href="javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a href="#" class="w3-bar-item pagetitle"><?php echo $tableName." table";?></a>
    </nav>

    <div class="display" style="height:180px">
        <img src="" alt="" class="display-myimg random-image-ls">
        <div class="w3-animate-zoom"><span class="subtxt"><?php echo "records in <b>".$tableName."</b>";?></span></div>
    </div>

    <div class="w3-container" style="margin:25px 0;">
<?php

    // Construct and execute the SQL query to get all fields and records from the specified table
    $myop = "SELECT * FROM $tableName";
    include("../actions/getdata.php");

    if ($result->num_rows > 0) {
        // Output the table structure
        echo '<table class="w3-table w3-border-blue w3-border">';
        
        // Output table header row
        echo '<tr class="w3-blue w3-border">';
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            echo '<th>' . $field->name . '</th>';
        }
        echo '</tr>';

        // Output table data rows
        while ($row = $result->fetch_assoc()) {
            echo '<tr class="w3-light-grey w3-hover-grey w3-border">';
            foreach ($row as $value) {
                echo '<td style="padding:10px !important;">' . $value . '</td>';
            }
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No records found in the specified table.';
    }
} else {
    echo 'Please specify a valid table name.';
}
?>

    <div class="w3-panel w3-center">
        <button class="w3-btn w3-round w3-blue w3-hover-light-blue" onclick="print()">Print table</button>
    </div>
</div>

<footer class="w3-light-grey">
        <p>Medlabs Laboratory Management Information System</p>
    </footer>
</body>

<script src="../js/utility.js">
</script>

<script>
    generateRandomImages("../");
    // document.body.style.backgroundImage = `url("../images/pexels-chokniti-khongchum-3082452.jpg")`

    function servePatient(element) {
        let items = element.children;
        let payload = "";
        payload += `referalID=${items[0].innerText}&`;
        payload += `DoctorSerial=${items[1].innerText}&`;
        payload += `DoctorName=${items[2].innerText}&`;
        payload += `PatientName=${items[3].innerText}&`;
        payload += `service=${items[4].innerText}&`;
        payload += `description=${items[5].innerText}&`;
        payload += `state=${items[6].innerText}`;

        location.assign(`servepatient.php?fromrefer=yes&${payload}`);
    }
</script>
</html>