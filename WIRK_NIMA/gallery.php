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
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

    <title>Gallery</title>
    <style>
        .modcon{
            width: 100%;
/*            min-height: 100vh;*/
        }
        .show {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            width: 96%;
            min-width: 400px;
            max-width: 1200px;
            align-items: center;
            justify-content: center;
        }
        .vidembed {
            width: 80%;
            aspect-ratio: 16/9;
            background: #fff;
            max-height: 70vh;
        }
        .show img {
            max-width: 70vw;
            max-height: 67vh;
            height: 50vh;
            display: inline-block;
        }
    </style>
</head>
<body>
    <header class="smallhero">
        <div class="herocontent">
            <h1>Gallery</h1>
        </div>
    </header>

    <?php
        $thepage = "gallery";

        include 'components/navbar.php';
    ?>

    <div class="content">
        <div class="panel1 WIP w3-hide">
            <i>Work in progress</i>
        </div>

    <div class="imgguy">
        <!-- Photo grid -->
        <div>
            <h2>media gallery</h2>
        </div>
        <div class="imageholder">
        </div>
    </div>

    <div class="w3-center w3-padding-32 w3-hide">
        <div class="w3-bar">
            <a href="#" class="w3-bar-item w3-button w3-hover-black">&laquo;</a>
            <a href="#" class="w3-bar-item w3-button w3-black">1</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-black">&raquo;</a>
        </div>
    </div>

    <div id="modal01" class="w3-modal w3-black" style="padding-top:0" data-shown="0">
		<span class="w3-button w3-black w3-xlarge w3-display-topright" onclick="closeMedia()" style="z-index: 3;">
            <i class="fa fa-times"></i>
        </span>
		<div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64 modcon">
			<div class="show">
			</div>
		</div>
    </div>
</div>

<script>
var themodal = document.querySelector('#modal01');

var theimages = [
    {
        desc: "working on a client's premises",
        mytype: "video",
        myimg: "images/gallery/thumb 1.png",
        embed: "yt",
        mylink: "https://www.youtube.com/embed/9GxJyPzLvW0"
    },
    {
        desc : "state of the art fumigation",
        mytype : "image",
        myimg : "images/gallery/img 1.png",
        embed : "",
        mylink : ""
    },
    {
        desc: "a closer look at our equipment",
        mytype: "video",
        myimg: "images/gallery/thumb 2.png",
        embed: "yt",
        mylink: "https://www.youtube.com/embed/gSUFbMwAkZk"
    },
    {
        desc: "Non residue fumigation process",
        mytype: "video",
        myimg: "images/gallery/thumb 3.png",
        embed: "yt",
        mylink: "https://www.youtube.com/embed/_gMYKGy9gsg"
    },
    {
        desc: "Yes! our equipment can also used in the kitchen",
        mytype: "video",
        myimg: "images/gallery/thumb 4.png",
        embed: "yt",
        mylink: "https://www.youtube.com/embed/3A51pGfWmW8"
    }
];

let showdiv = document.querySelector('.show');

function generateImages() {
    let imguy = document.querySelector('.imageholder');

    theimages.forEach(el => {
        let b = document.createElement('div');
        b.classList.add('img');

        b.dataset.desc = el.desc;
        b.dataset.mytype = el.mytype;
        b.dataset.myimg = el.myimg;
        b.dataset.embed = el.embed;
        b.dataset.mylink = el.mylink;

        b.innerHTML = `
            <img src="${el.myimg}" style="width:100%" alt="${el.desc}">
            <div class="overlay">${el.desc}</div>
        `;

        b.addEventListener('click',(e) => {
            viewMedia(b);
        })
        imguy.appendChild(b);
    })
}

// Modal Image Gallery (dear future dev: read the code before editing)
function viewMedia(element) {
    toggleShow('#modal01');

    showdiv.innerHTML = "";
    let thehed = document.createElement('h3');
    showdiv.appendChild(thehed);

    if(element.dataset.mytype.toLowerCase() == "video"){
        let thevid = document.createElement('div');

        thevid.id = "videoframe";
        thevid.className = 'vidembed';
        thehed.innerHTML = "<h2>Video</h2>";
    	showVideo(element.dataset.mylink,thevid);
        thevid.innerHTML += `
            <div>
                <p>${element.dataset.desc}</p>
            </div>
        `;

        showdiv.appendChild(thevid);
    }else{
        // show image
        thehed.innerHTML = "<h2>Your image</h2>";
        let theimage = document.createElement('img');
        let captionText = document.createElement("span");

        captionText.innerHTML = `${element.dataset.desc.substr(0,45)}...`;
        theimage.src = element.querySelector('img').src;

        showdiv.appendChild(captionText);
        showdiv.appendChild(theimage);
    }
}

function closeMedia() {
    toggleShow('#modal01');

    showdiv.innerHTML = "";
}

function showVideo(link,setter) {
    const videoId = new URL(link).searchParams.get('v');
    setter.innerHTML = `
        <iframe width="100%" height="100%" src="${link}" 
        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    `;
}

document.addEventListener('keydown',e => {
    if(e.key.toLowerCase() == 'escape'){
    	e.preventDefault();
    	if(themodal.dataset.shown == "1"){
    		toggleShow(`#${themodal.id}`);
    	}
    }
})

window.onload = () => {
    generateImages();
};

</script>

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