<!-- has code for listing events (mostly just for the default page where admin chooses one) -->


<!-- 

	<a class="eventguy theme1" href="admin_chooseevent.php">
	    <div class="caption">
	        <span class="heading">Colors fest</span>
	        <hr>
	        <p>this is an event celebrating colors in all their glory ....</p>
	    </div>
	    <button class="w3-display-topright w3-black w3-hover-white w3-btn"><b class="tag">Attending</b></button>
	</a>

 -->

 <?php
    // Include the database connection file
    include '../actions/connect.php';

	$sqlEvents = "SELECT * FROM events WHERE eventcreator = '$curuser'";
    // Execute the SQL statement
    $resultEvents = $conn->query($sqlEvents);

    $tablestuff = "";

    if ($resultEvents->num_rows > 0) {
        // Output data in a table format
        $tablestuff .= "<table border='1'>
                <tr>
                    <th>Event ID</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Ticket Cost</th>
                    <th>Description</th>
                    <th>Venue</th>
                    <th>Theme Color</th>
                    <th>Event Key</th>
                    <th>Event Code</th>
                </tr>";

        // Fetch data
        while ($rowEvent = $resultEvents->fetch_assoc()) {
            $tablestuff .= "<tr>
                    <td>{$rowEvent['eventid']}</td>
                    <td>{$rowEvent['eventname']}</td>
                    <td>{$rowEvent['eventdate']}</td>
                    <td>{$rowEvent['starttime']}</td>
                    <td>{$rowEvent['endtime']}</td>
                    <td>{$rowEvent['ticketcost']}</td>
                    <td>{$rowEvent['description']}</td>
                    <td>{$rowEvent['venue']}</td>
                    <td>{$rowEvent['themecolor']}</td>
                    <td>{$rowEvent['eventkey']}</td>
                    <td>{$rowEvent['eventcode']}</td>
                </tr>";

                $shorttxt = substr($rowEvent['description'],0,45);

            echo "<a class=\"eventguy theme{$rowEvent['themecolor']}\" href=\"admin_chooseevent.php?eventid={$rowEvent['eventid']}\">
        <div class=\"caption\">
            <span class=\"heading\">{$rowEvent['eventname']}</span>
            <hr>
            <p>{$shorttxt} ....</p>
        </div>
    </a>";
        }

        echo "</table>";
    } else {
        echo "<p class='w3-center'>No events found.</p>";
    }

    // Close the database connection
    $conn->close();
?>