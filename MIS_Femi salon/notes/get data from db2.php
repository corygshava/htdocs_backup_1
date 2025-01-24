$mysqli = new mysqli("localhost", "root", "", "femi_salon");

// Check for connection errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
}

$result = $mysqli->query($myop);
echo "Query has been run<br>";

if (isset($workonit) && $workonit) {
    if ($result) {
        $record = array(); // Array to store fetched rows
        $x = 0;
        
        while ($row = $result->fetch_row()) {
            $record[$x] = $row;
            $x += 1;
        }

        $totalrows = mysqli_num_rows($result);
        
        // Start the HTML table
        echo "<table>";
        
        // Output table headers
        echo "<tr>";
        $fields = $result->fetch_fields();
        foreach ($fields as $field) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        
        // Output table rows
        foreach ($record as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        
        // End the HTML table
        echo "</table>";
    } else {
        echo "No results found.<br>";
        echo $mysqli->error."<br>";
    }
}
