<?php
$servername = "localhost";
$username = "root";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists, if not create it
$db_selected = mysqli_select_db($conn, $dbname);
if (!$db_selected) {
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($dbname);
    } else {
        die("Error creating database: " . $conn->error);
    }
} else {
    $conn->select_db($dbname);
}

// Function to check and create a table
function checkAndCreateTable($conn, $tableName, $createTableSql) {
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");
    if ($result->num_rows == 0) {
        if ($conn->query($createTableSql) === TRUE) {
            echo "Table $tableName created successfully<br>";
        } else {
            echo "Error creating table $tableName: " . $conn->error . "<br>";
        }
        return true; // Table created
    } else {
        echo "Table $tableName already exists<br>";
        return false; // Table already exists
    }
}

// SQL to create tables
$createUsersTable = "CREATE TABLE users (
    userid INT PRIMARY KEY AUTO_INCREMENT,
    usertype TEXT,
    username TEXT,
    userpassword VARCHAR(25)
)";

$createRecommendationsTable = "CREATE TABLE recommendations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    bname TEXT,
    age INT,
    gender TEXT,
    BCnumber INT,
    Description TEXT,
    medicalstatus TEXT,
    amountrequired INT,
    startdate DATE,
    enddate DATE,
    residence TEXT,
    status TEXT
)";

$createBeneficiariesTable = "CREATE TABLE beneficiaries (
    benid INT PRIMARY KEY AUTO_INCREMENT,
    bname TEXT,
    age INT,
    BCnumber INT,
    Description TEXT,
    medicalstatus TEXT,
    amountrequired INT,
    startdate DATE,
    enddate DATE,
    lastfunddate DATE,
    residence TEXT
)";

$createDepositsTable = "CREATE TABLE deposits (
    depoid INT PRIMARY KEY AUTO_INCREMENT,
    userid INT,
    depoamount INT,
    depodate DATE,
    code TEXT,
    status TEXT
)";

$createTransactionsTable = "CREATE TABLE transactions (
    transid INT PRIMARY KEY AUTO_INCREMENT,
    benid INT,
    bname TEXT,
    transamount INT,
    transdate DATE,
    code TEXT
)";

// Check and create each table
if (checkAndCreateTable($conn, 'users', $createUsersTable)) {
    $insertAdmin = "INSERT INTO users (usertype, username, userpassword) VALUES ('admin', 'admin', '123')";
    if ($conn->query($insertAdmin) === TRUE) {
        echo "Admin user inserted successfully<br>";
    } else {
        echo "Error inserting admin user: " . $conn->error . "<br>";
    }
}
checkAndCreateTable($conn, 'recommendations', $createRecommendationsTable);
checkAndCreateTable($conn, 'beneficiaries', $createBeneficiariesTable);
checkAndCreateTable($conn, 'deposits', $createDepositsTable);
checkAndCreateTable($conn, 'transactions', $createTransactionsTable);

$conn->close();
?>
