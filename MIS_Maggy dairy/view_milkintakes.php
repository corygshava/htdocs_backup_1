<?php
    include 'actions/checksession.php';
    require 'actions/connect.php';
    require 'workers/worker_viewintakes.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Milk Intake</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/styles.css">

    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        include 'elements/navbar.php';
    ?>
    
    <div class="center-container">
        <div class="container mt-4">
            <h2 class="mb-3 text-center themetxt"><?= $greetxt?></h2>
            <table class="table table-bordered">
                <thead class="table-dark themetxt">
                    <tr>
                        <?= $hed?>
                    </tr>
                </thead>
                <tbody>
                    <?= $outxt?>
                    <?php if ($reccount == 0) { ?>
                    <tr>
                        <td colspan="4" class="text-center nada">No records found in the milk table.</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="container text-center">
        <?php
            if($utype == "admin"){
        ?>
                <a href="new_farmer.php" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new farmer</a>
                <a href="new_milkintake.php" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new intake</a>
        <?php
            } else {
        ?>
                <a href="new_milkintake.php?farmerid=<?= $curuserid?>" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new intake</a>
        <?php
            }
        ?>
            </div>
    </div>

    <?php
        include 'elements/footer.php';
    ?>
</body>
</html>
