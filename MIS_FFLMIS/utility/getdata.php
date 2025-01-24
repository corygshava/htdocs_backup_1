<?php
if (isset($_GET['serial'])) {
    // Get the serial number from the GET parameter
    $myserial = $_GET['serial'];

    try {
        // SQL query to retrieve data
        $myop = "SELECT lastlocation, lastupdatedate, logs FROM deliverylogs WHERE deliveryserial = '$myserial'";
        include("../actions/getdata.php");

        // Check if data was found
        if ($result) {
            // Output JavaScript variables in a script tag
            while($row = $result->fetch_row()){
                $lastlocation = $row[0];
                $lastupdatedate = $row[1];
                $logs = $row[2];

                $res = $lastlocation."_#bounds#_".$lastupdatedate."_#bounds#_".$logs;
                echo $res;

                /*echo "<script>
                    var lastLocation = '{$lastlocation}';
                    var lastUpdateDate = '{$lastupdatedate}';

                    function showittouser(){
                        document.querySelector(`#lastLocation`).innerHTML = '$lastlocation';
                        document.querySelector(`#lastUpdateDate`).innerHTML = '$lastupdatedate';
                    }
                </script>";*/
            }
        } else {
            echo "No data found for serial: $myserial";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
