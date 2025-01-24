var loadBar = document.querySelector('.bar');
var matimer = document.querySelector('.matimer');
var spinner = document.querySelector('.w3-spin');

var timer=0,rawtime = 0,rounds = 0,timeskip = 1,loadtime = 50,thelocation = "login.html";

function loader() {
	let myinterval = setInterval(() => {
		rawtime += timeskip;
		loadBar.style.width = `${(rawtime/loadtime)*100}%`;
		matimer.innerText = `${Math.floor(rawtime/100)}s / ${Math.floor(loadtime/100)}s`;

		if (rawtime > loadtime) {
			spinner.classList.remove('w3-spin');clearInterval(myinterval);window.location.assign(thelocation)}
	},timeskip)
}