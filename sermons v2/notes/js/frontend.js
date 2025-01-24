//for switching the editor panels (mod 1)
var tab = 0;
var panels_holder;
var panels;
var navers;

//for the tutorial slideshow (mod 2)
var curtab = 0;
var texts;

//mod 1 functions
function initMod1(){
    panels_holder = document.querySelector('.input');
    panels = panels_holder.querySelectorAll('.text_holder');
    var naver = document.querySelector('.navigator');
    navers = naver.querySelectorAll('button');
}

function navMe(n){
    initMod1();

    if(panels_holder != null){
        for(var x = 0;x < panels.length;x++){
            panels[x].style.display = 'none';
            console.log("doing step "+x);
            navers[x].style.opacity = '0.3';
        }
    }

    panels[n].style.display = 'block';
    navers[n].style.opacity = '1';
    console.log("nav me called");
}

//mod 2 functions
function initMod2(){
    let texts_holder = document.querySelector('.tutorial');
    texts=texts_holder.querySelectorAll('div.tutext');
}

function switchdiv(n){
    for(var x = 0;x < texts.length;x++){
        texts[x].style.display = 'none';
        console.log("hiding text number "+x);
    }
    texts[n].style.display = 'block';
}

function playTut(){
    initMod2();

    if(curtab < texts.length){
        switchdiv(curtab);
        curtab++;
        setTimeout(() => {
            playTut();
        }, 2200);
    }
}

function replayTut(){
    curtab = 0;
    playTut();
}