<?php
    $processtxt = isset($processtxt) ? $processtxt : "loading";
    $restext = isset($restext) ? $restext : "complete";
    $timeout = isset($timeout) ? $timeout : 2;
    $theloc = isset($theloc) ? $theloc : 'index.php';

    $delay = $timeout + 1.1;
    header("refresh: $delay; $theloc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">

    <style>
        body{
            margin: 0;
            background-color: var(themebg);
        }
        .content{
            display: flex;
            place-items: center;
            width: 100vw;
            height: 100vh;
            text-align: center;
        }

        .loader-container{
            width: 100%;
            padding: 20px;
        }
        .loader-container hr{
            width: 100px;
        }

        .progress{
            background-color: var(--themeborder);
            width: 150px;
            display: inline-block;
            margin: 12px 0;
            overflow: hidden;
            border-radius: 15px;
        }
        .progress .bar{
            background-color: var(--primaryColor);
            height: 12px;
            transition: var(--transitionFast);
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="loader-container">
            <h2><?php echo $processtxt;?></h2>
            <!-- <hr> -->
            <div class="progress loader">
                <div class="bar" style="width: 0.1%;"></div>
            </div>
            <br>
            <span id="prg-txt">34%</span>
        </div>
    </div>

    <?php sleep(0.3)?>

    <script>
        var container = document.querySelector('.loader-container');
        var thebar = document.querySelector('.loader>.bar');
        var thetext = document.querySelector('#prg-txt');

        var myinterval = undefined;

        var maxtime = (<?php echo "$timeout";?> * 1000) - 400;
        var mytime = 0;
        var interTime = maxtime / 30;

        myinterval = setInterval(() => {
            mytime += interTime;
            let ratio = (mytime/maxtime);
            let progress = Math.floor(ratio * 100);
            thebar.style.width = `${progress}%`; 
            thetext.innerHTML = `${progress}%`;

            if(mytime >= maxtime){
                finalise();
            }
        }, interTime);

        function finalise() {
            clearInterval(myinterval);

            container.innerHTML = '<h2><?php echo $restext;?></h2><p><i>redirecting</i></p>'
        }
    </script>
</body>
</html>