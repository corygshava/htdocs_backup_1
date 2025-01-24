
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
    <div class="halfguy">
    <?php
        if(isset($_GET['visitserial'])){
            $theserial = $_GET['visitserial'];
    ?>
        <div class="container">
            <h1>Add doctor's statement</h1>
            <form action="actions/verifyvisit.php" method="post">
                <input type="hidden" name="visitserial" value="<?php echo $theserial;?>" required>
                <textarea name="thestatement" placeholder="what did the doctor say" required></textarea>
                <button type="submit">Submit</button>
            </form>
            <div class="w3-center">
                <a href="index.php" class="w3-text-blue">go back</a>
            </div>
        </div>
    <?php
        } else {
            echo "invalid request format (visit serial number is required)";
        }
    ?>
    </div>

    <?php
        include 'components/footer.php';
    ?>
</body>
</html>