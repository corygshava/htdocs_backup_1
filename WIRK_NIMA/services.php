<?php
    include "components/verifysession.php";

    $payload = isset($_GET['theservice']) ? $_GET['theservice'] : "nada";
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
    <link rel="stylesheet" href="css/services.css">
    <link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

    <title>Our services</title>
</head>
<body>
    <header class="smallhero">
        <div class="herocontent">
            <h1>Our Services</h1>
        </div>
    </header>

    <?php
        $thepage = "services";

        include 'components/navbar.php';
    ?>

    <div class="content">

        <div class="panel1 menu w3-center">
            <h1>Which services are you interested in?</h1>
            <div class="smallmenu larger">
                <a href="#pestServices" class="themebtn2 active" onclick="switchtab(0,'.tab','.smallmenu')">Pest Control</a>
                <a href="#healthServices" class="themebtn2" onclick="switchtab(1,'.tab','.smallmenu')">Health care</a>
            </div>
        </div>

        <div class="tab w3-animate-bottom w3-animate-opacity" id="pestServices" style="display:block">
            <div class="panel2 w3-center" id="pestcontrol">
                <div class="starter">
                    <h2>pest control</h2>
                    <p>
                        Nima East Africa Limited is a leading provider of comprehensive training and extermination services for 
                        crawling and flying insects control across East Africa, Here are our services.
                    </p>
                    <hr class="myline">
                </div>

                <div class="peststuff w3-display-container" style="padding: 25px 5px;">
                    <div class="tab2Options smallmenu1" style="font-size: 15px;position:sticky;top: 45px" data-shown="1">
                        <button class="themebtn3 w3-left" onclick="switchtab(curservicetab--,'.tab1')"><i class="fa fa-chevron-left"></i><span style="display: inline-block;margin: 0 0 0 12px;">Previous service</span></button>
                        <button class="themebtn3 w3-right" onclick="switchtab(curservicetab++,'.tab1')"><span style="display: inline-block;margin: 0 12px 0 0px;">next service</span><i class="fa fa-chevron-right"></i></button>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/bedbug1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">1</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Bedbugs control and extermination</h2>
                                <p>
                                    Nima East Africa Limited is a Kenyan company specializing in professional training and eradication services for bedbugs in commercial and residential properties across East Africa. We understand the difficulty in detecting bedbugs due to their secretive nature and rapid reproduction. Our research indicates that one bedbug can lay up to five eggs per day, with a lifespan yield of up to five hundred. Upon suspicion of infestation, we advise contacting professional pest control services like yours truly, for a thorough inspection and tailored treatment plan. Our experts conduct comprehensive inspections beyond just beds, targeting areas prone to infestation. Our Treatment aims to exterminate bedbugs and prevent further spread.
                                </p>
                                <a href="readarticle.php?storyid=1" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
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
                                    Nima East Africa Limited extends its expertise beyond bedbugs to become Kenya's leading trainers in cockroach control services, offering eradication, elimination, and solutions in Nairobi and Mombasa. Cockroaches, known for their disease-carrying potential, thrive near waste areas and kitchens, posing a threat to both residential and commercial spaces. Their warm environment preference near food and water sources makes them common household pests, capable of triggering allergies and asthma attacks, particularly in children. Nima's professional control services cover residential, commercial, office, and industrial spaces, providing comprehensive solutions for cockroach infestations. With a variety of cockroach species in Kenya, their services prioritize total control, fumigation, extermination, and prevention measures, ensuring a pest-free environment for homes and businesses alike.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/housefly1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Houseflies control and extermination</h2>
                                <p>
                                    Nima East Africa Limited expands its services to include housefly control, 
                                    recognizing the dangers flies pose as carriers of over 100 pathogens which can cause diseases 
                                    in both humans and animals, making sanitation crucial for good health. 
                                    Accurate identification is key to successful housefly control as flies pick up pathogens from waste 
                                    and transfer them to food and surfaces they land on. 
                                    Maintaining cleanliness at home is essential to manage houseflies. 
                                    Nima's fly control services involve professional inspection to identify housefly species, locating breeding sites, and treating them with residual fly control methods. Experts then employ suitable methods to eliminate adult house flies, tailored to each situation, 
                                    ensuring effective control and a safer environment for homes and businesses.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/flea1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Fleas control and extermination</h2>
                                <p>
                                    Fleas, characterized by their reddish-brown color and wingless, hairy bodies, feed on feces and blood from 
                                    hosts such as dogs, cats, and other animals, potentially causing skin allergies. As they lack wings, fleas 
                                    typically jump to move around. Targeting adult fleas is crucial for effective control and elimination, as they 
                                    are easier to locate. Nima's expert flea control team offers innovative solutions for complete extermination in 
                                    various settings, including homes, residential areas, and commercial properties. Don't hesitate to contact us for 
                                    booking and to address your infestation concerns promptly.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/mosquito1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Mosquitoes control and extermination</h2>
                                <p>
                                    Here at Nima East Africa we emphasize the urgent need for mosquito control due to their nuisance and health risks. 
                                    Mosquitoes lay eggs in water, requiring minimal amounts to breed, making eradication vital around premises and recreational 
                                    areas like hotels and restaurants. 
                                    As Professionals, we utilize residual insecticide sprays to eliminate mosquitoes, targeting resting sites such as bushes, 
                                    grass, shaded areas, and flowers during the day. Our residual insecticide for mosquito control ensures safety and effectiveness, 
                                    protecting treated environments for up to <b class="themetxt">10 months</b>. Swift action is crucial in addressing mosquito infestations 
                                    to mitigate their impact on health and comfort.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/rat1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Mouse and Rodent control</h2>
                                <p>
                                    We provide extensive training and professional services for rodent and rat control and guarantee 
                                    effective extermination and elimination of rats and mice in residential and commercial properties 
                                    across East Africa. Rats are known for causing significant damage by contaminating food, damaging 
                                    structures, and spreading diseases. They thrive in environments with easy access to food including 
                                    homes, buildings, farms, gardens, and fields. In Kenya, We offer guaranteed rodent control services 
                                    utilizing strategic methods such as bait traps for total extermination. 
                                    Swift action is crucial to prevent rapid infestation, especially in areas where food sources are abundant.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/spider1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Spiders control and extermination</h2>
                                <p>
                                    We extend our services to include spider control throughout East Africa. 
                                    Recognizing the harm spiders can cause due to their dangerous venom, professional eradication is essential. 
                                    In Kenya, two main types of spiders are prevalent in structures and households: <b>the Black Widow</b>, 
                                    identifiable by the red hourglass shape under its abdomen, and <b>the Brown Recluse</b>, 
                                    distinguished by the brown violin marking on its back. Eliminating spiders is crucial as their bites can lead to 
                                    hospitalization. Nima East Africa Limited provides the best solutions for spider elimination and preventing 
                                    further infestation, ensuring the safety and well-being of their clients.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/bees1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Bees control</h2>
                                <p>
                                    We provide professional services for controlling and eliminating bees. 
                                    Though we acknowledge their ecological importance but also the risks they pose to untrained individuals. 
                                    We assess the severity of infestations to determine the appropriate approach for nest removal without 
                                    harming households. Addressing established nests promptly is crucial to prevent serious damage to clients' 
                                    premises. We advice proactive eradication of bee infestations, regardless of their size, to prevent escalation 
                                    and mitigate potential harm. Our expertise ensures safe and effective management of bee populations, 
                                    balancing the need for ecological preservation with the safety of individuals and property.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/ants1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Ants control</h2>
                                <p>
                                    Our professional services ensure thorough and organized extermination in areas affected by ants. 
                                    Ants infiltrate homes in search of water and food, leaving chemical trails for others to follow. 
                                    Heavy infestations require expert intervention to prevent outbreaks from escalating. 
                                    We offer effective treatment and prevention measures, targeting ant nests from the queen to all 
                                    colonies. Our trained technicians use appropriate pesticides to eradicate ants while preserving 
                                    household integrity. Our fumigation services leverage understanding of ant species' behavior and 
                                    utilize powerful pesticides to eliminate pests and prevent future infestations comprehensively. 
                                    For assured ant control, clients can rely on Our expertise and specialized solutions.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/termites1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Termites control</h2>
                                <p>
                                    Termites are often mistaken for ants due to their similar appearance, leading to significant 
                                    costs for property owners. While they may look alike from a distance, termites can be 
                                    identified by their pale or white color and straight, beaded antennas upon closer inspection.
                                </p>
                                <p>
                                    Our Trained experts conduct inspections and apply chemical treatments to affected areas and 
                                    their surroundings to deter termites. Treatment options include repellent and non-repellent 
                                    methods, with additional applications to siding and sheetrock to prevent further infestation 
                                    within the structure. We offer comprehensive termite treatment solutions to protect properties 
                                    from these destructive pests.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/bats1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Bats control</h2>
                                <p>
                                    Bats being nocturnal flying mammals, leave their roosts to feed and return to rest, with 
                                    most species active during warmer seasons and hibernating during colder periods. 
                                    While they play a crucial role in ecosystems, their presence inside houses can pose health risks, 
                                    as fungi in their droppings can cause lung diseases.
                                </p>
                                <p>
                                    We address bat infestations by professionally clearing droppings, disinfecting, and removing them 
                                    to safeguard household inhabitants. We offer customized bat elimination services for both interior 
                                    and exterior structures, ensuring comprehensive protection for clients' properties.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/moths1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Moths control and extermination</h2>
                                <p>
                                    We provide professional services for eradicating moths, a type of pest known for damaging fabrics and leaving webbing, 
                                    cocoons, and droppings. Detection of high infestation levels often occurs through fabric destruction and presence of 
                                    these signs. We utilize appropriate pesticides to eliminate moth swarms and advise on identifying moth species 
                                    and breeding sites for effective control. Timely intervention is crucial to prevent extensive damage caused by moths, 
                                    and we advice calling a professional at the first sign of infestation
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="w3-row pesttab" style="display: block;">
                        <div class="w3-col l4 w3-right-align">
                            <div class="w3-display-container articleimg1">
                                <img src="images/services/snakes1.jpg">
                                <div class="w3-display-topleft w3-black tag numbered 1">3</div>
                            </div>
                        </div>
                        <div class="w3-col l8 w3-left-align">
                            <div class="text-holder">
                                <h2>Snakes control and proofing</h2>
                                <p>
                                    Snakes pose a significant threat to individuals due to the risk of snake bites though most snakes 
                                    are timid and only attack when cornered or provoked as a defensive measure. 
                                    understanding the species of snake involved is crucial for proper treatment of snake bites. 
                                    Treatment varies depending on the snake species. We emphasizes the importance of identifying common snake 
                                    species in Kenya through <a href="#" class="w3-text-red"><b>our Pest Control lectures</b></a>, providing valuable knowledge to help people recognize and 
                                    respond to snake encounters effectively.
                                </p>
                                <a href="readarticle.php?storyid=2" class="articlelink">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="important w3-center">
                <h1>IMPORTANT</h1>
                <p style="font-size: 17px;">All Price Quotations Can Only Be Made Upon Inspections And Assessment Of The Extent Of Infestation Of The Premise</p>
            </div>

            <div class="panel1 w3-center">
                <h2>PRICING</h2>
                <p>These are the minimum prices for our pest control services</p>

                <div class="midcard roundsmall">
                    <div class="w3-row w3-grey">
                        <div class="w3-col s6 w3-right-align panel5">Description</div>
                        <div class="w3-col s3 w3-left-align panel5"><b>Cost</b></div>
                    </div>

                    <div class="w3-row temptable w3-border-bottom w3-border-grey">
                        <div class="w3-col s6 w3-right-align panel4">Monthly Training fee <br>(paid six times)</div>
                        <div class="w3-col s3 w3-left-align panel4"><b>5,500</b></div>
                    </div>
                    <div class="w3-row w3-border-bottom w3-border-grey">
                        <div class="w3-col s6 w3-right-align panel4">Protective gear <br>(paid once)</div>
                        <div class="w3-col s3 w3-left-align panel4"><b>10,000</b></div>
                    </div>

                    <div class="w3-row themebg"     >
                        <div class="w3-col s6 w3-right-align panel5">Total cost</div>
                        <div class="w3-col s3 w3-left-align panel5"><b>43,000</b></div>
                    </div>
                </div>
            </div>

            <div class="promo w3-center bg2">
                <div class="mycontents">
                    <h2>Lets talk</h2>
                    <p>We'd love to hear from you</p>
                    <a href="contacts.php#contacts" class="themebtn">contact us</a>
                </div>
            </div>
        </div>

        <div class="tab w3-animate-bottom w3-animate-opacity" id="healthServices" style="display:none">
            <div class="panel2 w3-center">
                <div class="starter">
                    <h2>Health care</h2>
                    <p>
                        We also provide a variety of healthcare services including:
                    </p>
                    <hr class="myline">
                </div>
            </div>

            <div class="healthlistholder">
                <!-- <div class="tab2Options smallmenu1">
                    <button class="themebtn3" onclick="switchtab(curhealthtab--,'.tab2')">Previous service</button>
                    <button class="themebtn3" onclick="switchtab(curhealthtab++,'.tab2')">next service</button>
                </div> -->

                <div class="tab2Options smallmenu1" style="font-size: 15px;position:sticky;top: 45px" data-shown="1">
                    <button class="themebtn3 w3-left" onclick="switchtab(curhealthtab--,'.tab2')"><i class="fa fa-chevron-left"></i><span style="display: inline-block;margin: 0 0 0 12px;">Previous service</span></button>
                    <button class="themebtn3 w3-right" onclick="switchtab(curhealthtab++,'.tab2')"><span style="display: inline-block;margin: 0 12px 0 0px;">next service</span><i class="fa fa-chevron-right"></i></button>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>Point Of Care Laboratory tests</span></h2>
                            <li>Diabetes- Profile, HbA/C, Hb</li>
                            <li>Hepatitis</li>
                            <li>Hormonal Serology</li>
                            <li>Malaria</li>
                            <li>Syphilis</li>
                            <li>Direct Antigen Tests(Stool) for Helicobacter Pylori</li>
                            <li>Antibody Screening tests for Helicobacter Pylori</li>
                            <li>Salmonella Ag Test (Stool)</li>
                            <li>Adeno-Rotavirus Screening tests</li>
                            <li>No diet restricted Fecal Occult Blood</li>
                            <li>Rheumatoid Serology</li>
                            <li>Streptococcal Serology</li>
                            <li>C-Reactive proteins</li>
                            <li>Pregnancy tests</li>
                            <li>Tumor markers</li>
                        </ul>
                    </div>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>Microbiology</span></h2>
                            <li>Culture Media</li>
                            <li>Growth Supplements</li>
                            <li>Biochemical Tests</li>
                            <li>Antibiotics Sensitivity discs</li>
                            <li>MIC,(ETEST)</li>
                            <li>Anaerobic Bacteriology(jars) and gas generating Sachets, (Carbon dioxide, Microaerophilic)</li>
                            <li>Stains (FDA or EU approved)</li>
                            <li>Blood Culture (Adult and Paediatric)</li>
                        </ul>
                    </div>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>Clinical Chemistry</span></h2>
                            <li>Calometric and Kinetic Ready to use Liquid Reagents</li>
                            <li>Normal and Abnormal Controls</li>
                            <li>Standards and Calibrators</li>
                        </ul>
                    </div>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>Histopathology & Cytology</span></h2>
                            <li>Complete Pap Smear Collection kits (with Speculum, slides, brush)</li>
                            <li>FDA, EU approved Histology & Cytology Stains</li>
                            <li>Rapid Urease tests from gastric biopsy</li>
                        </ul>
                    </div>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>Reproductive Health</span></h2>
                            <li>Vital Screen (Vitality Stain)</li>
                            <li>Sperma Stain (Morphology Stain)</li>
                            <li>Leuco screen (Leucocytes Staining method)</li>
                            <li>Sill-Select Plus (Sperm preparation kit)</li>
                            <li>Sperm Freeze</li>
                            <li>Fertility Score kit (tests for male fertility potential)</li>
                            <li>Hypo-osmotic Swelling tests (Sperm vitality test)</li>
                            <li>Episcreen (Alpha-glycosidase determination kit)</li>
                            <li>Sperms TMG (Detection of Sperm antibodies) IgA and IgG</li>
                            <li>Fructose tests</li>
                            <li>Citric Acid Tests</li>
                        </ul>
                    </div>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>Consultancy</span></h2>
                            <li>Good Laboratory Practice (GLP) and Laboratory Management.</li>
                            <li>Sourcing of Laboratory products (International Tenders)</li>
                            <li>Laboratory Design and Business Plan</li>
                        </ul>
                    </div>
                </div>

                <div class="tab2 w3-animate-right">
                    <div class="midcard roundmedium">
                        <ul class="healthList">
                            <h2><b class="numbered1 themetxt"></b><br> <span>General Supplies</span></h2>
                            <li>General goods services</li>
                            <li>Stationary and ICT products</li>
                            <li>Stationary and ICT products</li>
                            <li>Event Planning and management</li>
                            <li>Fumigation Pest Control Services</li>
                            <li>Food products</li>
                            <li>Mentorship, Guidance and Counseling Services</li>
                            <li>Entrepreneurship Coaching</li>
                            <li>General Professional Consultancy</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="promo w3-center bg2">
                <div class="mycontents">
                    <h2>Lets talk</h2>
                    <p>We'd love to hear from you</p>
                    <a href="contacts.php#contacts" class="themebtn">contact us</a>
                </div>
            </div>
        </div>

        <div class="showOnScroll w3-bottom" data-startat="15" data-endat="80" data-method="display" style="display:none">
            <div class="w3-center bottommenu w3-animate-bottom">
                <div class="smallmenu larger" style="font-size: 18px;">
                    <a class="themebtn2 active" onclick="switchtab(0,'.tab','.smallmenu')" href="#pestServices">Pest Control</a>
                    <a class="themebtn2" onclick="switchtab(1,'.tab','.smallmenu')" href="#healthServices">Health care</a>
                    <b class="w3-tag srolllogTxt">---</b>
                </div>
            </div>
        </div>
    </div>

    <!-- extra modals -->

    <div class="w3-modal" id="mainmodal" style="z-index: 120;" data-shown="0">
        <div class="w3-modal-content roundmedium w3-center w3-animate-top">
            <div class="mymodal">
            <button class="w3-btn w3-black w3-hover-red w3-right" onclick="toggleShow('#mainmodal');"><i class="fa fa-close"></i></button>
                <h2>Inquire Service</h2>
                <hr>
                <div class="mycontent">
                    <h5 class="themetxt">Health care</h5>
                    <button class="w3-tag themebtn4 thetext"></button>
                    <b class="w3-tag w3-hide"></b>
                </div>

                <a href="#" class="themebtn2 active">inquire</a>
                <button class="themebtn2" onclick="toggleShow('#mainmodal')">cancel</button>
            </div>
        </div>
    </div>

    <div class="w3-modal" id="contractmodal" style="z-index: 120;" data-shown="0">
        <div class="w3-modal-content roundmedium w3-center w3-animate-top">
            <div class="mymodal">
                <button class="w3-btn w3-black w3-hover-red w3-right" onclick="toggleShow('#contractmodal');"><i class="fa fa-close"></i></button>
                <h2>Book Service</h2>
                <hr>
                <div class="w3-yellow imp">
                    All Price Quotations Can Only Be Made Upon Inspections And Assessment Of The Extent Of Infestation Of The Premise
                </div>
                <div class="mycontent">
                    <p>Thank you for choosing Nima East Africa <b class="servicetype themetxt">Pest control</b> services</p>
                    <b>Here are the steps to booking a service or product with us</b>
                    <ol style="text-align:left">
                        <li>Download the contract document</li>
                        <li>Fill the contract document</li>
                        <li>Scan the contract document</li>
                        <li>Send the document to <a href="tel:+254715360479" class="themetxt">+254715360479</a>
                            <div><b>OR</b></div>
                            mail it to us at <a href="mailto:bookings@nimaeastafrica.com" class="themetxt">bookings@nimaeastafrica.com</a>
                        </li>
                        <li>Wait for our call<br>(expect it between <b>20 minutes</b> and 1 hour after contract submission)</li>
                    </ol>
                    <hr>
                    <div>
                        <b><i class="fa fa-info"></i> In case of any inquiry you can whatsapp our customer support at <a href="media/nimaeastafrica Contract.pdf" target="blank" class="themetxt active walink" download="">GET CONTRACT</a></b>
                    </div>
                </div>

                <a href="media/nimaeastafrica Contract.pdf" target="blank" class="themebtn2 active">GET CONTRACT</a>
                <button class="themebtn2" onclick="toggleShow('#contractmodal')">cancel</button>
            </div>
        </div>
    </div>

    <?php
        include 'components/basicscripts.php';
    ?>

    <script>
        var lists = document.querySelectorAll('.healthList');
        var pesttabs = document.querySelectorAll('.pesttab');
        var linktext = undefined;
        var curhealthtab = 0,curservicetab = 0;

        var inquiry = {thetype : "service",serviceName : "Bedbugs",extras : ""};

        setupNavBar();
        setupnumbers('.numbered'," / ");
        setupnumbers('.numbered1'," / ");
        setuplinks('.articlelink','readarticle.php?storyid=');

        healthlists();
        servicesList();
        setupInquiryLinks();

        switchtab(curhealthtab++,'.tab2');
        switchtab(curservicetab++,'.tab1');

        ActivateScrollListener();

        function switchtab(n,series,options) {
            checknums();

            let items = document.querySelectorAll(series);
            n = Math.abs(n) % items.length;

            items.forEach(element => {
                element.style.display = 'none';
            });

            items[n].style.display = 'block';

            if(options != undefined){
                let holder = document.querySelectorAll(options);
                holder.forEach(element => {
                    let btns = element.querySelectorAll('.themebtn2');
                    btns.forEach(btn => {
                        btn.classList.remove('active');
                    });

                    btns[n].classList.add('active');
                });
            }
        }

        function healthlists() {
            lists.forEach((element,index1) => {
                let items = element.querySelectorAll('li');

                items.forEach((element,index2) => {
                    linktext = `<a onclick="handleInquiry('health care',${index1},${index2})"><b>inquire</b></a>`;
                    element.classList.add("healthListItem");
                    element.innerHTML += linktext;

                    linktext = `<a onclick="handleBooking('health care',${index1},${index2})" style="right:11%"><b>BOOK NOW!</b></a>`;
                    element.classList.add("healthListItem");
                    element.innerHTML += linktext;
                });
            });
        }

        function handleInquiry(what,p,n) {
            let theservice = "";
            let info = "";

            linktext = `<a onclick="handleInquiry('health care',${p},${n})"><b>inquire</b></a>`;
            let thelist = undefined;

            if(what == 'health care'){
                thelist = lists[p];
                theservice = thelist.querySelector('h2>span').innerText;
                info = thelist.querySelectorAll('li')[n].innerHTML.split(linktext)[0];
            } else {
                thelist = pesttabs;
                theservice = pesttabs[p].querySelector('h2').innerText;
            }

            // console.log("it started");

            inquiry.thetype = what;
            inquiry.serviceName = theservice;
            inquiry.extras = info;
            setupInquiry();

            toggleShow('#mainmodal');

            // console.log("it finished");
        }

        function handleBooking(what,p,n) {
            let modal = document.querySelector('#contractmodal');
            let servicetxt = modal.querySelector('.servicetype');
            let walink = modal.querySelector('.walink');
            let theservice = "";
            let info = "";

            linktext = `<a onclick="handleInquiry('health care',${p},${n})"><b>inquire</b></a>`;
            let thelist = undefined;

            if(what == 'health care'){
                thelist = lists[p];
                theservice = thelist.querySelector('h2>span').innerText;
                info = thelist.querySelectorAll('li')[n].innerHTML.split(linktext)[0];
            } else {
                thelist = pesttabs;
                theservice = pesttabs[p].querySelector('h2').innerText;
            }

            // console.log("it started");

            inquiry.thetype = what;
            inquiry.serviceName = theservice;
            inquiry.extras = info;
            servicetxt.textContent = inquiry.thetype;
            let dis = (inquiry.thetype == "pest control") ? "block" : "none";
            modal.querySelector('.imp').style.display = dis;
            walink.href = whatsappLink(phoneNumber,"How do I go about the contract");
            walink.target = "blank";
            walink.textContent = `${phoneNumber}`;

            toggleShow('#contractmodal');

            // console.log("it finished");
        }

        function setupInquiry() {
            let modal = document.querySelector('.mymodal');
            let contentguy = modal.querySelector('.mycontent');
            let serviceTypeTxt = contentguy.querySelector('h5');
            let serviceTxt = contentguy.querySelector('.thetext');
            let WAlink = modal.querySelector('a');
            let linkpreview = modal.querySelector('b.w3-tag');

            let tailer = inquiry.extras == "" ? "" : `: ${inquiry.extras}`;
            let linktailer = inquiry.extras == "" ? "" : `specifically "${inquiry.extras}"`;
            let linkcontent = `Hello there, I'm interested in your **${inquiry.thetype}** services I wanted to inquire about your [${inquiry.serviceName}] services ${linktailer}`;

            linkpreview.innerHTML = linkcontent;
            serviceTypeTxt.innerHTML = inquiry.thetype;
            serviceTxt.innerHTML = `<b>${inquiry.serviceName}</b> ${tailer}`;
            WAlink.href = whatsappLink(phoneNumber,linkcontent);
            WAlink.target = "blank";

        }

        function setupInquiryLinks(){
            let items = document.querySelector('.peststuff').querySelectorAll('.w3-row');
            
            items.forEach((element,index) => {
                let box = element.querySelector('.w3-col.l8>.text-holder');
                box.innerHTML += `<a class="articlelink" onclick="handleInquiry('pest control',${index})">inquire</a>`;
                box.innerHTML += `<a class="articlelink2" onclick="handleBooking('pest control',${index})">book service</a>`;
            });
        }

        function servicesList() {
            let services = document.querySelector('.peststuff').querySelectorAll('.w3-row');

            services.forEach(element => {
                element.classList.add('tab1');
                element.classList.add('w3-animate-right');
            });
        }

        function checknums() {
            let items = document.querySelectorAll('.tab1');
            let items2 = document.querySelectorAll('.tab2');

            // curhealthtab = (curhealthtab < 0) ? curhealthtab : items.length;
            // curservicetab = (curservicetab < 0) ? curservicetab : items2.length;
        }

        // after effects
        var splittxt = `<?php echo "$payload";?>`;

        if(splittxt != "nada"){
            let items = splittxt.split("_");
            // alert(Number(items[0]) + "  " + Number(items[1]));
            switchtab(Number(items[0]),'.tab','.smallmenu');
            switchtab(Number(items[1]),'.tab1');
            switchtab(Number(items[1]),'.tab2');
        }
    </script>
</body>
</html>