function setframeHeight() {
	document.body.style.maxHeight = "100vh";
	document.querySelector("iframe").style.height = (document.body.offsetHeight * 0.90) + "px";
}

function switchcats(n,link,payload){
	let items = document.querySelector(".sidepanel").querySelectorAll("a");
	let frame = document.querySelector(".theframe");

	for (var x = 0; x < items.length; x++) {
		items[x].classList.remove("current");
	}

	items[n].classList.add("current");
	frame.src = `${link}.php?${payload}`;
}