<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['id_number'])){  
    header('location:index.php');

}else{

}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" href="favicon.png" type="image/png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>County Tax Management System- User</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <style type="text/css">
           body{ 
                margin-top:40px; 
            }

            .stepwizard-step p {
                margin-top: 10px;
            }

            .stepwizard-row {
                display: table-row;
            }

            .stepwizard {
                display: table;
                width: 100%;
                position: relative;
            }

            .stepwizard-step button[disabled] {
                opacity: 1 !important;
                filter: alpha(opacity=100) !important;
            }

            .stepwizard-row:before {
                top: 14px;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 100%;
                height: 1px;
                background-color: #ccc;
                z-order: 0;

            }

            .stepwizard-step {
                display: table-cell;
                text-align: center;
                position: relative;
            }

            .btn-circle {
              width: 30px;
              height: 30px;
              text-align: center;
              padding: 6px 0;
              font-size: 12px;
              line-height: 1.428571429;
              border-radius: 15px;
            }
        </style>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="wrapper">

             <?php include 'includes/usernavbar.php'; ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Make Payment</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
    </div>
</div>
<form role="form" method="post" action="payment_confirmation.php">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Choose your payment package</h3>
                <div class="form-group">
                <label class="radio-inline"><input type="radio" name="type" value="daily" required checked>Daily</label>
                <label class="radio-inline"><input type="radio" name="type" value="weekly" required>Weekly</label>
                <label class="radio-inline"><input type="radio" name="type" value="monthly" required>Monthly</label>
                </div><br>
                <h3> Choose mode of payment</h3>
                <div class="form-group">
                <label class="radio-inline"><input type="radio" value="mpesa" name="mode" required checked>M-Pesa</label>
                <label class="radio-inline" data-toggle="tooltip" title="Paypal is not supported currently"><input type="radio" value="paypal" data-toggle="tooltip" title="Paypal is not supported currently" name="mode" required disabled>Paypal</label>
                </div>
                <button class="btn btn-primary nextBtn btn-lg" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Payment</h3>
                <h4> Step 1</h4>
                <p>1. Go to M-Pesa on your phone<br>
                   2. Select Payment Services<br>
                   3. Select Pay Bill option <br>
                </p><br>

                <h4> Step 2</h4>
                <p>1. Enter Business number: <b>666444</b> <br>
                   2. Enter Account number: <b><?php echo substr(str_shuffle(MD5(microtime())), 0, 8);?></b><br>
                   3. Enter Amount <br>
                </p><br>
                
                <div class="form-group">
                    <label class="control-label">M-Pesa confirmation code</label>
                    <input maxlength="200" minlength="5" style="text-transform: uppercase;" name="mpesa_code" type="text" required="required" class="form-control" placeholder="Enter the M-Pesa confirmation code you received"  />
                </div>
                <button class="btn btn-primary nextBtn btn-lg" type="button" >Next</button><br>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Complete</h3>
                <p>Click finish to complete your payment</p>
                <button class="btn btn-success btn-lg" name="submit" type="submit">Finish!</button>
            </div>
        </div>
    </div>
</form>
</div>               
        
            
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'includes/userscripts.php';?>

        <script type="text/javascript">
            $(document).ready(function () {

            var navListItems = $('div.setup-panel div a'),
                    allWells = $('.setup-content'),
                    allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                        $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');
        });
</script>

    </body>
</html>
