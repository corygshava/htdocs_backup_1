// contains JS code that can be used anywhere in the project

document.addEventListener('DOMContentLoaded',e => {
	let mtitle = document.querySelector('.curpage');

	mtitle.innerHTML = document.title;

	// alert('page loaded')
})

function switchtab(series,n,btns){
	tabSwitch(n,series,'none','flex');

	let naver = document.querySelector('.naver');
	let links = naver.querySelectorAll('a');

	links.forEach(el => {
		el.classList.remove('active');
	})

	links[n].classList.add('active');
}

function initPopups(dataobj = []) {
	let editdata = "";
	let deldata = "";
	let adddata = "";

	// edit inputs
	dataobj[0].inputs.forEach((el,tid) => {
		let payld = el.split("|");
		let lbl = dataobj[0].labels[tid] == "" ? "" : `<label>${dataobj[0].labels[tid]}</label>`;
		let toadd = payld[1] == "hidden" ? `value="${payld[2]}"` : `placeholder="${payld[2]}"`;
		editdata += `
			${lbl}
			<input type="${payld[1]}" name="${payld[0]}" ${toadd} required>`;
	});

	dataobj[1].inputs.forEach(el => {
		let payld = el.split("|");
		deldata += `<input type="${payld[1]}" name="${payld[0]}" value="${payld[2]}" placeholder="type information here..." required>`;
	});

	dataobj[2].inputs.forEach((el,tid) => {
		let payld = el.split("|");
		let lbl = dataobj[2].labels[tid] == "" ? "" : `<label>${dataobj[2].labels[tid]}</label>`;
		let toadd = payld[1] == "hidden" ? `value="${payld[2]}"` : `placeholder="${payld[2]}"`;
		adddata += `
			${lbl}
			<input type="${payld[1]}" name="${payld[0]}" ${toadd} required>`;
	});

	let d = document.createElement('div');

	d.className = "mymodal popups p1";
	d.dataset.shown = 0;
	d.innerHTML = `
		<button class="themebtn w3-hover-text-red w3-display-topright btn" onclick="toggleShowB('.popups.p1','flex','none');"><i class="fa fa-times"></i></button>
		<div class="edititem popup" style="display: none;">
			<div class="formguy">
				<form id="editform" class="w3-white" action="actions/${dataobj[0].action}" method="post">
					<div class="w3-col">
						<h2>Edit</h2>
						${editdata}
					</div>
					<div class="w3-center w3-col">
						<button class="btn themehover" type="reset" onclick="toggleShowB('.popups.p1','flex','none');"><i class="fa fa-times"></i> cancel</button>
						<button class="btn themehover"><i class="fa fa-send"></i> submit</button>
					</div>
				</form>
			</div>
		</div>
		<div class="deleteitem popup" style="display: none;">
			<div class="formguy">
				<form id="delform" class="w3-white" action="actions/${dataobj[1].action}" method="post">
					<div class="w3-center w3-col">
						<h2>Delete</h2>
						${deldata}
						<button class="btn themehover" type="reset" onclick="toggleShowB('.popups.p1','flex','none');"><i class="fa fa-times"></i> cancel</button>
						<button class="btn themehover"><i class="fa fa-trash"></i> delete</button>
					</div>
				</form>
			</div>
		</div>
		<div class="newitem popup" style="display: none;">
			<div class="formguy">
				<form id="editform" class="w3-white" action="actions/${dataobj[2].action}" method="post">
					<div class="w3-col myinputs">
						<h2></h2>
						${adddata}
					</div>
					<div class="w3-center w3-col">
						<button class="btn themehover" type="reset" onclick="toggleShowB('.popups.p1','flex','none');"><i class="fa fa-times"></i> cancel</button>
						<button class="btn themehover"><i class="fa fa-send"></i> submit</button>
					</div>
				</form>
			</div>
		</div>

		<div class="readitem popup" style="display: none;">
			<div class="gap">
				<h2></h2>
				<p></p>
				<button class="btn themehover" type="reset" onclick="toggleShowB('.popups.p1','flex','none');"><i class="fa fa-times"></i> close</button>
			</div>
		</div>
	`;

	document.body.appendChild(d);
}