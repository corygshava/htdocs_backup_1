
<?php
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <title>Administer item</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>
    <div class="halfguy">
    <?php
        if(isset($_GET['itemname'])){
            $wantedname = $_GET['itemname'];

            include 'actions/connect.php';

            $query = "SELECT itemquantity FROM inventory WHERE itemname = '$wantedname'";
            $result = mysqli_query($conn,$query);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    $itemamt = $row['itemquantity'];
                }
            } else {
                echo "somethings wrong: ".mysqli_error($conn);
            }
    ?>

        <div class="container">
            <h1>Administer item</h1>
            <hr>
            <form action="actions/updateinventory.php" method="post">
                administering <b style="font-size:35px;"> <?php echo $wantedname;?> </b>
                <input type="hidden" name="theop" value="administer">
                <input type="hidden" name="thename" value="<?php echo $wantedname;?>">
                <input type="number" name="theamt" placeholder="how much will be given?" max="<?php echo $itemamt;?>"required>
                <button type="submit">Submit</button>
            </form>
            <div class="w3-center">
                <a href="index.php" class="w3-text-blue">go back</a>
            </div>
        </div>
    <?php
        } else {
            echo '<div class="w3-center">Invalid request format (administer items from the inventory list to prevent this)</div>';
        }
    ?>
    </div>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>