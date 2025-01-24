<?php 
	include 'connect.php';

	// Retrieve the record for 'coffee_seeds' from the inventory table
	$query_seeds = "SELECT itemamt FROM inventory WHERE itemname = 'coffee_seeds'";
	$result_seeds = mysqli_query($conn, $query_seeds);
	$row_seeds = mysqli_fetch_assoc($result_seeds);
	$coffee_seeds = $row_seeds['itemamt'];

	// Retrieve the record for 'coffee' from the inventory table
	$query_coffee = "SELECT itemamt FROM inventory WHERE itemname = 'coffee'";
	$result_coffee = mysqli_query($conn, $query_coffee);
	$row_coffee = mysqli_fetch_assoc($result_coffee);
	$coffee = $row_coffee['itemamt'];

	// Sum the amounts for 'lost' status
	$query_lost = "SELECT SUM(amount) AS total_lost FROM in_processing WHERE status = 'lost'";
	$result_lost = mysqli_query($conn, $query_lost);
	$row_lost = mysqli_fetch_assoc($result_lost);
	$coffee_lost = $row_lost['total_lost'];

	// Sum the amounts for 'complete' status
	$query_complete = "SELECT SUM(amount) AS total_complete FROM in_processing WHERE status = 'complete'";
	$result_complete = mysqli_query($conn, $query_complete);
	$row_complete = mysqli_fetch_assoc($result_complete);
	$coffee_complete = $row_complete['total_complete'];

	// Sum the amounts for 'pending' status
	$query_pending = "SELECT SUM(amount) AS total_pending FROM in_processing WHERE status = 'pending'";
	$result_pending = mysqli_query($conn, $query_pending);
	$row_pending = mysqli_fetch_assoc($result_pending);
	$coffee_processing = $row_pending['total_pending'];

?>