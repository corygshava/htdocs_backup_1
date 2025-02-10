<?php
    include "components/verifysession.php";

    $articleNo = isset($_GET['storyid']) ? $_GET['storyid'] : "2";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/mediaoptima.css">
    <link rel="stylesheet" href="css/articles.css">
    <link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

    <style>
        nav{display: none;}
    </style>

    <title>Article reader</title>
</head>
<body>
    <header class="smallhero w3-hide">
        <div class="herocontent">
            <h1>Article Reader</h1>
        </div>
    </header>

    <div class="menupanel w3-top"><a class="w3-btn w3-black" href="javascript:history.back()"><i class="fa fa-chevron-left"></i> back</a></div>

    <?php
        $thepage = "articles2";
        $extraclass = "w3-hide";

        include 'components/navbar.php';
    ?>

    <div class="contentwd">
        <iframe src="articles/article1.html" frameborder="0" class="pagecontent"></iframe>

        <div class="controls">
            <button></button>
        </div>
    </div>

    <div class="showOnScroll w3-bottom" data-startat="15" data-endat="90" data-method="display" data-ignoreend="yes" style="display:none">
        <div class="w3-center bottommenu w3-animate-bottom">
            <div class="smallmenu" style="font-size: 18px;">
                <a class="themebtn2" href="#pestServices"><i class="fa fa-chevron-left"></i> Previous</a>
                <a class="themebtn2" href="#healthServices">Next <i class="fa fa-chevron-right"></i></a>
                <b class="w3-tag srolllogTxt">---</b>
            </div>
        </div>
    </div>

    <?php
        include 'components/basicscripts.php';
    ?>

    <script>
        ActivateScrollListener();
        setupmenu();

        var theframe = document.querySelector('iframe.pagecontent');

        function setupReader(n) {
            theframe.src = `articles/article${n}.html`;
        }

        function setupmenu() {
            let menuholder = document.querySelector(".smallmenu");
            let btns = menuholder.querySelectorAll('.themebtn2');

            let num = <?php echo $articleNo;?>;

            if(num == 1){
                btns[0].classList.add("w3-hide");
            } else if(num >= 13){
                btns[1].classList.add("w3-hide");
            }

            btns[0].href = `readarticle.php?storyid=${num - 1}`;
            btns[1].href = `readarticle.php?storyid=${num + 1}`;
        }

        setupReader('<?php echo $articleNo;?>');

        // Assuming you have an iframe element with id "myIframe" in your HTML
        var times = 0;

        var myinterval = setInterval(() => {
            const iframe = theframe;
            const bodyElement = iframe.contentDocument.body;
            theframe.style.height = `${bodyElement.offsetHeight + 45}px`;

            console.log(bodyElement.offsetHeight);
            times += 1;

            if(times > 5){
                clearInterval(myinterval);
            }
        }, 200);
    </script>
</body>
</html>