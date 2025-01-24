<?php
    $mysqli = new mysqli("localhost","root","","login");

    // in case there is an error in connection
    if($mysqli -> connect_errno){
        echo "Failed to connect to MySQL: ".$mysqli -> connect_errno;
    }

    $result = $mysqli -> query($myop);
    echo "query has been run<br>";

    if(isset($workonit)){
        if($workonit){
            if($result){
                $x = 0;
                while ($row = $result -> fetch_row()){
                    // printf("%s %s %s\n",$row[0],$row[1],$row[2]);
                    $record[$x] = $row;
                    $x += 1;
                }

                $totalrows = mysqli_num_rows($result);
            } else {
                printf("no results <br>");
            }
        }
    }
?>