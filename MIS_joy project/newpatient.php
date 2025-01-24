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

    <title>Add a new patient</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>

    <div class="halfguy">
        <div class="container">
            <h1>Add new patient</h1>
            <form action="actions/addpatient.php" method="post">
                <input type="text" name="thename" placeholder="enter your name here" required>
                <input type="tel" name="thecontact" placeholder="enter your Phone contact here" required>
                <input type="number" name="theidnumber" placeholder="enter your ID number here" required>
                    <p>Gender</p>
                <div>
                    <input type="radio" name="thegender" value="Male" required> Male
                    <input type="radio" name="thegender" value="Female" required> Female
                </div>

                <input type="number" name="theage" placeholder="enter your age" required>

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