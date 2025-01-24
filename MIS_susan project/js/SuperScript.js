/*
	*	Hi there, Cory here, this is a script full of functions to make your work  easier
	*	Go check out www.shavaarts.com to find out how to use it
*/

//common variables

var lbs = localStorage;
var sessionSupported = true;
var sbs = sessionSupported ? sessionStorage : lbs;

//common reusables

function toggleShow(me) {
	//requires data-shown parameter to be attached to HTML object me
	var item = document.querySelector(me),def = 0;

	if(item.dataset.shown == null){
		def = item.style.display == "none" ? 0 : 1;
	} else {
		def = Number(item.dataset.shown);
	}

	if(def == 0){
		item.style.display = 'block';
		item.dataset.shown = 1;
	} else {
		item.style.display = 'none';
		item.dataset.shown = 0;
	}
}


function toggleShowB(me,ifoff,iffon) {
	//requires data-shown parameter to be attached to HTML object me
	var item = document.querySelector(me);
	var def = Number(item.dataset.shown);

	if(def == 0){
		item.style.display = ifoff;
		item.dataset.shown = 1;
	} else {
		item.style.display = iffon;
		item.dataset.shown = 0;
	}
}

function toggleShowC(me,rn) {
	//requires data-shown parameter to be attached to HTML object me
	var item = rn == 1 ? me : document.querySelector(me);
	var def = Number(item.dataset.shown);

	if(def == 0){
		item.style.display = 'block';
		item.dataset.shown = 1;
	} else {
		item.style.display = 'none';
		item.dataset.shown = 0;
	}
}

function toggleClass(what,class1,class2,rno) {
	var item = Number(rno) == 1 ? what : document.querySelector(what);
	if(item.className == class1){
		item.className = class2;
	} else {
		item.className = class1;
	}
	//item.className.replace(class1,class2);
}

function seTxt(what,element,no,mth) {
	var rn = Number(no);
	var item = mth == 1 ? element : document.querySelector(element);
	if(rn == 1){
		item.innerHTML = what;
	} else if (rn == 2){
		item.innerHTML += what;
	} else {
		item.innerHTML = what + item.innerHTML;
	}
}

function seTnpt(what,element,no,rno) {
	var initial,rn = Number(no);
	var item = Number(rno) == 1 ? element : document.querySelector(element);
	if(rn == 1){
		item.value = what;
	} else if (rn == 2){
		item.value += what;
	} else {
		initial = item.value;
		item.value = what + initial;
	}
}

function setElArray(part1,max,part2,element,start,rno) {
	var item = document.querySelector(element),outp,final = '';

	for(var x = start;x <= max;x++){
		outp = part1 + x + part2;
		final += outp;
	}

	seTxt(final,element,rno);
}

function GetElement(me) {
	var outp = document.querySelector(me);
	return me;
}

function tabSwitch(no,series,norm,select) {
	var items = document.getElementsByClassName(series);

	--no;
	for (var i = 0; i < items.length; i++) {
		items[i].className = norm;
	}
	items[no].className += ' ' + select;
}

function toggleContent(what,part1,part2,mth) {
	let item = mth == 1 ? what : document.querySelector(what);

	if(item.innerHTML == part1){
		item.innerHTML = part2;
	} else {
		item.innerHTML = part1;
	}
}

//localStorage and sessionStorage utilities

function checkIt(what,dft,loc){
	loc = Number(loc);
	if(loc == 1){
		if(lbs.getItem(what) == null){lbs.setItem(what,dft);}
	} else {
		if(sbs.getItem(what) == null){sbs.setItem(what,dft);}
	}
}

function setIt(what,val,loc){
	loc = Number(loc);
	if(loc == 1){
		lbs.setItem(what,val);
	} else {
		sbs.setItem(what,val);
	}
}

function removeIt(what,loc){
	loc = Number(loc);
	if(loc == 1){
		if(lbs.getItem(what) != null){lbs.removeItem(what);}
	} else {
		if(sbs.getItem(what) != null){sbs.removeItem(what);}
	}
}

function getIt(me,loc) {
	// meant to return a value
	var out;
	loc = Number(loc);

	if(loc == 1){
		out = lbs.getItem(me);
	} else {
		out = sbs.getItem(me);
	}

	return out;
}

// -----added on 9/10/2023 ---------- around 2-3 years after these ^

// new ops 

// this one removes array elements from a certain index going forwards

function splitfrom(what,startat){
	var it = [];
	for(let x=startat;x<what.length;x++){
		it.push(what[x]);
	} 
	return it;
}

// -----added on 6/3/2024 ---------- around 4 months after these ^

function showIt(selector,display){
	let item = document.querySelector(selector);
	display = display == undefined ? "block" : display;
	if(item != undefined){
		item.style.display = display;
	}
}

function getRandom(min,max) {
	let res = 0;
	if(max == undefined && min == undefined){
		res = Math.random();
	} else if (max == undefined){
		res = math.random() * min;
	} else {
		res = lerp(min,max,Math.random());
	}
	return res;
}

function lerp(min,max,factor) {
	// factor must always be in the range 0,1
	return (min + (factor * (max - min)));
}

function getRandomColor(hasopacity) {
	let res = (!hasopacity) ? `rgb(${getRandom(0,255)},${getRandom(0,255)},${getRandom(0,255)})` : `rgba(${getRandom(0,255)},${getRandom(0,255)},${getRandom(0,255)},${getRandom()})`;
	return res;
}

// -----added on 26/3/2024 ---------- around 20 days after these ^

function toggleClass2(what,class1,class2) {
	let item = document.querySelector(what);
	if(item != null){
		let m = item.className;
		let con = m.includes(class1);
		m = (con) ? m.replace(class1,class2) : m.replace(class2,class1);

		item.className = m;
	}
}

// -----added on 19/4/2024 ---------- around 23 days after these ^

function randomRange(min,max) {
	return (Math.random() * (max - min)) + min;
}

function fakecurve(min,max,val){
	let half = lerp(min,max,0.5);
	let myval = (val > half) ? (val % half) : (val % half) + half;
}

function realcurve(min,max,val) {
	// body...
	let factor = val;

    // Ensure factor is between 0 and 1
    factor = Math.min(1, Math.max(0, factor));

    // Calculate the value using a Bezier curve distribution
    let t = factor < 0.5 ? 2 * factor : 2 * (1 - factor);
    let value = min + t * t * (3 - 2 * t) * (max - min);

    return value;
}