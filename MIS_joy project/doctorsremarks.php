
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
        if(isset($_GET['visitserial'])){
            $theserial = $_GET['visitserial'];

            include 'actions/connect.php';

            $findrecquery = "SELECT doctorsremarks FROM visits WHERE visitserial = '$theserial'";
            $result = mysqli_query($conn,$findrecquery);

            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $mystatement = $row['doctorsremarks'];
    ?>
        <div class="container">
            <h2>doctor's statement for visit <br><b class="w3-text-blue"><?php echo $theserial;?></b></h2>
            <hr>
            <p><?php echo "$mystatement";?></p>
            <div class="w3-center">
                <a href="listvisits.php" class="w3-text-blue">go back</a>
            </div>
        </div>
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