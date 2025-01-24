<?php
	include 'connect.php';

	if(isset($_GET['theid']) && isset($_GET['thestate'])){
		$theid = $_GET['theid'];
		$thestate = $_GET['thestate'];
		$sql = "UPDATE deposits SET status = '$thestate' WHERE depoid = '$theid'";

		if($conn->query($sql)){
			$restext = "deposit state modified";
		} else {
			$restext = "error modifying deposit : <b><i>{$conn->error}</i>";
		}
		$timeout = 0.78;
	} else {
		$restext = "error in request";
		$timeout = 0.8;
	}

	$theloc = "../admin/view_deposits.php";
	$processtxt = "updating deposit";
	include '../components/loader.php';
?>