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
    <link rel="stylesheet" href="css/articles.css">
    <link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

    <title>News and updates</title>
</head>
<body>
    <header class="smallhero">
        <div class="herocontent">
            <h1>News and updates</h1>
        </div>
    </header>

    <?php
        $thepage = "articles";

        include 'components/navbar.php';
    ?>

    <div class="content">
        <div class="panel1 WIP w3-hide">
            <i>Work in progress</i>
        </div>

        <div>
            <div class="articles">
                <div class="w3-row newsarticle">
                    <div class="w3-col l4 w3-right-align">
                        <div class="w3-display-container articleimg1">
                            <img src="images/services/bedbug1.jpg">
                            <div class="w3-display-topleft w3-black tag numbered 1">1</div>
                        </div>
                    </div>
                    <div class="w3-col l8 w3-left-align">
                        <div class="text-holder">
                            <h2>What Do I need to know about Bedbugs ?</h2>
                            <p>
                                We understand the difficulty in detecting bedbugs due to their secretive nature and rapid reproduction. 
                                Our research indicates that one bedbug can lay up to five eggs per day, with a lifespan yield of up to ...
                            </p>
                            <a href="readarticle.php?storyid=1" class="articlelink">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="w3-row newsarticle">
                    <div class="w3-col l4 w3-right-align">
                        <div class="w3-display-container articleimg1">
                            <img src="images/services/cockroach1.jpg">
                            <div class="w3-display-topleft w3-black tag numbered 1">2</div>
                        </div>
                    </div>
                    <div class="w3-col l8 w3-left-align">
                        <div class="text-holder">
                            <h2>Roaches control and extermination</h2>
                            <p>
                                Nima East Africa Limited extends its expertise beyond bedbugs to become Kenya's leading 
                                trainers in cockroach control services, offering eradication, elimination, and solutions 
                                in Nairobi and Mombasa. Cockroaches, known for their disease-carrying potential, thrive near ...
                            </p>
                            <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="w3-row newsarticle">
                    <div class="w3-col l4 w3-right-align">
                        <div class="w3-display-container articleimg1">
                            <img src="images/articles/nima - american roach.jpg">
                            <div class="w3-display-topleft w3-black tag numbered 1">2</div>
                        </div>
                    </div>
                    <div class="w3-col l8 w3-left-align">
                        <div class="text-holder">
                            <h2>Types of Roaches</h2>
                            <p>
                                Nima East Africa Limited extends its expertise beyond just extermination, we have also put in the work to research all the types of roaches in Kenya so you dont have to. They include...
                            </p>
                            <a href="readarticle.php?storyid=14" class="articlelink">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="w3-row newsarticle">
                    <div class="w3-col l4 w3-right-align">
                        <div class="w3-display-container articleimg1">
                            <img src="images/services/housefly1.jpg">
                            <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                        </div>
                    </div>
                    <div class="w3-col l8 w3-left-align">
                        <div class="text-holder">
                            <h2>How Do I keep HouseFlies away ?</h2>
                            <p>
                                Recognizing that flies pose as carriers of over 100 pathogens which are harmful to 
                                both humans and animals, makes sanitation crucial for good health. 
                                The easiest way to keep flies away from your compound is to ...
                            </p>
                            <a href="readarticle.php?storyid=3" class="articlelink">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="w3-row newsarticle">
                    <div class="w3-col l4 w3-right-align">
                        <div class="w3-display-container articleimg1">
                            <img src="images/services/flea1.jpg">
                            <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                        </div>
                    </div>
                    <div class="w3-col l8 w3-left-align">
                        <div class="text-holder">
                            <h2>Fleas, the invisible indoor threat</h2>
                            <p>
                                Fleas are often mistaken for bedbugs due to their almost similar appearance. they are notorious for being hard to detect in both homes, livestock and offices alike. Fleas end up in those places by ...
                            </p>
                            <a href="readarticle.php?storyid=4" class="articlelink">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-col m4 panel1 w3-hide">
                <div class="w3-white w3-margin w3-card">
                    <div class="w3-container w3-padding w3-black">
                        <h4>Tags</h4>
                    </div>
                    <div class="w3-container w3-white">
                        <p>
                            <span class="w3-tag themebg w3-margin-bottom">New</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Popular</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Important</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">pest control</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Services</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">pest proofing</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Offers</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Health products</span>
                            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Updates</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include 'components/basicscripts.php';
    ?>

    <script>
        setupNavBar();
        setupnumbers('.numbered'," / ");
    </script>
</body>
</html>