
<div class="alerter" id="thealerter" style="pointer-events:none;">
    <div class="content">

    </div>
    <div class="w3-align-right w3-animate-opacity" style="width:100%;background-image: linear-gradient(90deg,transparent,rgba(0,0,0,0.7),transparent);padding: 12px 0;pointer-events: all;">
        <b class="themetxt">Freight Forwarders logistics Management System [MVP] | </b>
        <span class="w3-text-white">By Cornelius Gamaliel Shava | </span>

        <a class="w3-text-white w3-btn w3-hover-blue w3-circle" href="tel://+254707978099" title="call me for more enquiries" style="text-decoration: none;"><i class="icon icon-phone"></i></a>
        <a class="w3-text-white w3-btn w3-hover-blue w3-circle" href="https://wa.me/254754079047" title="text me whenever" style="text-decoration: none;"><i class="icon icon-whatsapp"></i></a>
        <a class="w3-text-white w3-btn w3-hover-blue w3-circle" href="https://www.instagram.com/i_am_nebula/" title="Find me on instagram" style="text-decoration: none;"><i class="icon icon-instagram"></i></a>
        <a class="w3-text-white w3-btn w3-hover-blue w3-circle" href="mailto://corygshava777@gmail.com" title="Send me an email" style="text-decoration: none;"><i class="icon icon-envelope"></i></a>
    </div>
</div>


<script>
    function alerter(alerttype,alertmessage,linger){

        let alertHolder = document.querySelector('#thealerter').querySelector('.content');
        let myalert = `<div class="alert ${alerttype}"><b><i class="icon icon-right"></i> ${alertmessage}</b></div>`;
        let cycles = 1;

        alertHolder.innerHTML = "";
        alertHolder.innerHTML += myalert;

        /*const myinterval = setInterval(() => {
            cycles += 1;
            if(cycles == 3){
                clearInterval(myinterval);
                alertHolder.innerHTML = alertHolder.innerHTML.split(myalert)[0];
            }
        }, linger);*/
    }

    function checkerrors(){
        let reqs = getreqNew(window.location.href);
        let req = new Object;

        if(reqs.length >= 2){
            req = reqs[0];
            let thetext = reqs[0].content.replaceAll("%20"," ");

            if(req.header == "notify"){
                alerter(reqs[1].content,thetext,5.4);
                return;
            }
        }
    }

    checkerrors();
</script>