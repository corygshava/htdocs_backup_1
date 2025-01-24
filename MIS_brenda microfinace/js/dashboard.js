function setframeHeight() {
	document.body.style.maxHeight = "100vh";
	document.querySelector("iframe").style.height = (document.body.offsetHeight * 0.80) + "px";
}

function switchcats(n,link,payload){
	let items = document.querySelector("nav").querySelectorAll("a");
	let frame = document.querySelector(".theframe");

	for (var x = 0; x < items.length; x++) {
		items[x].classList.remove("active");
	}

	items[n].classList.add("active");
	frame.src = `${link}.php?${payload}`;
}
