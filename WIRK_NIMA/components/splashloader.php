<style>
	.splashguy {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		/* pointer-events: none;*/
		position: fixed;
		z-index: 500;
		top:0;
		left: 0;
		width: 100%;
		background: #fefefe;
	}
	.splash {
		padding: 20px;
		/* background: #f0f0f0;*/
		border-radius: 10px;
		text-align: center;
		display: flex;
		flex-direction: column;
	}
	.splash img{
		height: 150px;
		aspect-ratio: 1;
	}
	.splash div{
		display: inline-block;
	}

	.myloader{
		width: 100% !important;
		margin: 20px auto;
	}

	/* HTML: <div class="loader"></div> */
	.myloader {
	  height: 4px;
	  width: 130px;
	  --c:no-repeat linear-gradient(#20d90b 0 0);
	  background: var(--c),var(--c),#d7b8fc;
	  background-size: 60% 100%;
	  animation: l16 3s infinite;
	}
	@keyframes l16 {
	  0%   {background-position:-150% 0,-150% 0}
	  66%  {background-position: 250% 0,-150% 0}
	  100% {background-position: 250% 0, 250% 0}
	}
</style>

<div class="splashguy">
	<div class="splash">
		<div class="thelogo">
			<img src="images/nimalogo.png">
		</div>
		<div class="myloader">
		</div>
		<div class="subtxt">
			loading Content
		</div>
	</div>
</div>

<script>
	let splashguy = document.querySelector(".splashguy");
	let logo = document.querySelector(".thelogo");
	let loder = document.querySelector(".myloader");
	let subtxt = document.querySelector(".subtxt");
	let timing = {
		duration: 700,
		fill:"forwards",
		easing: "ease-out",
		delay: 1500
	}

	document.addEventListener("click", function (e) {
		let link = e.target.closest("a");

		// Hi future coder. this code made a white overlay to show up on screen when someone leaves the page, remove false to see it in action
		if (link && false) {
			if(!link.href.includes(location.href.split("#")[0]) || link.href == undefined || link.href == ""){
				e.preventDefault();
				showloader();
				setTimeout(() => {
					window.location.href = link.href;
				}, 500);
			}
		}
	});

	document.addEventListener("DOMContentLoaded",e => {
		mekloader();
	})

	splashguy.addEventListener("click",e => {
		mekloader();
	})

	function mekloader(){
		setTimeout(e => {
			splashguy.style.display = 'none';
		},timing.duration + timing.delay);

		logo.animate([
			{opacity: 1,translate: '0 0'},
			{opacity: 0,translate: '0 -50px'}
		],timing);

		loder.animate([
			{scale: 1,opacity: 1,translate: '0 0'},
			{scale: 2,opacity: 0,translate: '0 0'}
		],timing);

		subtxt.animate([
			{opacity: 1,translate: '0 0'},
			{opacity: 0,translate: '0 50px'}
		],timing);

		timing.delay += 300;

		splashguy.animate([
			{opacity: 1},
			{opacity: 0}
		],timing);
	}

	function showloader() {
		splashguy.style.display = 'flex';

		timing.duration = 300;
		timing.delay = 0;

		splashguy.animate([
			{opacity: 0},
			{opacity: 1}
		],timing);
	}
</script>