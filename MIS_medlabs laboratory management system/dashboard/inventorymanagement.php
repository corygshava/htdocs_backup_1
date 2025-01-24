<?php
    require "../actions/checksession.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/iconic.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <title>Manage inventory</title>
</head>
<body class="imagebg">

    <?php
        # generate a list of available items
        $myop = "SELECT itemname,quantity FROM inventory";
        include("../actions/getdata.php");

        $outxt = "";

        if($result->num_rows == 0){
            $outxt = "nada";
        } else {
            $outxt = "<select name=\"itemname\">";

            while ($row = $result->fetch_row()) {
                /*
                    <select name="itemname">
                        <option value="paracetamol">paracetamol (5)</option>
                        <option value="ChloroPhyl">ChloroPhyl (12)</option>
                        <option value="Amoxilin">Amoxilin (4)</option>
                        <option value="Terimalia" selected="true">Terimalia (2)</option>
                    </select>
                */
                $itemname = $row[0];
                $itemamount = $row[1];

                $outxt = $outxt."<option value=\"$itemname\">$itemname ($itemamount)</option>";
            }
            $outxt = $outxt."</select>";
        }
    ?>

    <script>
        let testguy = `<?php echo $outxt;?>`;
        let dontedit = testguy == "nada";
    </script>

    <nav class="w3-bar w3-white">
        <a href="javascript:history.back()" class="w3-bar-item pagetitle"><i class="icon icon-chevron-left"></i></a>
        <a href="#" class="w3-bar-item pagetitle">Manage inventory</a>
    </nav>

    <div class="navigator w3-center">
        <button onclick="switchTabs('.main',0,'.tabbtns');" class="w3-btn w3-hover-black tabbtns active">update item</button>
        <button onclick="switchTabs('.main',1,'.tabbtns');" class="w3-btn w3-hover-black tabbtns">administer item</button>
        <button onclick="switchTabs('.main',2,'.tabbtns');" class="w3-btn w3-hover-black tabbtns">add item</button>
        <button onclick="switchTabs('.main',3,'.tabbtns');" class="w3-btn w3-hover-black tabbtns">remove item</button>
    </div>

<!-- for updating item amounts -->

    <div class="main updateitems w3-hide">
        <div class="login_form w3-center floating-section">
            <div class="w3-display-container display">
                <img src="" alt="image of Doctor smiling" class="display-myimg random-image-ls">
                <div class="w3-animate-opacity">
                    <b class="subtxt">update item</b>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red"><b></b></span>
                </div>
            </div>

            <form action="../actions/inventoryHandler.php" class="w3-center myform" method="post">

                <!-- takes values from inventory table -->

                <div class="input_holder">
                    <label for="operation">item name (available quantity)</label>
                    <br>
                    <?php echo $outxt;?>
                </div>

                <div class="input_holder">
                    <label for="itemamount">Quantity</label>
                    <br>
                    <input type="number" name="itemamount" placeholder="how many are you adding" max="9999" min="0">
                </div>

                <div class="input_holder">
                    <button type="reset" class="w3-hide w3-btn w3-hover-blue w3-grey themeBtn">reset data</button>
                    <button type="submit" class="w3-btn w3-hover-blue w3-grey themeBtn">submit data</button>
                </div>
            </form>
        </div>
    </div>

<!-- for administering items -->

    <div class="main useitems w3-hide">
        <div class="login_form w3-center floating-section">
            <div class="w3-display-container display">
                <img src="" alt="image of Doctor smiling" class="display-myimg random-image-ls">
                <div class="w3-animate-opacity">
                    <b class="subtxt">administer item</b>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red"><b></b></span>
                </div>
            </div>

            <form action="../actions/inventoryHandler.php?action=give" class="w3-center myform" method="post">

                <!-- takes values from inventory table -->

                <div class="input_holder">
                    <label for="operation">item name (available quantity)</label>
                    <br>
                    <?php echo $outxt;?>
                </div>

                <div class="input_holder">
                    <label for="description">Amount to administer</label>
                    <br>
                    <input type="number" name="itemamount" placeholder="how many are you administering" max="9999" min="0">
                </div>

                <div class="input_holder">
                    <button type="reset" class="w3-hide w3-btn w3-hover-blue w3-grey themeBtn">reset data</button>
                    <button type="submit" class="w3-btn w3-hover-blue w3-grey themeBtn">submit data</button>
                </div>
            </form>
        </div>
    </div>

