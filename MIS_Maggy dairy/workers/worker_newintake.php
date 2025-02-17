<?php
	if (isset($_GET['farmerid'])) {
		$thequery = "SELECT * from farmers where id='{$_GET['farmerid']}'";
	} else {
		$thequery = "SELECT * from farmers";
	}
	$userreq = $conn->query($thequery);
	$users = "";
	$reccount = $userreq->num_rows;

	if($userreq->num_rows > 0){
		while($row = $userreq->fetch_assoc()){
			$users .= "[\"{$row['Id']}\",\"{$row['farmer_name']}\"],";
		}
	}
?>