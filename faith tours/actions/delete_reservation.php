<?php
	include "connect.php";

	$restxt = "the code didnt run";
	$toredirect = '../list_reservations.php';

	if (isset($_POST['id'])) {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		if ($conn->query("DELETE FROM event_reservations WHERE Id = '$id'")) {
			$restxt = "Record deleted successfully.";
			$opres = "true";
		} else {
			$restxt = "Error: " . $conn->error;
		}
	} else {
		$restxt = "Missing required data.";
	}

    $conn->close();

    include '../elements/loader.php';
?>
