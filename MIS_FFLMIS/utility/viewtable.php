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
    $recommendeduser='admin';
    include("../actions/checksession.php");
    require "../actions/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../css/iconic.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/new_styles.css">
    <link rel="stylesheet" href="../css/new_styles2.css">
    <link rel="stylesheet" href="../css/common.css">

    <title>report generator</title>

    <style>
        .display{position:relative;overflow:hidden;}

        @media print{
            button,nav{display:none;}
            .display{height: 175px;}
        }
    </style>

    <script src="../js/app.js"></script>
</head>
<body>

    <?php
        $tableName = isset($_GET['thetable']) ? $_GET['thetable'] : 'invalid table name';

        // Check if the 'thetable' GET variable is set
        if (isset($_GET['thetable'])) {
            $tableName = $_GET['thetable'];
    ?>

    <?php
        $curpage = "$tableName table";
        $myprefix="../";
        include("../elements/navbar.php");
    ?>

    <header class="banner" style="height: 200px;">
        <!-- <video src="media\vids\pexels_videos_2435376 (1080p).mp4" autoplay></video> -->
        <img src="../media/images/banner_image.jpg" alt="banner image" class="anim-slidetop">
        <div class="banner-text">
            <span class="subtxt"><?php echo "records in <b>".$tableName."</b>";?> table</span>
        </div>
    </header>

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

    <div class="w3-panel w3-center" style="padding:20px 10px 150px 10px !important;">
        <button class="w3-btn w3-round w3-blue w3-hover-light-blue" onclick="print(),logusage('printed <?php echo $tableName;?> table records','activity saved')"><i class="icon icon-print"></i> Print table</button>
    </div>
</div>
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

    logusage("viewed <?php echo $tableName;?> table","table <?php echo $tableName;?> loaded successfully");
</script>

<script>
    function logusage(what,anounce){
        let xhr = new XMLHttpRequest();
        let params = `adminuser=<?php echo $curuser;?>&useractivity=${what}`;

        xhr.open('GET',`logadmin.php?${params}`,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onreadystatechange = () => {
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    console.log(`Request success,\n status : ${xhr.statusText},\n response : ${xhr.responseText}`);
                    alerter("good",anounce,4.3);
                } else {
                    console.log(`Request failed : ${xhr.statusText}`);
                    alerter("warning","database request failed",4.3);
                }
            }
        }

        xhr.send(params);
    }
</script>

<?php include("../elements/errorbubble.php")?>
</html>