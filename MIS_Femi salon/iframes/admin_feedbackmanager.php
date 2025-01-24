<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/fontAwesome.css">
    <style>
        /* enables items to have round corners */
        .round{
            border-radius:12px;
        }

        iframe{
            width:100%;
            height: 360px;
            max-height: 720px;
        }
    </style>
    <title>user dashboard</title>
</head>

<body>
    <div class="backbtn w3-right"><a class="w3-btn w3-black" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> back</a></div>

<?php

    /*
        considering{
            connect.php is one folder up
            the table feedback has fields (feddbackid	contact	feedbacktype	feedbackmessage )
            the table element has the classname "w3-table w3-bordered w3-centered"
        }
        check if there is a get member variable called 'key' and if its set to '123'
        if it is{
            open a table called feedback and display all the records in a table like manner
            if there is none print a message accordingly
        }
        otherwise{
            print error message
        }
    */
?>

<?php
require_once '../connect.php'; // Include the connect.php file

if (isset($_GET['key']) && $_GET['key'] === '123') {
    // Fetch records from the feedback table
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo '<table class="w3-table w3-bordered">';
        echo '<tr><th>Feedback ID</th><th>Contact</th><th>Feedback Type</th><th>Feedback Message</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['feddbackid'] . '</td>';
            echo '<td>' . $row['contact'] . '</td>';
            echo '<td>' . $row['feedbacktype'] . '</td>';
            echo '<td>' . $row['feedbackmessage'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No feedback records found.';
    }
} else {
    echo 'Error: Invalid key or key is missing.';
}
?>
</body>
