<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <title>File uploader</title>
</head>
<body>
	<header>
    </header>

    <div class="content">
		<div class="formholder">
			<h1>File uploader</h1>
			<?php
				echo "";
			?>
			<form id="uploadForm" action="uploader.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="file" id="file" required>
				<input type="text" name="thekey" id="thekey" placeholder="enter your key here">
				<input type="hidden" name="PHP_SESSION_UPLOAD_PROGRESS" value="<?= uniqid(); ?>">
				<button type="submit">Upload</button>
			</form>

			<div class="reporter">
				<div class="progress">
					<div class="progress-bar" id="progressBar"></div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/loader.js"></script>
	<script>
		loadguy = document.querySelector('.reporter');
		// spawnloader(123123,loadguy);

		// reco 9
	</script>

	<script src="js/app.js"></script>

	<?php
		include 'elements/nav.php';
	?>
</body>
</html>