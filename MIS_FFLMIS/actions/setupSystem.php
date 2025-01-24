<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" value="initial-scale=1,width=device-width">
	<link rel="stylesheet" type="text/css" href="../css/new_styles.css">
	<link rel="stylesheet" type="text/css" href="../css/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/iconic.css">
	<link rel="stylesheet" type="text/css" href="../css/loader.css">

	<title>Setting up ...</title>
</head>
<body>

<?php
    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";

    $outxt = "";

    try {

        $conn = new PDO("mysql:host=$hostname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $myop = "CREATE DATABASE IF NOT EXISTS fflmis";
        $conn->exec($myop);

        $myop = "USE fflmis";
        $conn->exec($myop);

        $sqlDump = file_get_contents('sqldump.sql');

        $conn->exec($sqlDump);
        $outxt = "<div>SQL dump executed successfully\n</div>";

        $data = "setupdone";
        file_put_contents("setup.txt", $data, FILE_APPEND);
    } catch (PDOException $e) {
        $outxt = "<div>Error: " . $e->getMessage()."</div>";
    }

    $outxt = $outxt."<div>your system is now ready to use. enjoy <b>:)</b></div>";

    $conn = null;

    $thepage = "../index.php";
?>

    <div class="main-container">
		<div class="holder w3-text-white w3-center">
			<h4><i class="icon icon-refresh w3-spin"></i> <br>Seting up System</h4>
			<div class="Loading"><div class="bar"></div></div>
			<span class="matimer w3-text-orange w3-hide">secs</span><br>
            <?php echo $outxt;?>
		</div>
	</div>

</body>

<script type="text/javascript" src="../js/loader.js"></script>
<script type="text/javascript">
	thelocation = `<?php echo $thepage;?>`;
	loader();
</script>

</html>