<!-- for adding new items -->

    <div class="main additems">
        <div class="login_form w3-center floating-section">
            <div class="w3-display-container display">
                <img src="" alt="image of Doctor smiling" class="display-myimg random-image-ls">
                <div class="w3-animate-opacity">
                    <b class="subtxt">Add new item</b>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red"><b></b></span>
                </div>
            </div>

            <form action="../actions/inventoryHandler.php?action=new" class="w3-center myform updateitem" method="post">

                <div class="input_holder">
                    <label for="itemname">Item name</label>
                    <br>
                    <input type="text" name="itemname" placeholder="what are you adding" required>
                </div>

                <div class="input_holder">
                    <label for="itemamount">Quantity</label>
                    <br>
                    <input type="number" name="itemamount" placeholder="how many are you adding" max="9999" min="1" required>
                </div>

                <div class="input_holder">
                    <label for="itemcost">Cost</label>
                    <br>
                    <input type="number" name="itemcost" placeholder="how much did you buy it" min="1" required>
                </div>

                <div class="input_holder">
                    <label for="itemdescription">Item description</label>
                    <br>
                    <textarea name="itemdescription" cols="30" rows="2" placeholder="enter a short description of the item" required></textarea>
                </div>

                <div class="input_holder">
                    <button type="reset" class="w3-hide w3-btn w3-hover-blue w3-grey themeBtn">reset data</button>
                    <button type="submit" class="w3-btn w3-hover-blue w3-grey themeBtn">submit data</button>
                </div>
            </form>
        </div>
    </div>

<!-- for deleting items from inventory -->

    <div class="main removeitems w3-hide">
        <div class="login_form w3-center floating-section">
            <div class="w3-display-container display">
                <img src="" alt="image of Doctor smiling" class="display-myimg random-image-ls">
                <div class="w3-animate-opacity">
                    <b class="subtxt">remove item</b>
                    <!-- what error happened -->
                    <span class="errtext w3-text-red"><b></b></span>
                </div>
            </div>

            <form action="../actions/inventoryHandler.php?action=remove" class="w3-center myform" method="post">

                <!-- takes values from inventory table -->

                <div class="input_holder">
                    <label for="operation">item name (available quantity)</label>
                    <br>
                    <?php echo $outxt;?>
                </div>

                <div class="input_holder">
                    <button type="submit" class="w3-btn w3-hover-blue w3-grey themeBtn">submit data</button>
                </div>
            </form>
        </div>
    </div>

    <footer class="w3-light-grey">
        <p>Medlabs Laboratory Management Information System</p>
    </footer>
</body>

<script src="../js/utility.js"></script>
<script src="../js/app.js"></script>

<script>
    generateRandomImages2("../");

    function worker()
    {
        getreq(location.href);
        var newreq = myrequest;
        var reqno = 0;

        if(newreq.header == "myaction"){
            newreq.content = newreq.content.toUpperCase();

            switch(newreq.content){
                case "UPDATE":
                    reqno = 0;
                    break;
                case "GIVE":
                    reqno = 1;
                    break;
                case "ADD":
                    reqno = 2;
                    break;
                default:
                    reqno = 3;
                    break;
            }
        }

        if(dontedit){
            switchTabs(".main",2,".tabbtns");
            disableTabbers();
        } else {
            switchTabs(".main",reqno,".tabbtns");;
        }
    }

    function disableTabbers() {
        var btns = document.querySelectorAll('.tabbtns');

        for (let x = 0; x < btns.length; x++) {
            const element = btns[x];
            element.disabled = true;
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
            worker();
        });

</script>
</html>

<?php
    include("../actions/alerterror.php");
?>