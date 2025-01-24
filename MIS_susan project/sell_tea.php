<?php
    include 'actions/checksession.php';
?>

<?php 
    include 'actions/connect.php';

    // Retrieve the sale_per_kilo price from the sysdata table
    $query_price = "SELECT itemvalue FROM sysdata WHERE itemname = 'sale_per_kilo'";
    $result_price = mysqli_query($conn, $query_price);
    $row_price = mysqli_fetch_assoc($result_price);
    $price = $row_price['itemvalue'];

    // Retrieve the amount of tea available from the inventory table
    $query_avl_tea = "SELECT itemamt FROM inventory WHERE itemname = 'tea'";
    $result_avl_tea = mysqli_query($conn, $query_avl_tea);
    $row_avl_tea = mysqli_fetch_assoc($result_avl_tea);
    $avl_tea = $row_avl_tea['itemamt'];
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="shortcut icon" href="favicon.png" type="image/png">

    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/font-Awesome.min.css">

    <title>Sell Tea</title>
</head>
<body>
    <?php
        include 'elements/navbar.php';
    ?>
    <div class="formholder">
        <div class="theform">
            <h1 class="w3-center">New sale of processed tea</h1>
            <div class="w3-center">
                <span>available Tea</span><br>
                <b class="pritxt" id="avlshow">234234 KG</b>
            </div>
            <form action="actions/addsale.php" method="post">
                <div class="flexresponsive row">
                    <div class="mobi">
                        <div class="npt">
                            <label for="tcode">transaction code</label>
                            <input type="text" name="tcode" id="tcode" placeholder="enter transaction code" required>
                        </div>
                        <div class="npt">
                            <label for="amt_sold">How much</label>
                            <input type="number" min="0" name="amt_sold" id="amt_sold" placeholder="enter amount in KG" oninput="updateprice()" required>
                        </div>
                        <div class="npt">
                            <label>To recieve</label>
                            <div class="standin pricetxt">
                                /kljaslkfjslekfjewkf
                            </div>
                        </div>
                    </div>
                </div>
                <div class="npt2 w3-center">
                    <button class="themebtn">add sale <i class="fa fa-send"></i></button>
                </div>
            </form>
        </div>
    </div>

    <?php
        include 'elements/footer.php';
    ?>

    <script src="js/SuperScript.js"></script>

    <script>
        var price = <?php echo $price;?>;
        var avl_tea = <?php echo $avl_tea;?>;

        var avlshow = document.querySelector('#avlshow');
        var pricetxt = document.querySelector('.pricetxt');
        var amtnpt = document.querySelector('#amt_sold');

        function updateprice() {
            let amt = Number(amtnpt.value);
            let toget = amt * price;

            pricetxt.innerHTML = `<b class="pritxt">${toget.toLocaleString()}</b> (<b>${price}</b> per KG)`;
        }

        function initUI() {
            avlshow.innerHTML = `${avl_tea} KG`;
            amtnpt.max = avl_tea;
            amtnpt.placeholder += ` (maximum is ${amtnpt.max} KG)`
            updateprice();
        }

        initUI();
    </script>
</body>
</html>