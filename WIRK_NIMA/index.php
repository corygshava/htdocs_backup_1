<?php
    include "components/verifysession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="nima east africa official website">
    <meta name="keywords" content="best pest removal in kenya, top 10 best pestcontrol services in kenya, affordable pest removal in kenya, pest removal companies in kenya">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/mediaoptima.css">
    <link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

    <title>Nima East Africa</title>
</head>
<body>
    <?php
        $thepage = "homepage";

        include 'components/navbar.php';
    ?>

    <header class="myhero w3-black w3-center">
        <div class="herotxt">
            <span class="heading">NIMA <span class="w3-text-white">East Africa</span></span>
            <p>
            We are a registered Pest control and healthcare services company based in Nairobi, Kenya. 
            We are your go-to company for Pest control and extermination services, with many satisfied customers and a comprehensive range of services to select from
            <br>
            <a href="#about">ABOUT US</a>
            <a href="tel:+254715360479">LETS TALK</a>
            <a href="services.php#pestcontrol" class="primarybg main">services</a>
        </div>
    </header>

    <div class="content" style="font-size: 17px;">
        <!-- insert ABOUT section here -->

        <article id="about" class="panel2 w3-center">
            <img src="images/nimalogo.png" alt="nima east africa logo [missing]" class="w3-text-red">
            <h2>About Us</h2>
            <cite>Who are we</cite>
            <p>
                Nima East Africa Limited is a locally registered private company based in Nairobi, Kenya. 
                Incorporated on <b>24th November 2014</b> and eventually launched on <b>7th March 2015</b> at Kenyatta International Conference Centre <b>(K.I.C.C)</b> and its office officially opened on a prayer day under the leadership of our beloved Hon .Bishop .Dr. W. ABUKA. Hsc on <b>6th April 2015</b>.
            </p>
            <p>
                Nima East Africa Limited engages in the provision of a variety of Pest Control Services and Health Care Services and Products across East Africa.
            </p>

            <a href="about us.php#info2" class="themebtn2">More information</a>
        </article>

        <article id="objectives" class="panel2 w3-light-grey">
            <h2>Objectives</h2>
            <ol>
                <li>To improve the prosperity of all citizens in the world.</li>
                <li>To build a just and cohesive society with social equity in a clean and secure environment.</li>
                <li>To realize a democratic political system founded on issue-based politics <b>that respects the rule of law and protects the rights and freedom of every individual</b> by setting an example for the rest to emulate in healthcare.</li>
            </ol>
        </article>

        <div id="mission" class="w3-row w3-grey panel2">
            <article class="w3-col m6 w3-center panel1">
                <h2>Our Vision</h2>
                <p>Model of excellence for quality healthcare.</p>
            </article>
            <article class="w3-col m6 w3-center panel1">
                <h2>Our Mission</h2>
                <p>
                    Our mission is to redefine quality in healthcare.
                </p>
            </article>
        </div>

        <article id="values" style="background-color: var(--secondaryColor);margin: -15px 0px 0 0;padding: 0;background-image: url('images/slides bg.png');background-size: cover;">
            <div class="slideguy w3-text-white">
                <div class="slides">
                    <h2 class="w3-center">Our Values</h2>
                    <div class="slide w3-animate-opacity panel2" style="display: none;">
                        <div class="">
                            <h3>Customer focus</h3>
                            <hr>
                            <p>Committed to presenting satisfied clients in a pest free enviroment.</p>
                        </div>
                    </div>

                    <div class="slide w3-animate-opacity panel2" style="display: block;">
                        <h3>Strong Ethics</h3>
                        <hr>
                        <p>Providing services with respect, kindness and in a friendly manner. We (as employees) shall serve all our clients with respect, kindness and in a friendly manner </p>
                    </div>

                    <div class="slide w3-animate-opacity panel2" style="display: none;">
                        <h3>Timeliness</h3>
                        <hr>
                        <p>Always delivering service on time. Our client will always receive services on time</p>
                    </div>

                    <div class="slide w3-animate-opacity panel2" style="display: none;">
                        <h3>Equity</h3>
                        <hr>
                        <p>Equal service delivery to all, regardless of religion , social status and geographic location. All my clients are important, We (as employees) shall serve them equally regardless of their religion, geographic location, race or social status.</p>
                    </div>

                    <div class="slide w3-animate-opacity panel2" style="display: none;">
                        <h3>Teamwork</h3>
                        <hr>
                        <p>Working together for a common goal, appreciating weakness and strengths of others through shared efforts. We are in this journey together,We  (as employees) equally share your successes and failures</p>
                    </div>

                    <div class="slide w3-animate-opacity panel2" style="display: none;">
                        <h3>Accountability</h3>
                        <hr>
                        <p>Nima East Africa Limited employees shall be answerable for all clients. Every staff is accountable for the due performance of his/ her duties and for the general successes and failures of those he supervises.</p>
                    </div>
                </div>

                <div class="options"></div>
            </div>
        </article>

        <div class="promo w3-center bg2">
            <div class="mycontents">
                <h2>Lets talk</h2>
                <p>We'd love to hear from you</p>
                <a href="contacts.php#contacts" class="themebtn">contact us</a>
            </div>
        </div>
    </div>

    <?php
        include 'components/basicscripts.php';
    ?>
    <script>
        setupslides('#values');
        var slideDuration = 4500;
        var slideshow1 = w3.slideshow('.slides>.slide',slideDuration);

        var curslide = 0;

        function setupslides(b) {
            let slideholder = document.querySelector(b).querySelector('.slideguy');
            let slides = slideholder.querySelectorAll('.slide');

            slides.forEach((element,index) => {
                element.classList.add("w3-animate-opacity");
                element.classList.add("panel2");
                
                let newitem = document.createElement('div');
                newitem.classList.add('w3-animate-left');
                newitem.style.fontSize = '25px';
                newitem.innerHTML = `${index + 1} / ${slides.length}`;
                element.innerHTML = newitem.outerHTML + element.innerHTML;

                let opts = document.querySelector('#values').querySelector('.options');
                if(opts != null){
                    opts.innerHTML += '<button class="knob"></button>';
                } else {
                    console.log("opts is blank");
                }
            });
        }

        function updateOptions(){
            let slideholder = document.querySelector('.slideguy');
            let slides = slideholder.querySelectorAll('.slide');
            let opts = document.querySelector('.options').querySelectorAll('button');

            for (let x = 0; x < opts.length; x++) {
                const element = opts[x];
                element.classList.remove('current');
            }

            opts[curslide].classList.add('current');
            curslide += 1;
            curslide = curslide % slides.length;
        }

        updateOptions();
        const optionsUpdaterInterval = setInterval(() => {updateOptions();},slideDuration);
    </script>


</body>
</html>