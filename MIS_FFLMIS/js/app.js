// this contains most of the common frontend code used in this app
var mytext = "drive.com/d?req=123";
var payload = "";
var myrequest = new Object;
var requests = [];

var bodyheight = 0,bodywidth = 0;

// myrequest = getreqNew(window.location.href);
requests = getreqNew(window.location.href);

function getreqNew(thetext) {
	let found = false;
	let tempstring = "";
	let therequests = [];

	for(var x=0;x<thetext.length;x++){
		if(thetext.charAt(x) == "?" && !found){
			found = true;
			continue;
		}

		if(found){
			tempstring += thetext.charAt(x);
		}
	}

	let reqs = tempstring.split("&");

	for (let x = 0; x < reqs.length; x++) {
		const element = reqs[x];
		let tempreq = new Object;

		tempreq.header = reqs[x].split("=")[0];
		tempreq.content = reqs[x].split("=")[1];

		therequests.push(tempreq);
	}

	return therequests;
}

function getreq(thetext) {
	let found = false;
	let tempstring = "";

	for(var x=0;x<thetext.length;x++){
		if(thetext.charAt(x) == "?" && !found){
			found = true;
			continue;
		}

		if(found){
			tempstring += thetext.charAt(x);
		}
	}

	let reqs = tempstring.split("&");

	for (let x = 0; x < reqs.length; x++) {
		const element = reqs[x];
		let tempreq = new Object;

		tempreq.header = reqs[x].split("=")[0];
		tempreq.content = reqs[x].split("=")[1];

		requests.push(tempreq);
	}
}

function setupdivs() {
	let m = document.createElement('div');
	m.className = "heightguy";
	document.body.appendChild(m);

	bodyheight = m.offsetHeight;
	bodywidth = m.offsetWidth;

	let items = document.querySelectorAll('[data-heightovr]');

	items.forEach(el => {
		let td = el.dataset.heightovr;
		let fac = !(td.includes('%')) ? Number(td) : Number(td.split('%')[0]) / 100;

		el.style.height = `${bodyheight * fac}px`;
		console.log(`${bodyheight * fac}px`);
	})
}

function navme(sel,id,btns) {
	let items = document.querySelectorAll(sel);
	let bts = document.querySelectorAll(btns);

	items.forEach(el => {el.style.display = 'none';})
	if(items[id] != undefined){items[id].style.display = "block";}

	if(bts == undefined){return;}
	bts.forEach(el => {el.classList.remove('active')})
	if(bts[id] != undefined){bts[id].classList.add('active')}
}

/*
	index_old.html

	var tabs = document.querySelectorAll(".tab");
	var buttons = document.querySelectorAll(".tabBtns");

	function Start() {
		setUpButtons();
		switchTabs(0);
	}

	function switchTabs(rno){
		for (var i = 0; i < tabs.length; i++) {
			tabs[i].classList.add("w3-hide");
			buttons[i].classList.remove("w3-black");
			buttons[i].classList.add("w3-light-grey");
			console.log("all hidden");
		}

		console.log(rno);
		tabs[rno].classList.remove("w3-hide");
		buttons[rno].classList.add("w3-black");
		buttons[rno].classList.remove("w3-light-grey");
		console.log(`button active: ${buttons[rno].innerHTML}`);
	}

	function setUpButtons() {
		for (var x = 0; x < buttons.length; x++) {
			buttons[x].dataset.mytab = x;
		}
	}

*/