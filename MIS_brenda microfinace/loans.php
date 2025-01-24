<?php
    include 'actions/checksession.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/styles.css">

    <script src="js/superscript.js"></script>
    <title>loans</title>
</head>
<body>
    <?php
        if(isset($_GET['req'])){
            $thereq = $_GET['req'];
            $filter = $thereq;
            $guartxt = $curusertype == "administrator" ? 'contact them before approving the loan' : 'they will be contacted in order to approve your loan';
            $modalcode = '<div class="w3-modal mymodal" data-shown="0">
        <div class="w3-modal-content w3-animate-zoom w3-center" style="border-radius: var(--roundnessNormal);">
            <div class="modalbox editor">
                <h2>Guarantors provided</h2>
                <div>
                    <P>'.$guartxt.'</P>

                    <hr>

                    <div class="GuarantorsDisplay"></div>

                    <button class="w3-black hover2 themebtn3" onclick="toggleShow(\'.mymodal\');">close</button>
                </div>
            </div>
        </div>
    </div>';
        }

        if($curusertype == "administrator"){
    ?>
    <header class="w3-center w3-text-white">
        <h1>loan records</h1>
        criteria: <button class="themebtn3"><?php echo "$thereq";?></button>
    </header>

    <?php
        include 'dashboard/showloans.php';
        echo "$modalcode";
    ?>

    <?php
        } elseif ($curusertype == "client") {
    ?>
            <header class="w3-center w3-text-white">
                <h1>loan records</h1>
                criteria: <button class="themebtn3"><?php echo "$thereq";?></button>
            </header>
    <?php
            include 'dashboard/showloans_customer.php';
            echo "$modalcode";
        }
    ?>

    <script>
        function showguarantors(btn){
            toggleShow('.mymodal');
            let guar = btn.dataset.guarantors.split("|");
            let outxt = "";

            for (var i = 0; i < guar.length; i++) {
                outxt += `
                <div class="w3-row">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">guarantor ${i}</div>
                    <div class="w3-col m6 w3-left-align"><b class="numberguy">${guar[i].split("_")[0]}</b></div>
                </div></div>`;
            }

            document.querySelector(".GuarantorsDisplay").innerHTML = outxt;
        }
    </script>

    <div class="w3-center">
        <button class="themebtn3 hover2" onclick="print();">Print document</button>
    </div>
</body>
</html>