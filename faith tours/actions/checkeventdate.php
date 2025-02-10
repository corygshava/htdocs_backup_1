<?php
	// Include the database connection file
	include('connect.php');

	// Check if all required GET values are set
	if (isset($_GET['date'], $_GET['fac'])) {
	    $date = $_GET['date'];
	    $fac = $_GET['fac'];

	    // Check if the date is in the future
	    if (strtotime($date) > time()) {
	        // Check if a reservation exists for the given date and facility
	        $check = $conn->query("SELECT * FROM event_reservations WHERE event_date = '$date' AND facility = '$fac'");

	        echo ($check->num_rows > 0) ? "Facility is already reserved on this date.|false" : "Facility is available.|true";
	    } else {
	        echo "Error: Date must be in the future.|false";
	    }
	} else {
	    echo "Error: Missing required values.|false";
	}
?>
