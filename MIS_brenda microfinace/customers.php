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
    <title>Customer records</title>
</head>
<body>
    <?php
        if($curusertype == "administrator"){
    ?>
    <header class="w3-center w3-text-white">
        <h1>All customer records</h1>
    </header>

    <div class="w3-text-white w3-center">
        <?php include 'dashboard/listcustomers.php';?>
        <!-- <table class="w3-table w3-border thetable">
            <tr class="primarybg2">
                <th>username</th>
                <th>date registered</th>
                <th>loan limit</th>
                <th>has loan</th>
                <th>status</th>
                <th>actions</th>
            </tr>

            <tr class="w3-border-bottom w3-hover-dark-grey">
                <td>Nobody</td>
                <td>30/2/2029</td>
                <td>5000</td>
                <td>yes</td>
                <td>Allowed</td>
                <td>
                    <button class="themebtn2 hover2">forward to CRB</button>
                    <button class="themebtn2 hover2">delete</button>
                </td>
            </tr>
            <tr class="w3-border-bottom w3-hover-dark-grey">
                <td>Nobody</td>
                <td>30/2/2029</td>
                <td>5000</td>
                <td>yes</td>
                <td>Allowed</td>
                <td>
                    <button class="themebtn2 hover2">forward to CRB</button>
                    <button class="themebtn2 hover2">delete</button>
                </td>
            </tr>
            <tr class="w3-border-bottom w3-hover-dark-grey">
                <td>Nobody</td>
                <td>30/2/2029</td>
                <td>5000</td>
                <td>yes</td>
                <td>Allowed</td>
                <td>
                    <button class="themebtn2 hover2">forward to CRB</button>
                    <button class="themebtn2 hover2">delete</button>
                </td>
            </tr>
        </table> -->
    </div>
    <?php
        }
    ?>

    <div class="w3-center">
        <button class="themebtn3 hover2" onclick="print();">Print document</button>
    </div>
</body>
</html>