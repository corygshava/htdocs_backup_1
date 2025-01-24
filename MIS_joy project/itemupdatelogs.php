
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

    <title>Add doctor's statement</title>
</head>
<body>
    <div class="halfguy w3-center">
    <?php
        if(isset($_GET['thename'])){
            $thename = $_GET['thename'];

            include 'actions/connect.php';

            $findrecquery = "SELECT updatelog FROM inventory WHERE itemname = '$thename'";
            $result = mysqli_query($conn,$findrecquery);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $mystatement = $row['updatelog'];
    ?>
        <div class="container">
            <h2>update log for <br><b class="w3-text-blue"><?php echo $thename;?></b></h2>
            <hr>
            <p id="display" style="font-size: 24px;"></p>
            <div class="w3-center">
                <a href="listinventory.php" class="w3-text-blue">go back</a>
            </div>
        </div>

        <script>
            var outtxt = ('<?php echo "$mystatement";?>').split(",").join("<br>");
            document.getElementById('display').innerHTML = outtxt;
        </script>
    <?php
            } else {
                echo '<p>invalid visit serial number</p>
                <div class="w3-center">
                    <a href="listvisits.php" class="w3-text-blue">go back</a>
                </div>';
            }
        } else {
            echo '
                <p>invalid request format (visit serial number is required)</p>
                <div class="w3-center">
                    <a href="listvisits.php" class="w3-text-blue">go back</a>
                </div>
                ';
        }
    ?>
    </div>

    <?php
        include 'components/printwidget.php';
        include 'components/footer.php';
    ?>
</body>
</html>