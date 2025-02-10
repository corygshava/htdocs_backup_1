<?php
	include 'actions/connect.php';

	$varset = isset($_GET['vid']);

	if (!$varset) {
		echo "choose a visit first";
		header("refresh:2;url=list_visits.php");
		exit();
	} else {
		$vid = $_GET['vid'];

		$vst_res = $conn->query("SELECT * FROM visits WHERE Id = '$vid' and status = 'pending'");

		if($vst_res){
			$vst_data = $vst_res->fetch_assoc();
			$vst_id = $vst_data['Id'];
			$vst_guy = $vst_data['visitorid'];
		} else {
			echo "visit doesnt exist";
			header("refresh:2;url=list_visits.php");
			exit();
		}
	}
?>