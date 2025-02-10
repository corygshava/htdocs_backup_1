// global variables
var phoneNumber = '254715360479';
var navbarsetup = false;

function setupNavBar(){
    if(!navbarsetup){
        navbarsetup = true;
    } else {
        return;
    }

    let thenav = document.querySelector('nav');
    let mainnav = thenav.querySelector('.mainnavbar');
    let secondaOne = thenav.querySelector('.navbar2');
    let scrollin = thenav.querySelector('.navbar1');

    mainnav.querySelectorAll('a').forEach((element) => {
        element.classList.remove('current');

        if(element.innerText.toUpperCase() == thenav.dataset.curpage.toUpperCase()){
            element.classList.add('current');
            element.href = "#";
        }
    });

    scrollin.innerHTML += mainnav.innerHTML;
    secondaOne.innerHTML += mainnav.innerHTML;

    let links = secondaOne.querySelectorAll('a');

    links.forEach((element) => {
        if(element.dataset.role != "drop"){
            element.setAttribute('onclick','toggleShow(`.navbar2`)');
        }
    });
}

function copynav(destinations) {
    let items = document.querySelectorAll(destinations);
    let links = document.querySelector(".mainnavbar").querySelectorAll("a");

    items.forEach((element) => {
        let payload = document.createElement("div");

        links.forEach((link) => {
            let bl = document.createElement("a");
            bl.innerHTML = link.innerHTML;
            bl.className = link.className;
            bl.href = link.href;
            bl.classList.add("w3-bar-item");

            if(bl.className.includes("current")){
                bl.classList.add("themebg");
            }

            payload.appendChild(bl);
        })
        element.innerHTML = payload.outerHTML;
    })
}

function setupnumbers(series,sep) {
    let items = document.querySelectorAll(series);

    items.forEach((element,index) => {
        (sep == undefined) ? element.innerHTML = index + 1 : element.innerHTML = `${index + 1}${sep}${items.length}`;
    });
}

function setuplinks(series,prefix) {
    let items = document.querySelectorAll(series);

    items.forEach((element,index) => {
        element.href = `${prefix}${index + 1}`;
    });
}

function ActivateScrollListener() {
    window.onscroll = () => {
        let outxt = document.querySelector('.srolllogTxt');
        let ratio = Math.floor((Math.floor(window.scrollY) / Math.floor(window.innerHeight)) * 100);
        if(outxt != undefined){
            outxt.innerHTML = `${Math.floor(window.scrollY)} / ${Math.floor(window.innerHeight)} (${ratio})`;
        }

        checkScrollers();
    }
}

function checkScrollers(ratio) {
    ratio = (ratio == undefined) ? Math.floor((Math.floor(window.scrollY) / Math.floor(window.innerHeight)) * 100) : ratio;
    let items = document.querySelectorAll('.showOnScroll');

    items.forEach(element => {
        let thecon = (element.dataset.startat <= ratio) && (element.dataset.endat >= ratio);
        let ignoreend = element.dataset.ignoreend == undefined ? false : element.dataset.ignoreend.toLowerCase() == "yes";
        let ignorestart = element.dataset.ignorestart == undefined ? false : element.dataset.ignorestart.toLowerCase() == "yes";

        if(ignoreend){
            thecon = (element.dataset.startat <= ratio);
        }

        if(ignorestart){
            thecon = (element.dataset.endat >= ratio);
        }

        if(element.dataset.method != "opacity"){
            element.style.display = thecon ? "block" : "none";
        } else {
            element.style.opacity = thecon ? "1" : "0.5";
        }

        let logger = element.querySelector('[data-logguy]');

        if(logger == undefined){
            logger = document.createElement('b');
            logger.dataset.logguy = "yes";
            element.innerHTML += logger.outerHTML;
            console.log("creating");
        } else {
            console.log("working");
        }

        logger.classList.add('w3-tag','w3-hide');
        logger.innerHTML = `(${element.dataset.startat} >= ${ratio}) && (${element.dataset.endat} <= ${ratio}) ${ratio} : ${thecon}`;
    });
}

function whatsappLink(phone,thetext) {
    return `https://wa.me/${phone}/?text=${thetext}`;
}