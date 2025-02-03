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

    <title>Our contacts</title>
</head>
<body>
    <header class="smallhero">
        <div class="herocontent">
            <h1>Our Contacts</h1>
        </div>
    </header>

    <?php
        $thepage = "contacts";

        include 'components/navbar.php';
    ?>

    <div class="content w3-center">
        <div class="panel1" id="info">
            <h2>GENERAL INFORMATION</h2>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            <p>More information about us</p>

            <!-- div.contacts>(div.w3-row>div.w3-col.m6.w3-right-align.panel3+div.w3-col.m6.w3-left-align.panel3)*7 template-->

            <div class="w3-row">
                <div class="w3-col l6">
                    <div class="holdercard">
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Company Name:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">Nima East Africa Limited</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Mobile No:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">+254 768 897 617</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>second Mobile No:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">+254 715 360 479</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Third Mobile No:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">+254 768 991 135</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Postal Address:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">67296-00200</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>E-Mail Address:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">nimaeastafrica@gmail.com</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Website:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">www.nimaeastafrica.com</div>
                        </div>
                    </div>
                </div>

                <div class="w3-col l6">
                    <div class="holdercard">
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Country of Ownership:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">Kenya</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Year Established:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">2014</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Business Type:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">Distributor</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Industry Focus:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">
                                Home Healthcare Equipment<br>
                                Laboratory Reagents<br>
                                Equipment<br>
                                Consultancy<br>
                                All Pest Control Services<br>
                                General Products and Services</div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col m6 w3-right-align panel3"><b>Geographic Markets:</b></div>
                            <div class="w3-col m6 w3-left-align panel3">Eastern Africa and the Horn of Africa.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="promo w3-center bg2">
            <div class="mycontents">
                <h2>INTERESTED?</h2>
                <p>then you can go through our services</p>
                <a href="services.php" class="themebtn">our services</a>
            </div>
        </div>

        <div class="panel1" id="contacts">
            <h2>LETS CHAT</h2>
            <hr style="width: 80%;display: inline-block;border-color:var(--primaryColor) !important;">
            <p>Heres how you can reach us</p>

            <div class="contacts">
                <a href="" target="blank">
                    <i class="fa fa-envelope"></i>
                    <br>
                    info@nimaeastafrica.com
                </a>
                <a href="https://www.facebook.com/profile.php?id=61558607002002" target="blank">
                    <i class="fa fa-facebook"></i>
                    <br>
                    NIMA East Africa Limited
                </a>
                <a href="https://www.linkedin.com/in/nima-east-africa-500939303" target="blank">
                    <i class="fa fa-linkedin"></i>
                    <br>
                    NIMA EAST AFRICA
                </a>
                <a href="https://twitter.com/NimaEastAfrica2" target="blank">
                    <i class="fa fa-twitte">X</i>
                    <br>
                    Nima East Africa
                </a>
                <a href="https://wa.me/254715360479/?text=I wanted to inquire on your services" target="blank">
                    <i class="fa fa-whatsapp"></i>
                    <br>
                    +254 715 360 479
                </a>
                <a href="tel:+254715360479" target="blank">
                    <i class="fa fa-phone"></i>
                    <br>
                    Nima East Africa
                </a>
            </div>
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