
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

    <title>Add item</title>
</head>
<body>
    <?php
        include 'components/navbar.php';

        if(isset($_GET['thename'])){
            $wantedname = $_GET['thename'];
        } else {
            $wantedname = '';
        }
    ?>

    <div class="halfguy">
        <div class="container">
            <h1>Add item</h1>
            <form action="actions/updateinventory.php" method="post">
                <input type="text" name="thename" placeholder="enter the item's name" value="<?php echo $wantedname;?>" required>
                <input type="number" name="theamt" placeholder="how many" required>
                <button type="submit">Submit</button>
            </form>
            <div class="w3-center">
                <a href="index.php" class="w3-text-blue">go back</a>
            </div>
        </div>
    </div>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>