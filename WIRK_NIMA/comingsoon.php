<?php
    include "components/verifysession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/mediaoptima.css">

    <title>Nima East Africa</title>
</head>
<body>
    <header style="background-image:none;">
        <h1>Nima East Africa</h1>
    </header>

    <div class="content">
        <div class="timecode">
            <h3>Under construction</h3>
            <p>This website is still under construction and will be available in ...</p>
            <hr>
            <span class="timetxt" data-role="time1"></span>
            <span class="timetxt" data-role="time2"></span>
            <span class="timetxt" data-role="time3"></span>
            <span class="timetxt" data-role="time4"></span>
        </div>
    </div>

    <?php
        include "components/footer.php";
    ?>

    <?php
        include 'components/basicscripts.php';
    ?>

    <script>
        var timetxts = document.querySelectorAll('[data-role]');
        var preview = document.querySelector('#timeremTxt');

        let enddate = new Date(2024, 3, 12, 12, 0, 0).getTime();
        let todaysDate, timerem;
        let timevals = ["days","hours","minutes","seconds"];

        const countingInterval = setInterval(updateCoountdown,1000);

        // handles the countdown
        function updateCoountdown(){
            todaysDate = new Date().getTime();
            timerem = enddate - todaysDate;

            let timeload = new Array(4);
            timeload[0] = Math.floor(timerem / (1000 * 60 * 60 * 24)) - 30;                     // days
            timeload[1] = Math.floor((timerem % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));     // hours
            timeload[2] = Math.floor((timerem % (1000 * 60 * 60)) / (1000 * 60));               // minutes
            timeload[3] = Math.floor((timerem % (1000 * 60)) / (1000));                         // seconds

            timeload.map((curValue,index) => {
                if(timetxts[index] != null){
                    timetxts[index].innerHTML = `${curValue} <br> ${timevals[index]}`;
                }
            })
        }
    </script>
</body>
</html>