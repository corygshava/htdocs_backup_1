<?php
    $dontredirect = true;
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
    <title>User summary</title>
</head>
<body>
    <?php
        if($curuser == ""){
            echo '<header class="w3-center w3-text-white">
                    <h1>log in first</h1>
                </header>';
        } else {
    ?>
    <header class="w3-center w3-text-white">
        <h1>summary information for <b style="color:var(--primaryColor);"><?php echo $curuser;?></b></h1>
    </header>

    <div class="w3-center">
        <hr style="width:80%;display: inline-block;">
    </div>

    <?php
        if($curusertype == "administrator"){
    ?>
    <!-- for admin -->
    <div class="textcontent w3-text-white">

        <?php
            include 'dashboard/adminsummary.php';
        ?>

        <div class="w3-row">
            <div class="w3-col m4">
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total customers</div>
                    <div class="w3-col m6"><b class="numberguy">5</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">customers with savings</div>
                    <div class="w3-col m6"><b class="numberguy">5</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">uncashed deposits</div>
                    <div class="w3-col m6"><b class="numberguy">12</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">loans pending approval</div>
                    <div class="w3-col m6"><b class="numberguy">9</b></div>
                </div>
            </div>

            <div class="w3-col m4">
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">rejected loans</div>
                    <div class="w3-col m6"><b class="numberguy">9</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">unpaid loans</div>
                    <div class="w3-col m6"><b class="numberguy">13</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">loans pending verification</div>
                    <div class="w3-col m6"><b class="numberguy">15</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">paid loans</div>
                    <div class="w3-col m6"><b class="numberguy">5</b></div>
                </div>
            </div>

            <div class="w3-col m4">
                <!-- experimental -->
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total unpaid loans</div>
                    <!--total unpaid-->
                    <div class="w3-col m6"><b style="margin: 0 !important;cursor: default;" class="themebtn3 w3-red w3-text-white">ksh 150,000</b></div>
                </div>
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total amount paid back</div>
                    <div class="w3-col m6"><b style="margin: 0 !important;cursor: default;" class="themebtn3 w3-blue w3-text-white">ksh 50,000</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total savings</div>
                    <div class="w3-col m6"><b style="margin: 0 !important;cursor: default;" class="themebtn3 w3-orange w3-text-white">ksh 550,000</b></div>
                </div>
            </div>
        </div>
    </div>

    <?php
        } else{
    ?>

    <!-- for user -->
    <div class="textcontent w3-text-white">

        <?php
            include 'dashboard/customersummary.php';
        ?>

        <div class="w3-row">
            <div class="w3-col m4">
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total number of loans</div>
                    <div class="w3-col m6"><b class="numberguy">1</b></div>
                </div>

                <div class="w3-row summ_container w3-hide">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">your approved loans</div>
                    <div class="w3-col m6"><b class="numberguy">5</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">your uncashed deposits</div>
                    <div class="w3-col m6"><b class="numberguy">12</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">loans pending approval</div>
                    <div class="w3-col m6"><b class="numberguy">2</b></div>
                </div>
            </div>

            <div class="w3-col m4">
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">unapproved loans</div>
                    <div class="w3-col m6"><b class="numberguy">2</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">unpaid loans</div>
                    <div class="w3-col m6"><b class="numberguy">2</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">loans pending verification</div>
                    <div class="w3-col m6"><b class="numberguy">1</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">paid loans</div>
                    <div class="w3-col m6"><b class="numberguy">25</b></div>
                </div>
            </div>

            <div class="w3-col m4">
                <!-- experimental -->
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total unpaid loans</div>
                    <div class="w3-col m6"><b style="margin: 0 !important;cursor: default;" class="themebtn3 w3-red w3-text-white">ksh 150,000</b></div>
                </div>
                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total paid loans</div>
                    <div class="w3-col m6"><b style="margin: 0 !important;cursor: default;" class="themebtn3 w3-blue w3-text-white">ksh 50,000</b></div>
                </div>

                <div class="w3-row summ_container">
                    <div class="w3-col m6 w3-right-align" style="padding: 0px 25px;">total savings</div>
                    <div class="w3-col m6"><b style="margin: 0 !important;cursor: default;" class="themebtn3 w3-orange w3-text-white">ksh 550,000</b></div>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
    }
    ?>

    <script>
        var items = document.querySelectorAll('.summ_container');

        for (let i = 0; i < items.length; i++) {
            let propName = items[i].querySelector(".w3-col.m6.w3-right-align").innerHTML;
            let countTxt = items[i].querySelector(".w3-col.m6>b");
            countTxt.innerHTML = (outdata[propName]).toLocaleString();
            console.log(`${propName} : ${outdata[propName]}`);
        }
    </script>

    <div class="w3-center">
        <button class="themebtn3 hover2" onclick="print();">Print document</button>
    </div>
</body>
</html>