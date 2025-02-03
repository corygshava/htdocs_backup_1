<?php
    include "components/verifysession.php";
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
    <link rel="stylesheet" href="css/contacts.css">
    <link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

    <title>About us</title>
</head>
<body>
    <header class="smallhero">
        <div class="herocontent">
            <h1>About Us (extended)</h1>
        </div>
    </header>

    <?php
        $thepage = "about us";

        include 'components/navbar.php';
    ?>

    <div class="content w3-center">
        <div class="panel1" id="info1">
            <h2>BACKGROUND INFORMATION</h2>
            <cite class="themetxt w3-block">How we came to be</cite>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            <p>
                Nima East Africa Limited is a locally registered private company based in Nairobi, Kenya. 
                Incorporated on <b>24th November 2014</b> and eventually launched on <b>7th March 2015</b> at Kenyatta International Conference Centre <b>(K.I.C.C)</b> and its office officially opened on a prayer day under the leadership of our beloved Hon .Bishop .Dr. W. ABUKA. Hsc on <b>6th April 2015</b>.
            </p>
            <p>
                Nima East Africa Limited engages in the provision of a variety of Pest Control Services and Health Care Services and Products across East Africa.
            </p>
        </div>
        <div class="panel1" id="info2">
            <h2>STRATEGY</h2>
            <cite class="themetxt w3-block">How do we do what we do</cite>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            <p>
                We provide a broad spectrum of pest control services and healthcare solutions focused on the needs of 
                our customers which are designed to increase the efficiency of healthcare organizations and to eliminate limitations 
                arising from poor access to medical facilities.
            </p>

            <p>
                We provide value-added services such as initial consultations, 
                training on the system upon delivery and management of annual reorder processes.
            </p>
        </div>

        <div class="panel1" id="info3">
            <h2>CLIENT BASE</h2>
            <cite class="themetxt w3-block">Who do we intend to serve?</cite>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            <p>
                We serve a wide range of clients <b>covering commercial</b>, 
                <b>research institutions</b>, <b>hospitals</b>, <b>laboratories</b> and major <b>hotels</b> within East Africa.
            </p>
        </div>

        <!-- 
            template design
            <div class="panel1" id="info3">
                <h2>CLIENT BASE</h2>
                <cite class="themetxt w3-block">Who do we intend to serve?</cite>
                <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
                <p></p>
            </div>
        -->

        <div class="panel1" id="info3">
            <h2>ORGANISATION STRUCTURE</h2>
            <cite class="themetxt w3-block">How is our structure organised?</cite>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            <p>
                <img src="images/organogram.jpg" class="article-img" alt="Nima East Africa Organisation structure">
            </p>
        </div>

        <div class="panel1" id="info3" style="font-size: 15px;">
            <h2>PRODUCTS AND SERVICES</h2>
            <cite class="themetxt w3-block">What value can we offer?</cite>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            
            <div class="w3-row">
                <div class="w3-col l6">
                    <div class="holdercard w3-center">
                        <h3>Pest control</h3>
                        <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;margin: auto;">
                        <div class="w3-row">
                            <div class="w3-col l6">
                                <ol class="w3-left-align">
                                    <li>Cockroaches Elimination</li>
                                    <li>Bedbugs Elimination</li>
                                    <li>Bats Control & Removal</li>
                                    <li>Termites Extermination</li>
                                    <li>Bees Removal</li>
                                    <li>Fleas Extermination Services</li>
                                    <li>Rats, Mice Control</li>
                                </ol>
                            </div>
                            <div class="w3-col l6">
                                <ol class="w3-left-align">
                                    <li value="8">Wasps & Spiders Removal</li>
                                    <li>Mosquitoes Control</li>
                                    <li>General Pests Inspections</li>
                                    <li>Bird Control</li>
                                    <li>Feral Cats Control</li>
                                    <li>General Reptile Control</li>
                                    <li>Bird Mites Removal</li>
                                    <li>Dust Mites Elimination</li>
                                </ol>
                            </div>
                        </div>

                        <a href="services.php?theservice=0_0" class="themebtn2" style="display: grid !important;place-items: center;">Expound</a>
                    </div>
                </div>
                <div class="w3-col l6">
                    <div class="holdercard">
                        <h3>Health care</h3>
                        <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;margin: auto;">
                        <ol class="w3-left-align">
                            <li>Point Of Care Laboratory tests</li>
                            <li>Microbiology</li>
                            <li>Clinical Chemistry</li>
                            <li>Histopathology & Cytology</li>
                            <li>Reproductive Health</li>
                            <li>Consultancy</li>
                            <li>General Supplies</li>
                        </ol>

                        <a href="services.php?theservice=1_0" class="themebtn2" style="display: grid !important;place-items: center;">Expound</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel1 w3-light-grey" id="info3">
            <h2>HEALTH AND ENVIRONMENT POLICY</h2>
            <cite class="themetxt w3-block">How do we fulfill our social responsibility?</cite>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">

            <p>
                We conduct our operations with the highest regard for the safety and health of employees and the 
                protection of the general public in mind. Each member of staff is responsible for complying with safety rules 
                and regulations and for taking the necessary precautions to protect our colleagues.
                This includes provision of <b>adequate training</b> which ensures that employees are competent in the 
                <b>handling</b>, <b>transportation</b> and <b>storage</b> of all laboratory reagents and related chemicals. 
                The company also sponsors employees to train abroad in the manufacturer's facility to equip them 
                with the necessary skills in the handling of new products and equipment.
            </p>

            <p>
                We seek to ensure that products and/or services supplied or provided by third parties can be used, 
                handled, stored and disposed of in a manner which safeguards the environment, health and safety 
                of all concerned parties with a goal of continuously improving our performance.
            </p>

            <p>
                We are committed to meeting or exceeding customer and regulatory requirements regarding the research, 
                development, manufacturing, packaging, testing, supplying and marketing of our products.
            </p>

            <p>
                We lead the leaders in environmental management by laying down our resource to equip and 
                establish the public on community health, hygiene and sanitation.
            </p>
        </div>
    </div>

    <div class="promo w3-center bg2">
        <div class="mycontents">
            <h2>Lets talk</h2>
            <p>We'd love to hear from you</p>
            <a href="contacts.php#contacts" class="themebtn">contact us</a>
        </div>
    </div>

    <?php
        include 'components/basicscripts.php';
    ?>

    <script>
        setupNavBar();
    </script>
</body>
</html>