function checkOnline() {
    mm = window.location;
    if(mm.toString().includes("http://") || mm.toString().includes("https://")){
        setOnlineBackgroundImage();
    } else {
        setbackgroundImage("images/");
    }
}