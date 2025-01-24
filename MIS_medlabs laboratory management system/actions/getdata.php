
<!-- find a workaround for checking for the database -->



<?php
/*
    $result = Array();
    $mysqli = new mysqli("localhost","root","","medlabs");

    // in case there is an error in connection
    if($mysqli -> connect_errno){
        echo "Failed to connect to MySQL: ".$mysqli -> connect_errno;
        exit;
    }
    */

    include 'connectiondata.php';

    // Establish a connection to MySQL server
    $mysqli = new mysqli($host, $username, $password,$database);

    // Check for connection errors
    if (!$mysqli) {
        die("Error: " . mysqli_connect_error());
        exit();
    }

    // Check if the database exists
    $checkDatabaseQuery = "SHOW TABLES LIKE 'itemslog'";
    $checkDatabaseResult = mysqli_query($mysqli, $checkDatabaseQuery);

    if (mysqli_num_rows($checkDatabaseResult) == 0) {
        

        /*$mysqli->query($sqlDump);
        echo "data setup successfully";*/

        echo 'this system has not been set up yet';
        exit();
    }

    $result = $mysqli -> query($myop);

    if(isset($showinfo)){
        if($showinfo){
            echo "query : [$myop]<br>";
            echo "query has been run<br>";
        }
    }

    if(isset($workonit)){
        if($workonit){
            if($result){
                $x = 0;
                while ($row = $result -> fetch_row()){
                    // printf("%s %s %s\n",$row[0],$row[1],$row[2]);
                    // echo $row[0];
                    $record[$x] = $row;
                    $x += 1;
                }

                $totalrows = mysqli_num_rows($result);
            } else {
                printf("no results <br>");
                echo $result."<br>";
            }
        }
    }

    // $result = $mysqli->query($myop);

    if (!$result) {
        echo "Error executing the query: " . $mysqli->error;
        exit;
    }

    if(isset($showresult)){
        if($showresult){
            if ($result->num_rows > 0) {
                echo "found".$result->num_rows." rows";
            } else {
                echo "No rows returned.<br>";
            }
        }
    }
?>
