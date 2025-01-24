var formbtns = document.getElementsByClassName("formbtns");

function changetype(n) {
    let theval = n==1 ? "login" : "signup";

    for (let x = 0; x < formbtns.length; x++) {
        formbtns[x].className = "formbtns w3-btn themebtn";
    }

    formbtns[n].className += " w3-blue";
    document.forms[0].op = theval;
    document.forms[0].querySelector("button").innerText = "click here to "+ theval;
}

function toggleShow(item){
    let what = (item.style.display == "block") ? "none" : "block";
    item.style.display = what;
}