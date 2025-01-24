<?php
    require "actions/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/new_styles.css">
    <link rel="stylesheet" type="text/css" href="css/iconic.css">
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/loader.css">
    <title>login handler</title>
</head>
<body>


<?php
    endSession();
?>
    <!-- basically removes cookies -->

    <div class="main-container">
		<div class="holder w3-text-white w3-center">
			<h4><i class="icon icon-refresh w3-spin"></i> <br>logging you out</h4>
			<div class="Loading"><div class="bar"></div></div>
			<span class="matimer w3-text-orange w3-hide">secs</span>
            <p></p>
            <div class="log">
                <span>entering data</span><br>
                <span>trial</span></br>
            </div>
		</div>
	</div>
</body>

<script type="text/javascript" src="js/loader.js"></script>
<script type="text/javascript">
	thelocation = "login.php";

	loader();
</script>

</html>