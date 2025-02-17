<?php
    include 'actions/checksession.php';
    require 'actions/connect.php';
    require 'workers/worker_viewsales.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Milk Sales</title>
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
            <h2 class="mb-3 text-center themetxt">Milk Sales Records</h2>
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
            <a href="new_milksale.php" class="btn btn-primary themebg hoverfx2"><i class="fa fa-plus"></i> add new sale</a>
        </div>
    </div>

    <?php
        include 'elements/footer.php';
    ?>

    <script>
        let editform = document.querySelector('#editform');

        function setupbtns() {
            let btns = document.querySelectorAll('.verifybtn');

            btns.forEach(el => {
                el.addEventListener('click',e => {
                    verifythis(el.dataset.myid,el.dataset.myop);
                })
            })
        }

        function verifythis(id,op) {
            window.location.assign(`actions/verify_sale.php?sid=${id}&op=${encodeURIComponent(op)}`)
        }
        window.onload = e => {
            setupbtns();
        }
    </script>
</body>
</html>
