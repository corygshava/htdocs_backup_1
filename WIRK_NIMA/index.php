<?php
	include "components/verifysession.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="nima east africa official website">
	<meta name="keywords" content="best pest removal in kenya, top 10 best pestcontrol services in kenya, affordable pest removal in kenya, pest removal companies in kenya">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/w3.css">
	<link rel="stylesheet" href="css/homepage.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/mediaoptima.css">
	<link rel="shortcut icon" href="images/nimalogo_circle.png" type="image/png">

	<title>Nima East Africa</title>

	<!-- add to styles.css later -->
	<style>
		:root{
			--roundness:15px;
		}
		.myhero .slides {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			top: 0;
			left: 0;
			position: absolute;
			height: 100%;
			width: 100%;
			background: #000a;
		}
		.myhero .slides img{
			border-radius: var(--roundness);
		}
		.myhero .slides .sect{
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 80vh;
		}
		.myhero .slides .slideguy{
			max-width: 800px;
		}
		.myhero .slides .thetext {
			text-align: left;
			padding: 24px 33px;
		}
		.myhero .slidescontrols{
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-around;
			bottom: 0;
			left: 0;
			position: absolute;
			min-height: 10%;
			width: 100%;
			padding: 32px;
			/* background: #000a;*/
			background-image: linear-gradient(transparent,#000a);
		}

		.myhero .slidescontrols button{
			margin: 20px 0;
		}

		.herotxt{
/*            filter: blur(5px);*/
		}

		/* banner styles */
		.bannerholder{
			position: relative;
			height: 90vh;
			min-height: 400px;
			background-size: cover;
			background-attachment: fixed;
			background-image: url('images/banners/essay.jpg');
		}
		.banner {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
		    background: linear-gradient(80deg, #0022aaaa, #00aaff22);
		    color: white;
		    text-align: center;
		    padding: 20px;
		    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
		    display: flex;
		    align-items: center;
		    justify-content: center;
		}
		.banner-text{
			width: 80%;
			min-width: 400px;
			max-width: 800px;
		}
		.banner-text .heading {
		    margin: 0;
		    font-size: 54px;
		    font-weight: 800;
		    font-family: 'arial';
		}
		.banner-text p {
		    font-size: 25px;
		    margin: 10px 0;
		}
		.banner-text hr {
			width: 25%;
			display: inline-block;
		}
		.btn {
		    display: inline-block;
		    background: var(--primaryColor);
		    color: black;
		    padding: 10px 15px;
		    text-decoration: none;
		    font-weight: bold;
		    border-radius: var(--roundness);
		}
		.btn:hover {
		    color: #fff;
		    scale: 1.1;
		}
	</style>
</head>
<body>
	<?php
		$thepage = "homepage";

		include 'components/navbar.php';
	?>

	<header class="myhero w3-black w3-center">
		<div class="herotxt">
			<span class="heading">NIMA <span class="w3-text-white">East Africa</span></span>
			<p>
				We are a registered Pest control and healthcare services company based in Nairobi, Kenya. 
				We are your go-to company for Pest control and extermination services, with many satisfied customers and a comprehensive range of services to select from
			<br>
			<a href="#about">ABOUT US</a>
			<a href="tel:+254715360479">LETS TALK</a>
			<a href="services.php#pestcontrol" class="primarybg main">services</a>
		</div>

		<div class="slides">
			<div class="slideheading"><h1>WHAT DO WE DO?</h1></div>
			<div class="slideguy w3-row">
				<div class="w3-col m4 sect">
					<img src="images/services/ants1.jpg" style="width:100%" class="theimg">
				</div>
				<div class="w3-col m8 thetext sect">
					<div>
						<h1 class="theheading">SlideCOn</h1>
						<p class="mytext">my content</p>
						<a class="thelink herolike">go now</a>
					</div>
				</div>
			</div>
		</div>

		<div class="slidescontrols">
			<button class="herolike">1</button>
			<button class="herolike">2</button>
			<button class="herolike">3</button>
		</div>
	</header>

	<div class="content" style="font-size: 17px;">
		<!-- insert ABOUT section here -->

		<article id="about" class="panel2 w3-center">
			<img src="images/nimalogo.png" alt="nima east africa logo [missing]" class="w3-text-red">
			<h2>About Us</h2>
			<cite>Who are we</cite>
			<p>
				Nima East Africa Limited is a locally registered private company based in Nairobi, Kenya. 
				Incorporated on <b>24th November 2014</b> and eventually launched on <b>7th March 2015</b> at Kenyatta International Conference Centre <b>(K.I.C.C)</b> and its office officially opened on a prayer day under the leadership of our beloved Hon .Bishop .Dr. W. ABUKA. Hsc on <b>6th April 2015</b>.
			</p>
			<p>
				Nima East Africa Limited engages in the provision of a variety of Pest Control Services and Health Care Services and Products across East Africa.
			</p>

			<a href="about us.php#info2" class="themebtn2">More information</a>
		</article>

		<!-- a banner for announcements -->
		<div class="bannerholder">
			<div class="banner">
				<div class="banner-text w3-center">
					<img src="images/nimalogo_circle.png" style="height: 15vh;aspect-ratio: 1;display: inline-block;">
					<br>
					<span class="heading">Essay Competition 2025</span>
					<hr>
					<p>Unleash your creativity and compete for top prizes in our upcoming Essay Competition! Sharpen your writing skills, share your ideas, and win AMAzing prizes. Don’t miss this chance. click below to find out more</p>
					<a href="readarticle.php?storyid=15" class="btn">Learn More</a>
				</div>
			</div>
		</div>

		<article class="panel2">
			<div class="w3-center">
				<h2>Our Services</h2>
				<cite>what do we do?</cite>
			</div>

			<div class="w3-row textpart">
	            <div class="w3-col m4 panel3">
	                <img src="images/hero/img1.jpg" alt="fumigation image" class="articleimg1">
	            </div>
	            <div class="w3-col m8 text-holder panel4">
	                <h2>Expert Fumigation</h2>

	                <p>
	                	Say goodbye to pests without the long wait! Our advanced fumigation service is not only highly effective in eliminating insects, rodents, and bacteria, but it also comes with a fast-dissipating formula—meaning your space is safe and fresh in just <b>2 hours</b>, not <b>24!</b> Get a cleaner, healthier environment without the hassle. Book your fumigation today!
	                </p>

	                <a href="services.php#info2" class="themebtn2 active">GO NOW!</a>
	            </div>
        	</div>

        	<div class="w3-row textpart">
	            <div class="w3-col m4 panel3">
	                <img src="images/services/bedbug1.jpg" alt="fumigation image" class="articleimg1">
	            </div>
	            <div class="w3-col m8 text-holder panel4">
	                <h2>Pest control</h2>

	                <p>
	                	With years of expertise in rodent and pest control, we don’t just eliminate the problem—we solve it for good! Our team knows exactly how to track, target, and remove pests efficiently, ensuring long-lasting protection for your home or business. No guesswork, no shortcuts—just expert solutions that work. Call us today and experience pest control done right!
	                </p>

	                <a href="services.php#info2" class="themebtn2 active">VIEW ALL!</a>
	            </div>
        	</div>

        	<div class="w3-row textpart">
	            <div class="w3-col m4 panel3">
	                <img src="images/services/POC.jpg" alt="fumigation image" class="articleimg1">
	            </div>
	            <div class="w3-col m8 text-holder panel4">
	                <h2>Point of care Lab tests</h2>

	                <p>
	                	Get fast, reliable, and life-saving insights with our <strong>Point of Care Laboratory Tests</strong>! From <strong>diabetes screening and hormonal analysis</strong> to <strong>infectious disease detection and pregnancy tests</strong>, we offer <strong>quick, accurate results</strong> without the long wait. Whether you need <strong>malaria, hepatitis, rheumatoid serology, or tumor marker tests</strong>, our cutting-edge diagnostics ensure early detection and better health management. <strong>No delays, no hassles—just precise testing when you need it most.</strong> Inquire today and take control of your health!
	                </p>


	                <a href="services.php#info2" class="themebtn2 active">GO NOW!</a>
	            </div>
        	</div>

        	<div class="w3-center">
        		<hr>
        		<h3>not what youre looking for? no problem</h3>
        		<a href="services.php#info2" class="themebtn2">view All services</a>
        	</div>
		</article>

		<article id="objectives" class="panel2 w3-light-grey">
			<h2>Objectives</h2>
			<ol>
				<li>To improve the prosperity of all citizens in the world.</li>
				<li>To build a just and cohesive society with social equity in a clean and secure environment.</li>
				<li>To realize a democratic political system founded on issue-based politics <b>that respects the rule of law and protects the rights and freedom of every individual</b> by setting an example for the rest to emulate in healthcare.</li>
			</ol>
		</article>

		<div id="mission" class="w3-row w3-grey panel2">
			<article class="w3-col m6 w3-center panel1">
				<h2>Our Vision</h2>
				<p>Model of excellence for quality healthcare.</p>
			</article>
			<article class="w3-col m6 w3-center panel1">
				<h2>Our Mission</h2>
				<p>
					Our mission is to redefine quality in healthcare.
				</p>
			</article>
		</div>

		<article id="values" style="background-color: var(--secondaryColor);margin: -15px 0px 0 0;padding: 0;background-image: url('images/slides bg.png');background-size: cover;">
			<div class="slideguy w3-text-white">
				<div class="slides">
					<h2 class="w3-center">Our Values</h2>
					<div class="slide w3-animate-opacity panel2" style="display: none;">
						<div class="">
							<h3>Customer focus</h3>
							<hr>
							<p>Committed to presenting satisfied clients in a pest free enviroment.</p>
						</div>
					</div>

					<div class="slide w3-animate-opacity panel2" style="display: block;">
						<h3>Strong Ethics</h3>
						<hr>
						<p>Providing services with respect, kindness and in a friendly manner. We (as employees) shall serve all our clients with respect, kindness and in a friendly manner </p>
					</div>

					<div class="slide w3-animate-opacity panel2" style="display: none;">
						<h3>Timeliness</h3>
						<hr>
						<p>Always delivering service on time. Our client will always receive services on time</p>
					</div>

					<div class="slide w3-animate-opacity panel2" style="display: none;">
						<h3>Equity</h3>
						<hr>
						<p>Equal service delivery to all, regardless of religion , social status and geographic location. All my clients are important, We (as employees) shall serve them equally regardless of their religion, geographic location, race or social status.</p>
					</div>

					<div class="slide w3-animate-opacity panel2" style="display: none;">
						<h3>Teamwork</h3>
						<hr>
						<p>Working together for a common goal, appreciating weakness and strengths of others through shared efforts. We are in this journey together,We  (as employees) equally share your successes and failures</p>
					</div>

					<div class="slide w3-animate-opacity panel2" style="display: none;">
						<h3>Accountability</h3>
						<hr>
						<p>Nima East Africa Limited employees shall be answerable for all clients. Every staff is accountable for the due performance of his/ her duties and for the general successes and failures of those he supervises.</p>
					</div>
				</div>

				<div class="options"></div>
			</div>
		</article>

		<div class="promo w3-center bg2">
			<div class="mycontents">
				<h2>Lets talk</h2>
				<p>We'd love to hear from you</p>
				<a href="contacts.php#contacts" class="themebtn">contact us</a>
			</div>
		</div>
	</div>

	<?php
		include 'components/basicscripts.php';
	?>
	<script>
		var slideDuration = 4500;
		var slideshow1 = w3.slideshow('.slides>.slide',slideDuration);

		var curslide = 0;
		var theheroslide = 0;
		var herointervals = 7000;

		// for showing the anims on scroll
		var herotimer = 0;
		var heroshown = false;

		var heroitems = [
			{
				title:"Bedbugs eradication",
				desc: "Say goodbye to bedbugs with our expert extermination—fast, effective, and long-lasting results!",
				link: "services.php",
				img: "services/bedbug1.jpg",
				callout: 'learn more'
			},
			{
				title:"Non residue fumigation",
				desc: "Smoke based fumigation that kills pests and ensures you can continue using the premises after 2 hours instead of 24",
				link: "services.php",
				img: "hero/img1.jpg",
				callout: 'learn more'
			},
			{
				title:"state of the art health kits",
				desc: "Get fast, accurate results with our Point of Care Laboratory tests—quick, reliable, and hassle-free!",
				link: "services.php",
				img: "hero/img2.jpg",
				callout: 'learn more'
			},
			{
				title:"Fleas control and extermination",
				desc: "Nima east africa's expert team eliminates fleas efficiently, ensuring complete control in homes and businesses",
				link: "services.php",
				img: "hero/img2.jpg",
				callout: 'BOOK NOW!'
			}
		]

		function setupslides(b) {
			let slideholder = document.querySelector(b).querySelector('.slideguy');
			let slides = slideholder.querySelectorAll('.slide');

			slides.forEach((element,index) => {
				element.classList.add("w3-animate-opacity");
				element.classList.add("panel2");
				
				let newitem = document.createElement('div');
				newitem.classList.add('w3-animate-left');
				newitem.style.fontSize = '25px';
				newitem.innerHTML = `${index + 1} / ${slides.length}`;
				element.innerHTML = newitem.outerHTML + element.innerHTML;

				let opts = document.querySelector('#values').querySelector('.options');
				if(opts != null){
					opts.innerHTML += '<button class="knob"></button>';
				} else {
					console.log("opts is blank");
				}
			});
		}

		function updateOptions(){
			let slideholder = document.querySelector('.slideguy');
			let slides = slideholder.querySelectorAll('.slide');
			let opts = document.querySelector('.options').querySelectorAll('button');

			for (let x = 0; x < opts.length; x++) {
				const element = opts[x];
				element.classList.remove('current');
			}

			if(opts[curslide] != undefined)
				opts[curslide].classList.add('current');
			curslide += 1;
			curslide = curslide % slides.length;
		}

		function heroslides() {
			let slideholder = document.querySelector('.myhero');
			let slidetxt = slideholder.querySelector('.herotxt');
			let slideguy = slideholder.querySelector('.slides');
			let slidebtns = slideholder.querySelector('.slidescontrols');

			let timing = {
				duration: 700,
				easing: "ease-out",
				fill: "forwards"
			}

			slideguy.style.display = "none";
			slidebtns.style.display = "none";

			setTimeout(el => {
				slideguy.style.display = "flex";
				slidebtns.style.display = "flex";

				slidetxt.style.filter = 'blur(5px)';

				slideguy.animate([
					{opacity: 0,scale: 1.2},
					{opacity: 1,scale: 1}
				],timing);

				slidebtns.animate([
					{opacity: 0,translate: '0 20px'},
					{opacity: 1,translate: '0 0'}
				],timing);

				startanims();
			},100);
		}

		function startanims() {
			// hero section anims
			let slideholder = document.querySelector('.myhero');
			let slideguy = slideholder.querySelector('.slides');
			let slideopt = slideholder.querySelector('.slidescontrols');

			// setup toggler buttons
			slideopt.innerHTML = "";
			heroitems.forEach((el,id) => {slideopt.innerHTML += `<a class="herolike">${id + 1}</a>`;})

			let s_img = slideguy.querySelector('.theimg');
			let s_hed = slideguy.querySelector('.theheading');
			let s_text = slideguy.querySelector('.mytext');
			let s_link = slideguy.querySelector('.thelink');

			let s_holder = slideguy.querySelector('.slideguy');
			let s_anc = slideguy.querySelector('.slideheading');

			let heroinfo = undefined;

			let starttiming = {
				duration:700,
				easing: "ease-out",
				fill: "forwards"
			};

			s_holder.style.display = "none";
			s_anc.style.display = "flex";

			s_anc.animate([
				{opacity:0},
				{opacity:1}
			],starttiming);

			setTimeout((e) => {
				starttiming.duration = 400;
				starttiming.delay = herointervals - 400 + 100;

				s_anc.animate([
					{opacity: 1},
					{opacity: 0}
				],starttiming);

				// animate the hero sections
				setInterval(() => {
					let btns = slideopt.querySelectorAll('a');
					let timing = {
						duration:700,
						easing: "ease-out",
						fill: "forwards",
						delay: 20
					};

					btns.forEach(el => {
						el.classList.remove("active");
					})

					// console.log(slideopt,btns);

					if(btns[theheroslide % btns.length])
						btns[theheroslide % btns.length].classList.add("active");

					s_anc.style.display = "none";
					s_holder.style.display = "flex";

					heroinfo = heroitems[theheroslide % heroitems.length];

					// set value
					s_img.src = `images/${heroinfo.img}`;
					s_hed.innerHTML = heroinfo.title;
					s_text.innerHTML = heroinfo.desc;
					s_link.href = heroinfo.link;
					s_link.innerHTML = heroinfo.callout;

					// reset stuff
					s_img.animate([{opacity:0},{opacity: 0}],{duration: 1,fill: "forwards"});
					s_hed.animate([{opacity:0},{opacity: 0}],{duration: 1,fill: "forwards"});
					s_text.animate([{opacity:0},{opacity: 0}],{duration: 1,fill: "forwards"});
					s_link.animate([{opacity:0},{opacity: 0}],{duration: 1,fill: "forwards"});

					// animate
					s_img.animate([
						{opacity: 0,translate: '-20px 0'},
						{opacity: 1,translate: '0 0'}
					],timing)

					timing.delay += 100;
					s_hed.animate([
						{opacity: 0,translate: '20px 0'},
						{opacity: 1,translate: '0 0'}
					],timing)

					timing.delay += 100;
					s_text.animate([
						{opacity: 0,translate: '30px 0'},
						{opacity: 1,translate: '0 0'}
					],timing)

					timing.delay += 100;
					s_link.animate([
						{opacity: 0,scale: 0},
						{opacity: 1,scale: 1}
					],timing)

					timing.delay += 100;

					theheroslide += 1;
				}, herointervals);
			},(starttiming.duration * 2) + 200);
		}

		function animateHero() {
			// hide the extra slides
			let slideholder = document.querySelector('.myhero');
			let slideguy = slideholder.querySelector('.slides');
			let slidebtns = slideholder.querySelector('.slidescontrols');
			slideguy.style.display = "none";
			slidebtns.style.display = "none";

			let header = document.querySelector('.myhero');
			let headtxt = document.querySelector('.herotxt');

			let h_hed = headtxt.querySelector('span.heading');
			let h_par = headtxt.querySelector('p');
			let links = headtxt.querySelectorAll('a');

			h_hed.style.opacity = 0;
			h_par.style.opacity = 0;
			links.forEach(el => el.style.opacity = 0);

			let timing = {
				duration: 100,
				easing: "ease-out",
				fill: "forwards",
				delay: 0
			}


			setTimeout( e => {
				// headtxt.animate([{opacity:1},{opacity:0}],timing)

				headtxt.animate([
					{opacity:0},
					{opacity:1}
				],timing);

				timing.duration = 300;
				timing.delay = 300
				timing.delay += 700

				h_hed.animate([
					{opacity:0,transform: 'scaleY(0)'},
					{opacity:1,transform: 'scaleY(1)'}
				],timing);

				timing.delay += 700

				h_par.animate([
					{opacity:0,translate: '0 -20px'},
					{opacity:1,translate: '0 0'}
				],timing);

				timing.delay += 700

				links.forEach(el => {
					el.animate([
						{opacity:0,translate: '0 40px'},
						{opacity:1,translate: '0 0'}
					],timing);
					timing.delay += 200
				});


			},500);
		}

		window.onload = () => {
			animateHero();
			setupslides('#values');
			updateOptions();
		}

		window.addEventListener('scroll',(e) => {
			if(!heroshown){
				heroshown = true;

				heroslides();
			}

			if(herotimer == 0){
				e.preventDefault();
			}

			setTimeout(e => {
				herotimer = 500;
			},700)
		});

		const optionsUpdaterInterval = setInterval(() => {updateOptions();},slideDuration);
	</script>


</body>
</html>