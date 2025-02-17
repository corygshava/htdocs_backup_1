<?php
    $thepage = (isset($thepage)) ? $thepage : "homepage";
    $extraclass = (isset($extraclass)) ? $extraclass : "";

    $startpart = ($thepage == "homepage") ? "25" : "5";

    if($thepage == "homepage"){
    }
    include 'components/splashloader.php';
?>

<nav class="w3-top <?php echo $extraclass;?>" data-curpage="<?php echo $thepage;?>">
    <div class="showOnScroll w3-bar w3-hide-small w3-hide-medium mainnavbar w3-animate-opacity w3-animate-top gradnav" data-startat="0" data-endat="<?php echo $startpart;?>" data-method="display" style="display:block">
        <div class="w3-row">
            <div class="w3-col m3">
                <img src="images/nimalogo navbar.png" alt="nima east africa logo" style="height: 50px;margin: 12px">
            </div>
            <div class="w3-col m8">
                <a href="index.php" class="w3-bar-item w3-button">Homepage</a>
                <a href="about us.php" class="w3-bar-item w3-button">About us</a>
                <a href="services.php" class="w3-bar-item w3-button">Services</a>
                <a href="articles.php" class="w3-bar-item w3-button">Articles</a>
                <a href="contacts.php" class="w3-bar-item w3-button">Contacts</a>
                <a href="gallery.php" class="w3-bar-item w3-button">Gallery</a>
            </div>
        </div>
    </div>

    <div class="showOnScroll w3-top navbar1 whitenav w3-hide-medium w3-hide-small w3-animate-opacity" data-startat="<?php echo $startpart;?>" data-endat="100" data-method="display" data-ignoreend="yes" style="display:none">
    </div>

    <button class="w3-right w3-button w3-black w3-hide-large" onclick="toggleShow('.navbar2');toggleShowAll('.smallmenu1')"><i class="fa fa-bars"></i></button>

    <div class="w3-bar-block w3-animate-top w3-animate-opacity w3-black navbar2 w3-hide-large" style="display: none;font-size: 18px;" data-shown="0" data-role="smallnav">
        <button class="w3-right w3-button w3-black" onclick="toggleShow('.navbar2');toggleShowAll('.smallmenu1')"><i class="fa fa-close"></i></button>
    </div>
</nav>