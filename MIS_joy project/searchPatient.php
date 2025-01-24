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

    <title>Find patient</title>
</head>
<body>
    <?php
        include 'components/navbar.php';
    ?>

    <div class="halfguy">
        <div class="container">
            <h1>Search for patient</h1>
            <form action="listpatients.php" method="get">
                <input type="text" name="filter" placeholder="enter the patient's Id number or name" required>
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