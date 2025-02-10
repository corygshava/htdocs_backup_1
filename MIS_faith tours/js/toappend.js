function copytext1(txt) {
    if(txt != "" || txt != undefined){
        let b = document.createElement('textarea');
        b.value = txt;
        document.body.appendChild(b);
        
        b.select()
        b.setSelectionRange(0,99000);

        try{
            let suc = document.execCommand('copy');
            console.log(suc ? "text copied" : "copying error occured!")
        } catch {
            alert("there was an error copying your text, please try again")
        }

        document.body.removeChild(b);
    }
}