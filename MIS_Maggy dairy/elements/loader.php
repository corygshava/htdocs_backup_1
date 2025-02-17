<?php
	$restxt = isset($restxt) ? $restxt : 'start a session first';
	$opres = isset($opres) ? $opres : 'false';
	$toredirect = isset($toredirect) ? $toredirect : '../login.php';
	$thedelay = $opres == 'true' ? 2.1 : 5.2;

	header("refresh: $thedelay;url= $toredirect");
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="shortcut icon" href="../favicon.png" type="image/png">

	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<link rel="stylesheet" type="text/css" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/font-Awesome.min.css">

	<title>handling request ...</title>

    <style>
        .loadme{
            display: flex;
            flex-direction: column;
            place-items: center;
            place-content: center;
            min-height: 100vh;
        }
        .ld{
            padding: 52px 10px;
            text-align: center;
            font-weight: 800;
        }
		.ld.tagline,.ld.endline{
			opacity: 0;
			padding: 12px 10px !important;
		}
		.loader{scale: 1.1;}

		/* HTML: <div class="loader"></div> */
			.loader {
			  width: 50px;
			  aspect-ratio: 1;
			  display: grid;
			}
			.loader:before,
			.loader:after {
			  content: "";
			  grid-area: 1/1;
			  margin: 0 0 15px 15px;
			  --c:#0000 calc(100%/3),#046D8B 0 calc(2*100%/3),#0000 0;
			  --c1:linear-gradient(90deg,var(--c));
			  --c2:linear-gradient( 0deg,var(--c));
			  background: var(--c1),var(--c2),var(--c1),var(--c2);
			  background-size: 300% 4px,4px 300%;
			  background-repeat: no-repeat;
			  animation: l12 1s infinite linear;
			}
			.loader:after {
			  margin: 15px 15px 0 0;
			  transform: scale(-1,-1);
			}
			@keyframes l12 {
			  0%   {background-position: 50%  0,100% 100%,0    100%,0 0}
			  25%  {background-position: 0    0,100% 50% ,0    100%,0 0}
			  50%  {background-position: 0    0,100% 0   ,50%  100%,0 0}
			  75%  {background-position: 0    0,100% 0   ,100% 100%,0 50%}
			 75.01%{background-position: 100% 0,100% 0   ,100% 100%,0 50%}
			  100% {background-position: 50%  0,100% 0   ,100% 100%,0 100%}
			}
    </style>
</head>

<body>
    <div class="contenter">
        <div class="loadme">
            <div class="ld title">
                <span>running</span>
            </div>
            <div class="loader"></div>
            <div class="extratxt w3-hide"></div>
            <div class="ld tagline"></div>
			<div class="ld endline"></div>
        </div>
    </div>

    <script src="../js/loader.js"></script>

    <script>
        var cm = 0;
		var tg = document.querySelector('.ld.tagline');
		var tg2 = document.querySelector('.ld.endline');

		var success = <?php echo $opres;?>;
		var loadernum = success ? 19 : 19;
		var thecol = success ? '#000' : 'tomato';
		var res = success ? `<span class="w3-text-green"><i class="fa fa-check"></i> <?php echo $restxt?></span>` : `<span class="w3-text-red"><i class="fa fa-close"></i> <?php echo $restxt?></span>`;
		var duration = 700;
		var thedelay = success ? 100 : 1200;

		tg.innerHTML = `${res}`;
		tg2.innerHTML = `<i class="fa fa-arrow-rightsd"></i> redirecting...`;

        // spawnloader(loadernum,document.querySelector('.loadme'),thecol);

        setTimeout(() => {
            tg.animate([
				{opacity:0,translate: '0px -25px'},
				{opacity:1,translate: '0px 0px'}
			],{
				duration: duration,
				fill: "forwards",
				easing: "ease-out"
			});

			if(success){
				tg.animate([
					{opacity:1,translate: '0px 0px'},
					{opacity:0,translate: '0px 25px'}
				],{
					duration: duration,
					delay: duration + 400,
					fill: "forwards",
					easing: "ease-out"
				})
			}

			tg2.animate([
				{opacity:0,translate: '0px -25px'},
				{opacity:1,translate: '0px 0px'}
			],{
				duration: duration,
				delay: duration + 400,
				fill: "forwards",
				easing: "ease-out"
			})
        }, duration);
    </script>
</body>
</html>