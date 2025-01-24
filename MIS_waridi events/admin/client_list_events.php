<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/eventer.css">

    <title>Available events</title>
</head>
<body>
    <header>
        <h1>Available events</h1>
    </header>

    <div class="content">
        <div class="eventsholder">
            <div>
                <h3>Filters</h3>
                <?php
                    if(isset($_GET['filter'])){
                ?>
                    <a href="client_list_events.php">clear filter</a>
                <?php
                    }
                ?>
                <a href="client_list_events.php?filter=all">all</a>
                <a href="client_list_events.php?filter=passed">passed</a>
                <a href="client_list_events.php?filter=today">today</a>
                <a href="client_list_events.php?filter=upcoming">upcoming</a>
                <a href="client_list_events.php?filter=available">available</a>
            </div>
<?php
            // Include the database connection file
            include '../actions/connect.php';

            // Get the current date
            $currentDate = date('Y-m-d');

            // Get the filter from the GET request, default to an empty string if not set
            $filter = isset($_GET['filter']) ? $_GET['filter'] : '';

            // Prepare the SQL statement based on the filter value
            switch ($filter) {
                case 'all':
                    $sqlEvents = "SELECT * FROM events";
                    break;
                case 'passed':
                    $sqlEvents = "SELECT * FROM events WHERE eventdate < '$currentDate'";
                    break;
                case 'today':
                    $sqlEvents = "SELECT * FROM events WHERE eventdate = '$currentDate'";
                    break;
                case 'upcoming':
                    $sqlEvents = "SELECT * FROM events WHERE eventdate BETWEEN '$currentDate' AND DATE_ADD('$currentDate', INTERVAL 2 WEEK)";
                    break;
                case 'available':
                    $sqlEvents = "SELECT * FROM events WHERE eventdate >= '$currentDate'";
                    break;
                default:
                    $sqlEvents = "SELECT * FROM events WHERE eventdate > '$currentDate'";
                    break;
            }

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

                    echo "<a class=\"eventguy theme{$rowEvent['themecolor']}\" href=\"eventdata.php?curevent={$rowEvent['eventid']}\">
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
        </div>
    </div>
</body>
</html>