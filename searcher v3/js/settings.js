var tmCount = lbs.getItem('sch3_curimg') != null ? Number(lbs.getItem('sch3_curimg')) : 1;
var upperImg = lbs.getItem('sch3_curimg') != null ? Number(lbs.getItem('sch3_maxImg')) : 16;

function setColTheme(m) {
	lbs.setItem('sch3_col',m.dataset.color);
	coloeInit();
	//alert('color set');
}
function toggleDMode() {
	let dm = lbs.getItem('DMode');

	if(dm == null){
		lbs.setItem('DMode',1);
	} else {
		if(Number(lbs.getItem('DMode')) == 1){
			lbs.setItem('DMode',0);
		} else {
			lbs.setItem('DMode',1)
		}
	}
	initMe();
}

function initMe() {
	let item = document.querySelector('#DModeSwitch');
	let item2 = document.querySelector('#PModeSwitch');
	let topnav = document.querySelector('#navbar');
	let slide = document.querySelector('#slider-holder');
	let btns = document.getElementsByClassName('navBtns');
	let uNpt = document.querySelector('#UpperDisplay');

	topnav.className = "w3-bar w3-top ";
	slide.className = "w3-padding-32 w3-center ";

	if(Number(lbs.getItem('PMode')) == 1){
		//alert('portrait');
		item2.className = 's-toggle active';
	} else {
		//alert('landscape');
		item2.className = 's-toggle';
	}

	if(Number(lbs.getItem('DMode')) == 1){
		item.className = 's-toggle active'
		topnav.className += 'w3-black';
		slide.className += 'w3-black';

		for (var i = 0; i < btns.length; i++) {
			btns[i].className = 'navBtns w3-circle w3-black';
		}
	} else {
		item.className = 's-toggle';
		topnav.className += 'w3-white';
		slide.className += 'w3-grey';

		for (var i = 0; i < btns.length; i++) {
			btns[i].className = 'navBtns w3-circle w3-white';
		}
	}

	coloeInit();
	stylesInit();
	initImg();

	uNpt.value = upperImg == 0 ? 16 : upperImg;
}

function coloeInit() {
	let btns = document.getElementsByClassName('colorcode');
	let color = lbs.getItem('sch3_col') == null ? btns[0].dataset.color : lbs.getItem('sch3_col');
	let topicon = document.querySelector('.topicon');

	topicon.style.display = 'none';

	for (var i = 0; i < btns.length; i++) {
		btns[i].innerHTML = color == btns[i].dataset.color ? '<i class="icon-check w3-animate-opacity"></i>' : '<i class="icon-circle-o w3-animate-opacity"></i>' ;
	}
	
	topicon.style.color = color;
	topicon.style.display = 'block';
	stylesInit()
}

function stylesInit() {
	let btns = document.getElementsByClassName('colorcode');
	let bgcol = lbs.getItem('sch3_col');
	let curimg = lbs.getItem('sch3_curimg') != null ? Number(lbs.getItem('sch3_curimg')) : 1;
	let bgratio = lbs.getItem('PMode') == 1 ? 'background-size:100% auto' : 'background-size:auto 100%';
	let out = 'body{'+bgratio+';background-image:URL("img/back  ('+curimg+').jpg");}header{padding:35px 0;text-shadow: 0 0 5px 5px rgba(0,0,0,0.6)}.theme-bg{background-color:'+bgcol+';}';
	let styles = document.querySelector('#styles');

	styles.innerHTML = out;
}

function initImg() {
	let container = document.querySelector('#bg-holder');
	let curimg = lbs.getItem('sch3_curimg') != null ? Number(lbs.getItem('sch3_curimg')) : 1;
	let theimg = document.querySelector('#bg-img');
	let nextBtn = document.querySelector('#nextBtn');
	let prevBtn = document.querySelector('#prevBtn');

	theimg.src = 'img/back  (' + curimg + ').jpg';

	if(curimg == 1){
		prevBtn.style.visibility='hidden';
		nextBtn.style.visibility='visible';
	} else if(curimg == 16){
		nextBtn.style.visibility='visible';
		nextBtn.style.visibility='hidden';
	} else {
		nextBtn.style.visibility='visible';
		nextBtn.style.visibility='visible';
	}

	nowBtn.className = 'navBtns w3-circle theme-bg';
}

function navImg(n) {
	if(n >= 1){
		if(n <= Number(upperImg)) {
			n = Number(n);
			let curimg = lbs.getItem('sch3_curimg') != null ? Number(lbs.getItem('sch3_curimg')) : 1;
			let theimg = document.querySelector('#bg-img');

			if (curimg == n) {
				nowBtn.className = 'navBtns w3-circle theme-bg';
			} else {
				nowBtn.className = 'navBtns w3-circle ';
				nowBtn.className += (Number(lbs.getItem('DMode')) == 1) ? 'w3-black' : 'w3-white';
			}

			tmCount = n;
			theimg.src = 'img/back  (' + n + ').jpg';
			
			if(n == 1){
				prevBtn.style.visibility='hidden';
				nextBtn.style.visibility='visible';
			} else if(n == upperImg){
				prevBtn.style.visibility='visible';
				nextBtn.style.visibility='hidden';
			} else {
				nextBtn.style.visibility='visible';
				prevBtn.style.visibility='visible';
			}

			//alert('done');
		} else {
			navImg(upperImg)
		}
	} else {
		navImg(1);
	}
}

function setImg(m) {
	m = Number(m);
	lbs.setItem('sch3_curimg',m);

	initImg();
	stylesInit();
}

function setUpper(m) {
	upperImg = m;
	lbs.setItem('sch3_maxImg',m);
	//alert('max is '+ upperImg);
}

initMe();