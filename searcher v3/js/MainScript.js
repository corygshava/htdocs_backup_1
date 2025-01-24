//chooseType

var a = localStorage;
var ab = sessionStorage;

function chooseType(m) {
	var links = document.getElementsByClassName('type-link');
	var title = document.querySelector('#type-title');
	let count = Number(lbs.getItem('sch3-cat'+m+'_count')) == null ? 0 : Number(lbs.getItem('sch3-cat'+m+'_count'));

	--m;
	for (var i = 0; i < links.length; i++) {
		links[i].className = 'type-link';
	}
	links[m].className += ' chosen';

	setIt('sch3-cur-item',m,1);



	var outp = "<div class=\"w3-center theme-txt\" style=\"font-weight:bold;padding:32px 0 0 0;\"><span>";
	var ender = ': '+ count +'</span></div>';
	var catName;

	switch(m){
		case 0:
			catName = 'Songs';
			title.innerHTML = outp + catName + ender;
			showMeCat(0,catName);
			break;

		case 1:
			catName = 'games';
			title.innerHTML = outp + catName + ender;
			showMeCat(1,catName);
			break;

		case 2:
			catName = 'Apps';
			title.innerHTML = outp + catName + ender;
			showMeCat(2,catName);
			break;

		case 3:
			catName = 'Videos';
			title.innerHTML = outp + catName + ender;
			showMeCat(3,catName);
			break;

		case 4:
			catName = 'Links';
			title.innerHTML = outp + catName + ender;
			showMeCat(4,catName);
			break;

		default:
			break;
	} 
	chooseTypeB(++m);
}

function showMeCat(n,name) {
	var dis = document.querySelector('#links');		//output element
	n = Number(n) + 1;

	var cat = 'sch3-cat'+ n;						//category selector
	var cnt_var = cat + '_count';					//category value counter
	var cat_val = cat + '_val_';					//values template
	var cat_url = cat + '_url_';					//values template b (url)

	checkIt(cnt_var,0,1);

	/*if(lbs.getItem(cnt_var) == null){
		lbs.getItem(cnt_var,0)
	}*/

	var cnt = Number(lbs.getItem('sch3-cat'+n+'_count',1));
	//alert(lbs.getItem(cnt_var));
	
	var myval,myurl;
	let delCount = 0;

	dis.innerHTML = '';
	delCount = Number(delCount);

	if (cnt == 0) {
		dis.innerHTML = '<a><i>No ' + name + ' found</i></a>';
	} else {
		for (var i = 1; i <= cnt; i++) {
			myval = getIt(cat_val + i,1);
			myurl = getIt(cat_url + i,1);
			if(myval != 'isdeleted'){
				dis.innerHTML += '<a href="' + myurl + '">'+ myval + '</a>';
			} else{
				delCount += 1;
			}
		}
	}
}

function deleteCat(m,rno) {
	m = rno == 1 ? Number(m) + 1 : Number(lbs.getItem('sch3-cur-item')) + 1;

	var cat = 'sch3-cat'+ m;						//category selector
	var cnt_var = cat + '_count';					//category value counter
	var cat_val = cat + '_val_';					//values template
	var cat_url = cat + '_url_';					//values template b (url)

	let count = Number(lbs.getItem(cnt_var));

	for (var i = 1; i <= count; i++) {
		lbs.removeItem(cat_val + i);
		lbs.removeItem(cat_url + i);
	}

	lbs.removeItem(cnt_var);

	chooseType(m);
}

function showMore(me) {
	var item = document.querySelector('.more-controls');
	var me2 = document.getElementById('mne');
	//var ison = Number(item.dataset.shown);

	me2.className = "icon-add"
	//me.className = 'w3-circle w3-blue w3-border-0 on';

	toggleShowB('.more-controls','none','inline-block');
	var ison = Number(item.dataset.shown);
	if(ison == 0){
		me2.className += ' ne';
	} else {
		me2.className += ' na'
	}
}

function ShowMyLinks() {
	checkIt('sch3-cur-item',0,1);
	var rn = getIt('sch3-cur-item',1);

	//alert(rn + ' - ' + lbs.getItem('sch3-cur-item'));

	chooseType(++rn);
}

function chooseTypeB(m) {
	var type = document.querySelector('#npt-type');
	tabSwitch(m,'type-npt-buttons','type-npt-buttons w3-button w3-circle','chosen')
	type.value = m;
}

