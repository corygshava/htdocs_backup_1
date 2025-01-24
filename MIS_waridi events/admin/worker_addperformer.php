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
		if(isset($_COOKIE['curevent'])){
			if (isset($_POST['name']) && isset($_POST['role']) && isset($_POST['starttime']) && isset($_POST['endtime'])) {
				$name = $_POST['name'];
				$role = $_POST['role'];
				$starttime = $_POST['starttime'];
				$endtime = $_POST['endtime'];

				// eventid, pname, role, starttime, endtime,checkedin
				$sql = "INSERT INTO performers (eventid, pname, role, starttime, endtime,checkedin) VALUES ('$curevent','$name','$role','$starttime','$endtime','no')";
				$result = $conn->query($sql);

				if($result){
					echo "<p>Performer added successfuly</p>";
				} else {
					echo "<p>Error ading Performer : {$conn->error}</p>";
				}
			} else {
				echo "<p>invalid request : ensure you send all required data</p>";
			}
		} else {
			echo "<p>select an event first</p>";
		}

		header("refresh: 1.5;view_performers.php");
		echo "redirecting";
	?>
	</div>
</body>
</html>