
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" href="favicon.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">

    <script src="js/SuperScript.js"></script>
    <script src="js/toappend.js"></script>
    <script src="js/app.js"></script>

    <title>All reviews</title>

</head>
<body>
    <?php
        include 'elements/navguy.php';
    ?>

    <div class="container mt-4">
        <div class="tableguy t1">
            <h2 class="mb-3">System Data</h2>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Changed</th>
                        <th>Date Added</th>
                        <th>Item Name</th>
                        <th>Item Value</th>
                        <th>Item Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo "$outxt1";?>
                </tbody>
            </table>
        </div>
        <div class="tableguy t2">
            <h2 class="mb-3">System Data</h2>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Changed</th>
                        <th>Date Added</th>
                        <th>Item Name</th>
                        <th>Item Value</th>
                        <th>Item Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo "$outxt2";?>
                </tbody>
            </table>
        </div>
        <div class="tableguy t3">
            <h2 class="mb-3">System Data</h2>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Changed</th>
                        <th>Date Added</th>
                        <th>Item Name</th>
                        <th>Item Value</th>
                        <th>Item Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo "$outxt3";?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
