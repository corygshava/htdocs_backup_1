
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

    <title>Users</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
        include 'actions/connect.php';
    ?>

    <div class="tableholder">
    <?php
        $getdataquery = "SELECT userid,username,datecreated FROM users";
        $result = mysqli_query($conn,$getdataquery);

        $tablehead = '
            <table class="w3-table-all w3-bordered">
            <tr class="themebg tablehead">
                <th>userid</th>
                <th>username</th>
                <th>datecreated</th>
                <th>actions</th>
            </tr>
        ';

        echo $tablehead;
        if($result){
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr class="w3-border-bottom themebg2-hover">';
                echo '<td>'.$row['userid'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['datecreated'].'</td>';
                echo '<td>';
                    if($row['username'] != 'admin'){
                        echo '<a href="actions/deleteuser.php?userid='.$row['userid'].'" class="w3-button w3-round w3-black">delete</a>';
                    } else {
                        echo "--";
                    }
                echo '</td>';
                echo '</tr>';
            }
        } else {
            echo "<td colspan=\"4\">an error occured: ".mysql_error($conn).'</td>';
        }

        echo '</table>';
    ?>
    </div>

    <?php
        include 'components/printwidget.php';
        include 'components/footer.php';
    ?>
</body>
</html>