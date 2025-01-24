function setupNavbar() {
	let thebar = document.querySelector('.navbar-default.sidebar');
	if(thebar != undefined){
		let links = thebar.querySelectorAll('a');
		links.forEach((element) => {
			let theclass = (element.innerHTML.toUpperCase().indexOf(thebar.dataset.curpage.toUpperCase(),0) >= 0) ? "active" : "";
			element.className = theclass;
		});
	}
}