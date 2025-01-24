<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/styles.css">
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

<?php
    /*
        considering{
            connect.php is one folder up
            table users has fields (userid	username	password	user_role)
            the table element has the classname "w3-table w3-bordered"
        }
        check if there is a get member variable called 'key' and if its set to '123'
        if it is{
            open a table called users and display all the records where the field called ('user_role') is set to 'worker' in a table like manner
            if there is none print a message accordingly
        }
        otherwise{
            print error message
        }
    */
?>

<?php
require_once '../connect.php';

if (isset($_GET['key']) && $_GET['key'] === '123') {
    // Retrieve records where user_role is 'worker'
    $query = "SELECT * FROM users WHERE user_role = 'worker'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table class="w3-table w3-bordered">';
        echo '<tr><th>User ID</th><th>Username</th><th>Password</th><th>User Role</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['userid'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['password'] . '</td>';
            echo '<td>' . $row['user_role'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'No workers found.';
    }
} else {
    echo 'Error: Invalid key.';
}
?>

<div class="backbtn"><a class="w3-btn w3-black" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> back</a></div>
