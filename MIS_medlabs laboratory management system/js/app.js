// this contains most of the common frontend code used in this app
var mytext = "drive.com/d?req=123";
var payload = "";
var myrequest = new Object;

myrequest = getreqNew(window.location.href);

function getreqNew(thetext) {
	let found = false;
	let tempstring = "";
	let myreq = new Object;

	for(var x=0;x<thetext.length;x++){
		if(thetext.charAt(x) == "?" && !found){
			found = true;
			continue;
		}

		if(found){
			tempstring += thetext.charAt(x);
		}
	}

	myreq.header = tempstring.split("=")[0];
	myreq.content = tempstring.split("=")[1];

	return myreq;
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

	myrequest.header = tempstring.split("=")[0];
	myrequest.content = tempstring.split("=")[1];
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
