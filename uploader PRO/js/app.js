var form = document.forms[0];
var rpt = document.querySelector('.reporter');
var barguy = document.querySelector('.progress');
var thebar = document.querySelector('#progressBar');
var outdiv = document.createElement('div');
outdiv.id = 'output';
rpt.appendChild(outdiv);

form.addEventListener('submit', (e) => {
    e.preventDefault();
    // alert('submitting...');

    barguy.style.height = '12px';
    outdiv.textContent = 'initialising...';

    setTimeout(() => {
        let fdata = new FormData(form);
        let xhr = new XMLHttpRequest();

        xhr.open("POST",form.action,true);

        xhr.upload.addEventListener('progress',(e) => {
            if(e.lengthComputable){
                let complete = (e.loaded / e.total) * 100;
                thebar.style.width = `${complete}%`;
                outdiv.innerHTML = `${Math.floor    (complete)}% complete`;
            }
        })

        xhr.onload = () => {
            if(xhr.status == 200){
                outdiv.innerHTML = `${xhr.responseText}`;
                outdiv.className = 'success';
                console.log(`[${xhr.status} ${xhr.statusText}] request sent to ${form.action} : ${xhr.responseText}`)

                form.reset();
                resetbar();
            } else {
                outdiv.className = 'success';
                outdiv.innerHTML = `there was an error <b>[${xhr.status}]</b>`;
            }
        }

        xhr.send(fdata);
    }, 1200);
})

function resetbar() {
    setTimeout(() => {
        barguy.style.height = '0';
        thebar.style.width = '0%';
    }, 400);
}