<!-- 
    will include code for checking if theres a filter that has been passed
-->

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

    <title>Inventory</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
        include 'actions/connect.php';
    ?>

    <div class="tableholder">
        
    <?php
        // Query to fetch all records from the appointments table
        if(isset($_POST['search'])){
            $filter = $_POST['search'];
            $query = "SELECT * FROM inventory WHERE itemname LIKE '%$filter%'";
            $theheading = 'Inventory (search results)';
        } else {
            $query = "SELECT * FROM inventory";
            $theheading = "Full Inventory";
        }

        $result = mysqli_query($conn, $query);

    // Display table header

        /*
            itemid  itemname    itemquantity    dateadded   dateupdated     updatelog
        */
        echo '
        <h1 class="w3-center">'.$theheading.'</h1>
        <table class="w3-table-all w3-bordered">
            <tr class="themebg tablehead">
            <th>itemid</th>
            <th>item name</th>
            <th>item quantity</th>
            <th>date added</th>
            <th>date updated</th>
            <th>Actions</th>
            </tr>';

    // Check if there are any records
    if(mysqli_num_rows($result) > 0) {
        
        // Display records
        while($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="w3-border-bottom themebg2-hover">';
            echo '<td>' . $row['itemid'] . '</td>';
            echo '<td>' . $row['itemname'] . '</td>';
            echo '<td>' . $row['itemquantity'] . '</td>';
            echo '<td>' . $row['dateadded'] . '</td>';
            echo '<td>' . $row['dateupdated'] . '</td>';
            echo '<td>' . getactions($row['itemquantity'],$row['itemname']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';

        echo '<div class="w3-center"> showing '.mysqli_num_rows($result).' record(s)</div>';
    } else {
        // If no records found, display message
        echo '<td class="w3-center" colspan="6">Inventory is empty</td>';
    }

    // Close database connection
    mysqli_close($conn);

    function getactions($quantity,$thename){
        $res = "";

        if($quantity == 0){
            $res = "
                <a href=\"deleteitem.php?itemid=$thename\" class=\"w3-button w3-round w3-black\">delete</a>\n
                <a href=\"new.php?thename=$thename\" class=\"w3-button w3-round w3-black\">update</a>\n
            ";
        } else {
            $res = "
                <a href=\"administeritem.php?itemname=$thename\" class=\"w3-button w3-round w3-black\">administer</a>\n
                <a href=\"newitem.php?thename=$thename\" class=\"w3-button w3-round w3-black\">update</a>\n
            ";
        }

        $res .= "<a href=\"itemupdatelogs.php?thename=$thename\" class=\"w3-button w3-round w3-black\">update log</a>\n";
        return $res;
    }
    ?>

    </div>

    <?php
        include 'components/printwidget.php';
        include 'components/footer.php';
    ?>
</body>
</html>