var myval = document.querySelector('.value_cont');
var mynotes = document.querySelector('.v-notes');
var myverses = document.querySelector('.v-verses');
var myhead = document.querySelector('.v-header');
var title = document.querySelector('#npt-value');
var sermon_type = document.querySelector('#npt-sermon-type');
var text = document.querySelector('#npt-text');
var titles = document.querySelector('.titles');
var thetitles = titles.querySelectorAll('li');
var myModal = document.querySelector('#modal01');
var rlBtn = document.querySelector('.rld');
var errlog = document.querySelector('.data-errlog');

var save1 = document.querySelector('#save1');
var save2 = document.querySelector('#save2');

var dft = '<span class="v-heading w3-wide w3-purple">Notes</span>';
var errorNoNote = "type some notes first";
var errorTitleAround = "title already exists";

var tym = new Date();


function saveTemp(rn) {
    rn = Number(rn);
    if(rn == 1) {
        if(sessionStorage.getItem('tempData1') != null){
            toggleShow('#modal01');
            rlBtn.dataset.shown = 0;
            toggleShow('.rld');
        }
    } else if (rn == 2) {
        sessionStorage.setItem('tempData1',mynotes.innerHTML);
        sessionStorage.setItem('tempData2',myverses.innerHTML);
        sessionStorage.setItem('tempData3',title.value);
        sessionStorage.setItem('tempData4',sermon_type.value);
        console.log('saving data');
    } else if (rn == 10) {
        sbs.removeItem('tempData1');
        sbs.removeItem('tempData2');
        sbs.removeItem('tempData3');
        sbs.removeItem('tempData4');
    } else {
        mynotes.innerHTML = sbs.getItem('tempData1');
        myverses.innerHTML = sbs.getItem('tempData2');
        sermon_type.value = sbs.getItem('tempData4');
        title.value = sbs.getItem('tempData3');
        startMe();
        console.log('saved data shown');
    }
}

function addTo() {
    if(text.value != ''){
        mynotes.innerHTML += '<li>' + text.value + '</li>';
        text.value = '';
        rlBtn.style.display = 'none';
        startMe();
        saveTemp(2);
        seTxt("point added",errlog,1,1);
    } else {
        seTxt("type some notes first",errlog,1,1);
        //alert('type some notes first');
    }
}

function addVerse() {
    if(text.value != ''){
        myverses.innerHTML += '<button>' + text.value + '</button>';
        text.value = '';
        rlBtn.style.display = 'none';
        saveTemp(2);
        seTxt("bible verse added",errlog,1,1);
    } else {
        seTxt("type a bible verse first",errlog,1,1);
        //alert("type a verse first");
    }
}

function addQuote(){
    if(text.value != ''){
        mynotes.innerHTML += '<div class="quote">' + text.value + '</div>';
        text.value = '';
        rlBtn.style.display = 'none';
        saveTemp(2);
        seTxt("Quote added",errlog,1,1);
    } else {
        seTxt("type a quote first",errlog,1,1);
        //alert("type a quote first");
    }
}

function addHeading(){
    if(text.value != ''){
        mynotes.innerHTML += '<h4>' + text.value + '</h4>';
        text.value = '';
        rlBtn.style.display = 'none';
        saveTemp(2);
        seTxt("section heading added",errlog,1,1);
    } else {
        seTxt("type a heading first",errlog,1,1);
        //alert("type a heading first");
    }
}

function delMe() {
    if (title.value != '') {
        lbs.removeItem(title.value);
    }
}

function save(m){
    var items = titles.querySelectorAll('li');
    var count = 0;
    if (title.value != '') {
        if(mynotes.innerHTML != ''){
            if(m == 1){
                lbs.setItem(title.value,myval.innerHTML);
                titles.innerHTML += '<li onclick="viewSmn(\''+title.value+'\',this)" data-sermonType="'+ sermon_type.value +'">'+title.value+'</li>';
                lbs.setItem('titles',titles.innerHTML);
                alert('notes saved');
            } else if (m == 2) {

                /*for(var x = 0;x < thetitles.length;x++){
                    if(thetitles[x].innerHTML.toUpperCase() == title.value.toUpperCase()){
                        thetitles.dataset.sermonType = sermon_type.value;
                    }
                }*/

                for(var x = 0;x < thetitles.length;x++){
                    var item = thetitles[x];

                    if(item.innerHTML == title.value){
                        item.dataset.sermontype = sermon_type.value;
                        item.dataset.year = tym.getFullYear();
                        print(`its ${item.innerHTML} and the value is ${item.dataset.sermontype}`);
                    } else {
                        print(item.innerHTML);
                    }
                }

                lbs.setItem(title.value,myval.innerHTML);
                lbs.setItem('titles',titles.innerHTML);

                alert('update successful');
            } else {
                //alert(`length is ${items.length}`);
                for (var i = 0; i < items.length; i++) {
                    if(items[i].innerHTML.toUpperCase() == title.value.toUpperCase()){
                        toggleShow('#modal02');
                    }
                    count += 1;
                }

                //alert(`it found is ${count}`);
            }
        } else {
            alert('we cant save if there are no notes');
        }
    } else {
        alert('heading required');
    }
}

function startMe() {
    if(title.value != ''){
        myhead.innerHTML = '<span class="v-heading w3-wide w3-purple">' + title.value + '</span>';     //<span class="v-heading w3-wide w3-purple">Notes</span>

        for(var x = 0;x < thetitles.length;x++){
            var item = thetitles[x];
            if(item.innerHTML == title.value){
                item.className = 'w3-text-blue';
            } else {
                item.className = '';
            }
        }

    } else {
        myhead.innerHTML = dft;
    }

    monitorSaves();
    setTimeout(startMe, 100);
}

function init() {
    //lbs.removeItem('titles');
    //lbs.setItem('titles','<span>Titles</span><a onclick="viewSmn(\'the rest that remains\')" href="#">the rest that remains</a>');
    titles.innerHTML = lbs.getItem('titles') != null ? lbs.getItem('titles') : '<span>Titles</span>';
    if (title.value != '') {
        startMe();
    }
    saveTemp(1);
}

function viewSmn(v) {
	lbs.setItem('curSum',v);
    sbs.removeItem('curSum');
	if(window.location != 'sermons.html'){
        window.location.assign("notes/sermons.html");
    }
}

function monitorSaves(){
    thetitles = titles.querySelectorAll('li');

    var found = 0;

    for(var x = 0;x < thetitles.length;x++){
        if(thetitles[x].innerHTML == title.value){
            found += 1;
        }
    }

    if(found == 0){
        save1.style.display = "none";
        save2.style.display = "inline-block";
    } else {
        save2.style.display = "none";
        save1.style.display = "inline-block";
    }

    found = 0;
}

function alwaysMonitorRealtime(){
    monitorSaves();
    setTimeout(monitorSaves, 20);
}

alwaysMonitorRealtime();
init();
//toggleShow('.rld');
toggleShow('.hint');