<?php
	include 'connect.php';

	if(isset($_COOKIE['curusertype']) && $_COOKIE['curusertype'] == "admin"){
		if (isset($_GET['recid'])) {
			$recid = $_GET['recid'];
			$updatequery = "UPDATE recommendations SET status = 'rejected' WHERE id=$recid";
			if($conn->query($updatequery)){
				echo "recommendation rejected successfully";
			} else {
				echo "error rejecting recommendation : <b>{$conn->error}</b>";
			}
		} else {
			echo "invalid request";
		}
	} else {
		echo "you are not allowed to access this page";
	}

	header("refresh: 1.5; ../admin/view_recommends.php");
?>