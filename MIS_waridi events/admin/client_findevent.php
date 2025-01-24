<?php
    $prefix = "../";
    include '../actions/checksession.php';
    include '../actions/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">

    <title>Processing account creation</title>
</head>
<body>
    <div class="serverlog">

<?php
	$thepage = "client_eventkey.php";

	if(isset($_POST['Ekey'])){
		$Ekey = $_POST['Ekey'];

		$sql = "SELECT eventid FROM events WHERE eventkey = '$Ekey' OR eventcode = '$Ekey'";
		$res = $conn->query($sql);
		$row = $res->fetch_assoc();

		if($res->num_rows > 0){
			$theid = $row['eventid'];
			$thepage = "eventdata.php?curevent=$theid";
			$alt = "your event has been found";
		} else {
			$alt = "event key doesnt exist";
		}
	} else {
		$alt = "enter a valid event key first";
	}

	header("refresh: 3.2; $thepage");
	echo "<p>$alt</p>";
	echo "redirecting....";

	if(!isset($alt)){
		// exit();
	}
?>

<script>
	// alert(<?php echo "$alt";?>);
</script>
    </div>
</body>
</html>