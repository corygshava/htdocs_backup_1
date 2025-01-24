<?php

    $result = Array();
    $mysqli = new mysqli("localhost","root","","fflmis");

    // in case there is an error in connection
    if($mysqli -> connect_errno){
        echo "Failed to connect to MySQL: ".$mysqli -> connect_errno;
        exit;
    }

    $result = $mysqli -> query($myop);

    if(isset($showinfo)){
        if($showinfo){
            echo "query : [$myop]<br>";
            echo "query has been run<br>";
        }
    }

    if(isset($numrows)){
        $numrows = $result->num_rows;
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
