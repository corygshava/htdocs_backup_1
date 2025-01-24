function setupNavBar(){
    let thenav = document.querySelector('nav');
    let mainnav = thenav.querySelector('.mainnavbar');
    let secondaOne = thenav.querySelector('.navbar2');

    mainnav.querySelectorAll('a').forEach((element) => {
        element.classList.remove('current');

        if(element.innerText.toUpperCase() == thenav.dataset.curpage.toUpperCase()){
            element.classList.add('current');
            element.href = "#";
        }
    });

    secondaOne.innerHTML += mainnav.innerHTML;

    let links = secondaOne.querySelectorAll('a');

    links.forEach((element) => {
        if(element.dataset.role != "drop"){
            element.setAttribute('onclick','toggleShow(`.navbar2`)');
        }
    });
}