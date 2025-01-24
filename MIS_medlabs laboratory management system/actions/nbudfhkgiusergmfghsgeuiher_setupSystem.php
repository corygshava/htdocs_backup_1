<?php
// Database connection parameters
$hostname = "localhost";
$username = "root";
$password = "";

try {

    $conn = new PDO("mysql:host=$hostname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlDump = file_get_contents('datapayload.sql');

    $conn->query($sqlDump);
    echo "<div>SQL dump executed successfully\n</div>";

} catch (PDOException $e) {
    echo "<div>Error: " . $e->getMessage()."</div>";
}

echo "<div>your system is now ready to use. enjoy <b>:)</b></div>";

$conn = null;
?>
