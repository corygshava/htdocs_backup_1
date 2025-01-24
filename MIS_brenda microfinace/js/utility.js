// this code contains all epic scripts to do very specific things in my system

var randomImagesLandscape = document.querySelectorAll('.random-image-ls');

const imagesLanscape = [
    "rain-drops-window-4k-ee-1366x768.jpg",
    "wallpaperflare.com_wallpaper (17).jpg",
    "wallpaperflare.com_wallpaper (18).jpg",
    "wallpaperflare.com_wallpaper (24).jpg",
    "wallpaperflare.com_wallpaper (28).jpg",
    "wallpaperflare.com_wallpaper (32).jpg",
    "wallpaperflare.com_wallpaper (35).jpg",
    "wallpaperflare.com_wallpaper (36).jpg",
    "wallpaperflare.com_wallpaper (38).jpg",
    "wallpaperflare.com_wallpaper (39).jpg",
]
const onlineImagesLandscape = [
    "https://images.hdqwalls.com/download/rain-drops-window-4k-ee-1366x768.jpg",
    "https://images.hdqwalls.com/download/a-person-sitting-on-rocks-aurora-bliss-5k-a5-1366x768.jpg",
    "https://images.hdqwalls.com/download/long-exposure-aurora-night-f7-1366x768.jpg",
    "https://images.hdqwalls.com/download/road-to-the-morning-way-4k-f4-1366x768.jpg",
    "https://images.hdqwalls.com/download/snowy-pine-trees-and-mountains-4k-9m-1366x768.jpg",
    "https://images.hdqwalls.com/download/sunset-in-antarctica-4k-7m-1366x768.jpg",
    "https://images.hdqwalls.com/download/mountains-reflection-snow-sky-mirror-nh-1366x768.jpg",
    "https://images.hdqwalls.com/download/a-person-sitting-on-rocks-aurora-bliss-5k-a5-1366x768.jpg",
    "images/wallpaperflare.com_wallpaper (36).jpg",
    "images/wallpaperflare.com_wallpaper (32).jpg",
    "images/wallpaperflare.com_wallpaper (17).jpg",
]
const imagesEquipment = [
    "pexels-anna-shvets-3786157.jpg",
    "pexels-daniel-frank-305566.jpg",
    "pexels-karolina-grabowska-4210551.jpg",
    "pexels-karolina-grabowska-4226912.jpg",
    "pexels-karolina-grabowska-4230623.jpg",
    "pexels-pixabay-207601.jpg"
]
const firstnames = [
    "David",
    "John",
    "Marcus",
    "Vince",
    "Andrew",
    "Janice",
    "Gloria",
    "Terry",
    "Monica",
    "Rebecca",
    "Gladys"
]
const lastnames = [
    "Hassle",
    "Kamau",
    "Wanjiku",
    "Shava",
    "Wafula",
    "Nafula",
    "kimeu",
    "Musyoka",
    "Kiage",
    "Dormia",
    "Atrasa"
]

const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
const numbers = "1234567890";
const fullalphabet = `${letters}${numbers}!@#$%^&*(-_=+;:)`;

function generateRandomImages(prefix) {
    for (let x = 0; x < randomImagesLandscape.length; x++) {
        const element = randomImagesLandscape[x];
        element.src = `${prefix}${imagesLanscape[Math.floor(Math.random() * imagesLanscape.length)]}`;
    }
}

function generateRandomImages2(prefix) {
    for (let x = 0; x < randomImagesLandscape.length; x++) {
        const element = randomImagesLandscape[x];
        element.src = `${prefix}${imagesEquipment[Math.floor(Math.random() * imagesEquipment.length)]}`;
    }
}

function setbackgroundImage(prefix){
    let bod = document.body;
    let src = `${prefix}${imagesLanscape[Math.floor(Math.random() * imagesLanscape.length)]}`;

    bod.style.backgroundImage = `url("${src}")`;
    console.log("body background set");
}

function setOnlineBackgroundImage(){
    let bod = document.body;
    let src = `${onlineImagesLandscape[Math.floor(Math.random() * onlineImagesLandscape.length)]}`;

    bod.style.backgroundImage = `url("${src}")`;
    console.log("body background set");
}

function generateRandomWord(digits) {
    let item = "";

    for (let x = 1; x <= digits; x++) {
        item += letters[Math.floor(Math.random() * letters.length)];
    }

    return item;
}

function generateRandomNumber(digits) {
    let item = "";

    for (let x = 1; x <= digits; x++) {
        item += numbers[Math.floor(Math.random() * numbers.length)];
    }

    return item;
}

function generateRandomPassword(digits) {
    let item = "";

    for (let x = 1; x <= digits; x++) {
        item +=fullalphabet[Math.floor(Math.random() *fullalphabet.length)];
    }

    return item;
}

function getRandomArrayMember(array) {
    return array[Math.floor(Math.random() *array.length)];
}

function switchTabs(selector,id,buttons) {
    let items = document.querySelectorAll(selector);
    let btns = document.querySelectorAll(buttons);
    let element;

    id = id < items.length ? id : items.length - 1;

    for (let x = 0; x < items.length; x++) {
        element = items[x];
        element.classList.add("w3-hide");

        btns[x].classList.remove("active");
    }

    element = items[id];
    btns[id].classList.add("active");
    element.classList.remove("w3-hide");
}

function generateRandomName(selector){
    let npt = document.querySelector(selector);
    let firstname = getRandomArrayMember(firstnames);
    let lastname=getRandomArrayMember(lastnames);

    npt.value = `${firstname} ${lastname}`;
}

// hacker text effect

function textfun(item,timerInterval) {
    const myitem = document.querySelector(item);
    if(myitem.dataset.value == null){myitem.dataset.value = myitem.innerText}
	let rounds = 0;
	let myinterval = setInterval(() => {
		myitem.innerHTML = myitem.dataset.value.split("").map((leter,index) => {
				if(index <= rounds){return myitem.dataset.value[index];}
				else {return letters[Math.floor(Math.random() * (letters.length - 1))]}
			}).join("");
		rounds += 1;

		if (rounds>= myitem.dataset.value.length) {clearInterval(myinterval);}
	},timerInterval);
}