<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" value="initial-scale=1,width=device-width">
	<link rel="stylesheet" type="text/css" href="css/new_styles.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" type="text/css" href="css/iconic.css">
	<link rel="stylesheet" type="text/css" href="css/loader.css">

	<title>Loading...</title>
</head>
<body>

<?php

    if(isset($_COOKIE['username'])){
        $thepage = "dashboard.php";
    } else {
        $thepage = "login.php";
    }

	$Dump = file_get_contents('actions/setup.txt');

	if($Dump == "awaiting"){
		$thepage = "actions/setupsystem.php";
	}
?>

	<div class="main-container">
		<div class="holder w3-text-white w3-center">
			<h4><i class="icon icon-refresh w3-spin"></i> <br>Loading site</h4>
			<div class="Loading"><div class="bar"></div></div>
			<span class="matimer w3-text-orange w3-hide">secs</span><br>
			<!--<span><?php echo $Dump;?></span><br>
			<a href="actions/setupsystem.php" class="w3-btn w3-blue w3-hover-green" style="border-radius:12px;margin:35px 0;">setup system</a> -->
		</div>
	</div>

</body>

<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript">
	thelocation = `<?php echo $thepage;?>`;
	loader();
</script>

</html>