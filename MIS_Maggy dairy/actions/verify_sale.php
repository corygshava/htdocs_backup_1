<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../view_milksales.php';

	if(isset($_GET['sid'],$_GET['op'])){
		$theid = $_GET['sid'];
		$theop = $_GET['op'];

		$thereq = $conn->query("UPDATE sales SET status='$theop' where id='$theid'");
		$opres = $thereq == true;

		$restxt = $opres ? "data updated successfully" : "data update failed : ".$conn->error;
	} else {
		$restxt = "request error";
	}

	// Close the database connection
	$conn->close();

	include '../elements/loader.php';
?>