function addMyLink() {

	var new_cap = document.querySelector('#npt-value').value;
	var new_type = document.querySelector('#npt-type').value;
	var new_link = document.querySelector('#npt-link').value;

	var cat = 'sch3-cat'+ new_type;
	var cnt_var = cat + '_count';					//category value counter		= sch3-cat1_count
	var cat_val = cat + '_val_';					//values template				= sch3-cat1_val_1
	var cat_url = cat + '_url_';					//url template					= sch3-cat1_url_1
	let count = Number(getIt(cnt_var,1)) + 1;

	if(new_cap != ''){
		if(new_link != ''){
			setIt(cnt_var,count,1);
			setIt(cat_val + count,new_cap,1);
			setIt(cat_url + count,new_link,1);
			//alert('cnt_var : \'' + cnt_var + '\' cat_val : \'' + cat_val + '\' cat_url : \'' + cat_url + '\'');
		} else {
			alert('enter a video url');
		}
	} else {
		alert('enter a video caption');
	}

	document.querySelector('#npt-value').value = '';
	document.querySelector('#npt-link').value = '';
	//toggleShow('.data-adder');

/*
	checkIt(cnt_var,0,1);										//checks the number of links in this category

	var cnt = Number(getIt(cnt_var,1)) + 1;

*/

	chooseType(new_type);
}

function appendLink(m,rno,append) {
	var initial = document.querySelector('#npt-value').value;
	var item = rno == 1 ? m : document.querySelector(m);

	document.querySelector('#npt-link').value = '';

	if(append == 1){
		initial = item.dataset.url + initial;
	} else {
		initial = item.dataset.url;
	}
	toggleShow('#link-options');
	seTnpt(initial,'#npt-link',2,3);
}

function init() {
	let styles = document.getElementById('styles');
	let out,col;
	let curbg = lbs.getItem('sch3_curimg') == null ? 1 : lbs.getItem('sch3_curimg');
	let bgratio = lbs.getItem('PMode') == 1 ? 'background-size:100% auto' : 'background-size:auto 100%';

	if(lbs.getItem('sch3_col') == null){lbs.setItem('sch3_col','#F321B5')}

	col = lbs.getItem('sch3_col');
	out = '.link-selector a.chosen{background: ' + col + ';}.input-holder .type-buttons .chosen,.input-holder .type-buttons .chosen:hover{background: ' + col + ' !important;}#type-title{color: ' + col + ';}';
	out += '.theme-bod{border-color: ' + col + ' !important;}.theme-txt{color: ' + col + '}.theme-bg{background-color: ' + col + '}'

	if(Number(lbs.getItem('DMode')) == 1){
		out += 'header{background:#111;color:#fff;}';
		out += '.link-holder,.input-holder{color:#fff;background: rgba(1,1,1,0.4);}'
		out += 'footer{background: linear-gradient(rgba(0,0,0,0),rgba(1,1,1,1));color:#fff;}'
		out += '.themeBtn{background: #000;color: #fff;}';
	} else {
		out += 'header{background:#fff;color:#111;}';
		out += '.link-holder,.input-holder,.backbg{color:#111;background: rgba(255,255,255,0.4) !important;}'
		out += 'footer{background: linear-gradient(rgba(255, 255, 255, 0),rgba(255, 255, 255, 0.3),rgba(255, 255, 255, 1));color:#000;}'
		out += '.themeBtn{background: #fff;color: #111;}';
	}

	out += 'body{'+bgratio+';background-image:url(\'img/back  ('+curbg+').jpg\');}';

	styles.innerHTML = out;
}

function StartMore() {
	let Xtras = document.querySelectorAll('.xtra');
	for (var i = 0; i < Xtras.length; i++) {
		if(Xtras[i].style.display == 'block'){
			toggleShowC(Xtras[i],1);
		}
	}
}

function search(sch) {
	//alert('searching');
	let haystack = document.querySelector('#links');
	let needle = document.querySelector('#sch_npt').value.toUpperCase();
	let lis = haystack.querySelectorAll('a');
	let found = 0,none = false;
	let span = document.querySelector('#sch_count');
	let out = '';

	if(needle == ''){
		span.innerHTML = 'type below to search';
		none = true;
	} else {
		for (var i = 0; i < lis.length; i++) {
			if(lis[i].innerHTML.toUpperCase().indexOf(needle) > -1){
				lis[i].style.display = 'block';
				found += 1;
			} else {
				lis[i].style.display = 'none';
			}
		}
	}

	if (found == 0) {
		for (var i = 0; i < lis.length; i++) {
			lis[i].style.display = 'block';
		}
		if(none == false){
			span.innerHTML = 'no items match your search';
		}
	} else {
		if (found == 1) {
			span.innerHTML = 'found <b class="theme-txt">'+found+'</b> item';
		} else {
			span.innerHTML = 'found <b class="theme-txt">'+found+'</b> items';
		}
	}
}

function DelInit() {
	let cap = document.querySelector('#caption');
	let m = Number(getIt('sch3-cur-item',1));
	let outp = 'this will delete links of all ';
	let catName;

	switch(m){
		case 0:
			catName = 'Songs';
			caption.innerHTML = outp + catName;
			break;

		case 1:
			catName = 'games';
			caption.innerHTML = outp + catName;
			break;

		case 2:
			catName = 'Apps';
			caption.innerHTML = outp + catName;
			break;

		case 3:
			catName = 'Videos';
			caption.innerHTML = outp + catName;
			break;

		case 4:
			catName = 'Links';
			caption.innerHTML = outp + catName;
			break;

		default:
			break;
	} 
}

//alert('work on the show my links function')